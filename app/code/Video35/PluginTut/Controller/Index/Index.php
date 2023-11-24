<?php

namespace Video35\PluginTut\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface {
    protected $pageFactory;

    public function __construct(PageFactory $pageFactory) {
        $this->pageFactory = $pageFactory;
    }

    public function execute() {
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}
