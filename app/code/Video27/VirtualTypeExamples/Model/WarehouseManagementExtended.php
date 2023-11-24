<?php

namespace Video27\VirtualTypeExamples\Model;

use Video27\VirtualTypeExamples\Model\WarehouseManagement;

class WarehouseManagementExtended extends WarehouseManagement
{
    protected function getAllWareHouses(): array
    {
        $extrawarehouses = [
            'man1' => [
                'name' => 'Manchester',
                'code' => 'man1',
                'postcode' => 'MAN111'
            ],
            'birm1' => [
                'name' => 'Birmhingum',
                'code' => 'birm1',
                'postcode' => 'BIRM211'
            ]
        ];
        return array_merge($extrawarehouses, parent::getAllWareHouses());
    }
}