<?php 

namespace UserStory5\Module3\Controller\AdminHtml\Access;

use Magento\Framework\App\Action\Action;

class Index extends Action{
    public function execute()
    {
        $accessParam = $this->getRequest()->getParam('access');
        if ($accessParam == 'true') {
            $this->getResponse()->setBody('Access granted');
        } else {
            $this->getResponse()->setBody('Access denied');
        }
    }
}