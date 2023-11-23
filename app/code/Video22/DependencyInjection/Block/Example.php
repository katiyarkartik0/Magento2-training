<?php

namespace Video22\DependencyInjection\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Video22\DependencyInjection\Model\Main;

class Example extends Template
{
    protected $main;
    public function __construct(Context $context, Main $main, array $data = [])
    {
        parent::__construct($context, $data);
        $this->main = $main;
    }
    public function getMain(): Main
    {
        return $this->main;
    }
}