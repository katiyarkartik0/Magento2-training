<?php

namespace NestedBlocks\LayoutExamples\Block\Index;

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
    public function getNodeHtml():string{
        //this function will return a block of class Note created on the fly
        //since it doesn't look in the layout and pick the template for it
        //but still you'll have to specify target phtml in class-Note block
        return $this->getLayout()->createBlock(Note::class)->toHtml();
    }
}