<?php

namespace Video4\Module1\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;


class Index implements ActionInterface{
    protected $resultFactory;
    public function __construct(RawFactory $resultFactory){
        $this->resultFactory = $resultFactory;
    }
    public function execute(){
        return $this->resultFactory->create()->setContents('Example');
    }
}

//real class is Magento\Framework\Controller\Result\Raw
//but we use RawFactory so that it creates a new instance
//everytime it is called