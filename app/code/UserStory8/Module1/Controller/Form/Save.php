<?php

namespace UserStory8\Module1\Controller\Form;
 
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use UserStory8\Module1\Model\Employee;
 
class Save extends Action
{
    protected $resultPageFactory;
    protected $employee;
 
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Employee $employee
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->employee = $employee;
        parent::__construct($context);
    }
 
    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();
            if ($data) {
                $this->employee->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
 
    }
}