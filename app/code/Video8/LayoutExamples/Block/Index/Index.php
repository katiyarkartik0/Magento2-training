<?php

namespace Video8\LayoutExamples\Block\Index;

use Magento\Framework\View\Element\Template;

class Index extends Template{
    protected function _prepareLayout(){
        parent::_prepareLayout();
        $pageMainTitle = $this->getLayout()->getBlock('page.main.title');
        if ($pageMainTitle) {
            $pageMainTitle->setPageTitle('Kartik Katiyar Magento Developer');
        }
        return $this;
    }
    public function getSubtitle():string{
        return "This is a demo module for showing a way to create BLOCK/LAYOUT/TEMPLATES";
    }
}