<?php

namespace UserStory6\Module2\Plugins;

use \Magento\Catalog\Block\Product\View\Description;

class ModifyContent{
    public function afterToHtml(Description $subject,$result)
    {
        $description = $result;
       return $description . '<p>ample description</p>';
    } 
}