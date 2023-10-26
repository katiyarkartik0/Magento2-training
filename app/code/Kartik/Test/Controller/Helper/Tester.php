<?php

declare(strict_types=1);

namespace Kartik\Test\Controller\Helper;

use Kartik\Kartik\Test;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Tester extends Action
{ 
    protected $test;
    public function __construct(
        Context $context, 
        Test $test
    ) {
        parent::__construct($context);
        $this->test = $test;
    }
    public function execute() {
        $this->test->displayParams();
    }
}
