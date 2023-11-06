<?php

namespace UserStory4\Module2\Controller\Redirects;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Redirect extends Action{

    public function execute()
    {
        $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $jsonResult->setData(['message'=>'My first Page','newMessage'=>'My second Pae']);
        return $jsonResult;
    }
}