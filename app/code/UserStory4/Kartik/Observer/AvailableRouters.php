<?php
namespace UserStory4\Kartik\Observer;

use Magento\Framework\App\RouterList;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class AvailableRouters implements ObserverInterface
{
    protected $logger;
    protected $routerList;
    public function __construct(RouterList $routerList, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->routerList = $routerList;
    }
    public function execute(Observer $observer)
    {
        $routers = [];
        foreach ($this->routerList as $router) {
            $routers[] = get_class($router);
        }

        $this->logger->info("Kartik:" . implode(", ", $routers));
    }
}