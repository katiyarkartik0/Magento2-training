<?php

namespace UserStory8\Module1\Controller\Form;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use UserStory8\Module1\Model\Employee;

class Delete extends Action
{
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

    public function execute()
    {
        try {
            $request = $this->getRequest();
            $employeeId = $request->getParams();
            dump($employeeId);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage("$e");
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}