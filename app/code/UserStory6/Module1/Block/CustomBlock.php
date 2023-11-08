<?php

namespace UserStory6\Module1\Block;

use Magento\Framework\View\Element\Template;

class CustomBlock extends Template{
    protected function _toHtml()
    {
        return '<div>Kartik Katiyar Magento custom HTML content</div>';
    }

    protected function _afterToHtml($html)
    {
        // Post-processing of the HTML if needed
        $html = parent::_afterToHtml($html);
        return $html;
    }
}