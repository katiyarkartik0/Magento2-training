<?php

namespace UserStory5\Module2\Plugins;

use \Magento\Catalog\Block\Product\View\Description;

class ModifyContent{
    public function afterToHTML(Description $subject,$result)
    {
        $description = $result;
       return $description . '<p>This is a custom message.</p>';
    } 
}