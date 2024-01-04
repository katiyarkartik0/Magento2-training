<?php

namespace UserStory8\Module1\Controller\Form;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use UserStory8\Module1\Block\Form;
use UserStory8\Module1\Model\Employee;

class Save extends Action
{
    public static $NAME_REGEX = "/^[a-zA-Z]{1,29}$/";
    public static $ADDRESS_REGEX = "/^.{31,}$/";
    public static $PHONE_REGEX = "/^\d{10}$/";
    
    protected $resultPageFactory;
    protected $employee;
    protected $formBlock;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Employee $employee,
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->employee = $employee;
    }

    public function validate(array $data)
    {
        $firstName = $data["first_name"];
        $lastName = $data["last_name"];
        $emailId = $data["email_id"];
        $address = $data["address"];
        $phoneNumber = $data["phone_number"];

        if (!preg_match(self::$NAME_REGEX, $firstName)) {
            $FIRST_NAME = Form::$FIRST_NAME;
            $msg = "Please enter a valid $FIRST_NAME";
            return ['isValid' => false, 'msg' => $msg];
        }
        if (!preg_match(self::$NAME_REGEX, $lastName)) {
            $LAST_NAME = Form::$LAST_NAME;
            $msg = "Please enter a valid $LAST_NAME";
            return ['isValid' => false, 'msg' => $msg];
        }
        if (!filter_var($emailId, FILTER_VALIDATE_EMAIL)) {
            $EMAIL_ID = Form::$EMAIL_ID;
            $msg = "Please enter a valid $EMAIL_ID";
            return ['isValid' => false, 'msg' => $msg];
        }
        if (!preg_match(self::$ADDRESS_REGEX, $address)) {
            $ADDRESS = Form::$ADDRESS;
            $msg = "Please enter a valid $ADDRESS";
            return ["isValid" => false, "msg" => $msg];
        }
        if (!preg_match(self::$PHONE_REGEX, $phoneNumber)) {
            $PHONE_NUMBER = Form::$PHONE_NUMBER;
            $msg = "Please enter a valid $PHONE_NUMBER";
            return ["isValid" => false, "msg" => $msg];
        }
        return ['isValid' => true, 'msg' => "good to go"];
    }

    public function execute()
    {
        try {
            $data = (array) $this->getRequest()->getPost();
            if ($data) {
                ['isValid' => $isValid, 'msg' => $msg] = $this->validate($data);
                if (!$isValid) {
                    $this->messageManager->addErrorMessage($msg);
                }
                if ($isValid) {
                    $this->employee->setData($data)->save();
                    $this->messageManager->addSuccess("Data Saved Successfully.");
                }
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage("$e");
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}