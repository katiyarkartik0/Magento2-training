<?php
namespace UserStory3\Kartik\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
class PageLoad implements ObserverInterface 
{
    public $logger;
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
   public function execute(Observer $observer) {
        $response = $observer->getEvent()->getData('response')->getBody();
        $this->logger->info($response);
   }
}