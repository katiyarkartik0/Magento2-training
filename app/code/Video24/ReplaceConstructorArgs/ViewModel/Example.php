<?php

namespace Video24\ReplaceConstructorArgs\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Video24\ReplaceConstructorArgs\Model\DefaultName;

class Example implements ArgumentInterface
{
    protected DefaultName $defaultName;
    public function __construct(DefaultName $defaultName)
    {
        $this->defaultName = $defaultName;
    }
    public function getName(): string
    {
        return $this->defaultName->getName();
    }
}