<?php

namespace Video44\PassDataToBlocks\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ObserverWay implements ObserverInterface{
    public function execute(Observer $observer)
    {
        $block = $observer->getBlock();
        $block->setLink("coming from observr");
    }

}