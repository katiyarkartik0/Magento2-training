<?php

namespace Video27\VirtualTypeExamples\Api;

interface WarehouseManagementInterface{
    public function getWarehouseInfo(string $code):array;
}