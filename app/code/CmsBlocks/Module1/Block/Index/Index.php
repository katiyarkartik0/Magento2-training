<?php

namespace CmsBlocks\Module1\Block\Index;

use Magento\Framework\View\Element\Template;

class Index extends Template{
    protected function _prepareLayout(){
        parent::_prepareLayout();
        $pageMainTitle = $this->getLayout()->getBlock('page.main.title');
        if ($pageMainTitle) {
            $pageMainTitle->setPageTitle('CMS-Blocks YT@alaa-al-maliki video10');
        }
        return $this;
    }
    public function getSubtitle():string{
        return "You can creae CMS block from Content>Block>Add Block";
    }
    public function getNodeHtml():string{
        //this function will return a block of class Note created on the fly
        //since it doesn't look in the layout and pick the template for it
        //but still you'll have to specify target phtml in class-Note block
        return $this->getLayout()->createBlock(Note::class)->toHtml();
    }
}