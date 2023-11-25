<?php

namespace Video40\MuteObserverExample\Model;

use Magento\Framework\DataObject;
use Magento\Framework\Event\ManagerInterface;

class DeliveryTypes{
    protected ManagerInterface $eventManager;

    public function __construct(ManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function toDataObject(): DataObject
    {
        $types = new DataObject([
            'types' => [
                'same_day',
                'next_day',
            ]
        ]);

        $this->eventManager->dispatch('delivery_type_list', ['types' => $types]);

        return $types;
    }
}