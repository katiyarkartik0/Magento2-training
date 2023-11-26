<?php

namespace Video45\PageTitleExample\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface {
    protected $pageFactory;

    public function __construct(PageFactory $pageFactory) {
        $this->pageFactory = $pageFactory;
    }

    public function execute() {
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->set('Page Title Example');
        $resultPage->getLayout()->getBlock('page.main.title')->setPageTitle('Magento2 training set from controller');
        return $resultPage;
    }
}
