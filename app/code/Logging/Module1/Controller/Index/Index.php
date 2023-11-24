<?php

namespace Logging\Module1\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Psr\Log\LoggerInterface;

class Index implements ActionInterface {
    protected $pageFactory;
    private $logger;

    public function __construct(PageFactory $pageFactory,LoggerInterface $logger) {
        $this->pageFactory = $pageFactory;
        $this->logger = $logger;
    }

    public function execute() {
        $resultPage = $this->pageFactory->create();
        $this->logger->info("Video34");
        return $resultPage;
    }
}
