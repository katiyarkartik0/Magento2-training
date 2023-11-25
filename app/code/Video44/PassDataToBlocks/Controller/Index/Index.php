<?php

namespace Video44\PassDataToBlocks\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface {
    protected $pageFactory;

    public function __construct(PageFactory $pageFactory) {
        $this->pageFactory = $pageFactory;
    }

    public function execute() {
        $resultPage = $this->pageFactory->create();
        $resultPage->getLayout()->getBlock('blockname')->setTopic('Passed data from controller');
        return $resultPage;
    }
}
