<?php

namespace Video38\CustomEventDispatch\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface {
    protected $pageFactory;
    protected $eventManager;

    public function __construct(PageFactory $pageFactory,ManagerInterface $eventManager) {
        $this->pageFactory = $pageFactory;
        $this->eventManager = $eventManager;
    }

    public function execute() {
        $resultPage = $this->pageFactory->create();
        $this->eventManager->dispatch("dispatch_kartik_event", ['page'=>$resultPage]);
        return $resultPage;
    }
}
