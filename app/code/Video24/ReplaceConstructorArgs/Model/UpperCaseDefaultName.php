<?php

namespace Video24\ReplaceConstructorArgs\Model;

use Video24\ReplaceConstructorArgs\Model\DefaultName;

class UpperCaseDefaultName extends DefaultName{
    public function getName():string
    {
        return strtoupper(parent::getName());
    }
}