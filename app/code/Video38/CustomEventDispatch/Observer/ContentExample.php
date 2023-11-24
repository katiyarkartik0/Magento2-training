<?php

namespace Video38\CustomEventDispatch\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Video38\CustomEventDispatch\Block\Example;

class ContentExample implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $page = $observer->getData("page");
        $page->getLayout()->getBlock(Example::class,'exampleContent','content');
    }
}

//here on firing event, observer pushes the html into layout
//you can see, we haven't mention block in .phtml file, still we get the html