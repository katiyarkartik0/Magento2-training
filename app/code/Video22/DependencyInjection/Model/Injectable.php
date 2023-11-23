<?php

namespace Video22\DependencyInjection\Model;

use Video22\DependencyInjection\Model\InjectableInterface;

class Injectable implements InjectableInterface
{
    public function getId(): string
    {
        return 'Class Injectable';
    }
}