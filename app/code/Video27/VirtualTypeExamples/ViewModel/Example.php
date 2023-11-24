<?php

namespace Video27\VirtualTypeExamples\ViewModel;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Video27\VirtualTypeExamples\Api\WarehouseRepoInterface;

class Example implements ArgumentInterface{
    protected $warehouseRepo;
    public function __construct(WarehouseRepoInterface $warehouseRepo)
    {
        $this->warehouseRepo = $warehouseRepo;
    }
    public function getWarehouse(RequestInterface $request){
        return $this->warehouseRepo->newWarehouse((string)$request->getParam('code'));
    }
}