<?php

namespace Video22\DependencyInjection\Model;

class NonInjectable implements NonInjectableInterface
{
    public function getId(): string
    {
        return 'Class NonInjectable';
    }
}