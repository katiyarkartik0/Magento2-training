<?php

namespace Video22\DependencyInjection\Model\HeavyOperation;

class HeavyOperation
{
    protected $name;
    public function __construct()
    {
        $this->init();
    }
    public function init():void
    {
        $this->name = "class --> Video22\DependencyInjection\Model\HeavyOperation\HeavyOperation.php";
    }
    public function getName(): string
    {
        return $this->name;
    }
}