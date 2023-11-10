<?php

namespace UserStory8\Module1\Model;

use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('UserStory8\Module1\Model\ResourceModel\Employee');
    }
}