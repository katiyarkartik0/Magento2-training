<?php

namespace Video21\ViewModels\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class DileveryMessage implements ArgumentInterface
{
    public function getMessage(): string
    {
        return "Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium magnam deserunt.";
    }
}