<?php

namespace Video27\VirtualTypeExamples\Model;

use Video27\VirtualTypeExamples\Api\WarehouseManagementInterface;

class WarehouseManagement implements WarehouseManagementInterface
{
    public function getWarehouseInfo(string $code): array
    {
        $warehouses = $this->getAllWarehouses();
        if(array_key_exists($code, $warehouses)){
            return $warehouses[$code];
        }
        return [];
    }
    protected function getAllWarehouses(): array
    {
        return [
            'lon1' => [
                'name' => 'london',
                'code' => 'lon1',
                'postcode' => 'abc111'
            ],
            'lon2' => [
                'name' => 'london',
                'code' => 'lon2',
                'postcode' => 'DEF222'
            ]
        ];
    }
}