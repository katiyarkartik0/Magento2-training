<?php

namespace UserStory8\Module1\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use UserStory8\Module1\Model\ResourceModel\Employee\Collection;

class Table extends Template
{
    protected $employee;
    protected $employeeCollection;
    public function __construct(Context $context, Collection $employeeCollection, array $data = [])
    {
        parent::__construct($context, $data);
        $this->employeeCollection = $employeeCollection;
    }
    public function getDeleteUrl()
    {
       return $this->getUrl("userstory8module1/form/delete");
    }
    public function getInfo()
    {
        return $this->employeeCollection->getItems();
    }

}