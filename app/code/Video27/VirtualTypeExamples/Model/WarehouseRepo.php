<?php

namespace Video27\VirtualTypeExamples\Model;

use Magento\Framework\DataObject;
use Video27\VirtualTypeExamples\Api\WarehouseManagementInterface;
use Video27\VirtualTypeExamples\Api\WarehouseRepoInterface;

class WarehouseRepo implements WarehouseRepoInterface
{
    protected $warehouseManagement;
    public function __construct(WarehouseManagementInterface $warehouseManagement){
        $this->warehouseManagement = $warehouseManagement;
    } 
    public function newWarehouse(string $code): DataObject
    {
        return new DataObject($this->warehouseManagement->getWarehouseInfo($code));
    }
}