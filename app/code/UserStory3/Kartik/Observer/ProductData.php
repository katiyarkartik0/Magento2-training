<?php
namespace UserStory3\Kartik\Observer;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;
class ProductData implements \Magento\Framework\Event\ObserverInterface 
{
    public $logger;
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
   public function execute(Observer $observer) {
      $product = $observer->getProduct();
      $originalName = $product->getName();
      $this->logger->info($originalName);
   }
} 