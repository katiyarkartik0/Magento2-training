<?php

namespace UserStory5\Module1\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class View extends Action
{
    protected $resultFactory;

    public function __construct(
        ResultFactory $resultFactory,
        Context $context
    ) {
        $this->resultFactory = $resultFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        echo "Hello World";
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $redirect->setUrl('/tupac-print-hoodie.html');
        return $redirect;
    }
}