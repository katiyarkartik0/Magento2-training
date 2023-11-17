<?php

namespace UserStory9\Module1\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;

class Enable implements ArrayInterface
{
    /**
     * Retrieve Enable Option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => true, 'label' => __('Yes')],
            ['value' => false, 'label' => __('No')]
        ];
    }
}