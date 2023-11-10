<?php

namespace UserStory8\Module1\Controller;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use UserStory8\Module1\Model\Employee;

class Table extends Template{
    protected $employee;
    public function __construct(Context $context, Employee $employee)
    {
        parent::__construct($context);
        $this->employee = $employee;
    }

    public function getInfo()
    {
        $data = $this->employee->getCollection();
        return $data;
    }
}