<?php

namespace Video38\CustomEventDispatch\Block;
use Magento\Framework\View\Element\Template;
class Example extends Template{
    public function toHtml(){
        return 'This is example from dispatch event tutorial block->Video38\ObserverExample\Block\Example';
    }
}