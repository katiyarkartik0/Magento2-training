<?php

declare(strict_types=1);

namespace UserStory2\Kartik\Plugins;

use Magento\Theme\Block\Html\Footer;

class CustomCopyrightMsg{
    public function afterGetCopyright(Footer $subject,$result){
        return "Kartik ".$result;
    }    
}