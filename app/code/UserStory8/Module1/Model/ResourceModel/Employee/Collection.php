<?php

namespace UserStory8\Module1\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use UserStory8\Module1\Model\Employee;

class Collection extends AbstractCollection{
    public function _construct(){
        $this->_init('\UserStory8\Module1\Model\Employee', '\UserStory8\Module1\Model\ResourceModel\Employee');
    }
}