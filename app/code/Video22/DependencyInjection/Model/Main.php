<?php

namespace Video22\DependencyInjection\Model;

use Video22\DependencyInjection\Model\Injectable;
use Video22\DependencyInjection\Model\NonInjectableFactory;
use Video22\DependencyInjection\Model\InjectableInterface;
use Video22\DependencyInjection\Model\NonInjectableInterfaceFactory;
use Video22\DependencyInjection\Model\Util\AbstractUtil;
use Video22\DependencyInjection\Model\HeavyOperation\HeavyOperation;

class Main
{
    protected array $data;
    //here data array was passed from etc\frontend\di.xml
    protected InjectableInterface $injectable;
    protected NonInjectableInterfaceFactory $nonInjectablefactory;
    protected AbstractUtil $util;
    protected $heavyOperation;
    public function __construct(
        InjectableInterface $injectable,
        NonInjectableInterfaceFactory $nonInjectablefactory,
        AbstractUtil $util,
        HeavyOperation $heavyOperation,
        array $data = [],
    ) {
        $this->data = $data;
        $this->injectable = $injectable;
        $this->nonInjectablefactory = $nonInjectablefactory;
        //on contrary to the name noninjectable, it is actually injectable 
        //but adding a name factory changes the way how object manager behaves.
        //The object manager originally returns the same instance in dependency injection
        //but if we add a factory word to it, it returns a new instance of that object.
        $this->util = $util;
        $this->heavyOperation = $heavyOperation;    
    }
    public function getId(): string
    {
        return $this->data['id'];
    }
    public function getInjectable(): InjectableInterface
    {
        return $this->injectable;
    }
    public function getNonInjectable(): NonInjectableInterface
    {
        //since this is a factory class, we need to call create() method
        return $this->nonInjectablefactory->create();
    }
    public function getUtil(): AbstractUtil
    {
        return $this->util;
    }
    public function getHeavyOperation(): HeavyOperation
    {
        return $this->heavyOperation;
    }
}