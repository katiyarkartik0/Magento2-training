<?php

namespace UserStory7\Module1\Block;

use Magento\Framework\View\Element\Template;

class message extends Template{
    protected function _toHtml()
    {
        return '<div>UserStory#7Module1 My Message</div>';
    }

    protected function _afterToHtml($html)
    {
        return $html;
    }
}