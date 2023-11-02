<?php

declare(strict_types=1);

namespace UserStory2\Kartik\Plugins;

use Magento\Theme\Block\Html\Header;

class CustomWElcomeMsg{
    public function afterGetWelcome(Header $subject,$result){
        return "Kartik ".$result;
    }    
}