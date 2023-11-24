<?php

namespace Video27\VirtualTypeExamples\Api;

use Magento\Framework\DataObject;

interface WarehouseRepoInterface{
    public function newWarehouse(string $code):DataObject;
}