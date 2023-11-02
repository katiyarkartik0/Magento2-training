<?php

declare(strict_types=1);

namespace UserStory2\Kartik\Plugins;

use Magento\Theme\Block\Html\Breadcrumbs;

class CustomizeBreadCrumb{
    public function beforeAddCrumb(Breadcrumbs $subject,$title,$crumbInfo){


        $crumbInfo["label"] = "Hummmingbird".$crumbInfo["label"];

        return [$title,$crumbInfo];
    }    
}