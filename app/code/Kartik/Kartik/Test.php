<?php

declare(strict_types=1);

namespace Kartik\Kartik;

use Magento\Catalog\Api\Data\CategoryInterface;

class Test
{ 
    protected $categoryInterface;
    protected $arrayParam;
    protected $stringParam;

    public function __construct(
        CategoryInterface $categoryInterface,
        array $arrayParam=["key1"=>"value1","key2"=>"value2"],
        string $stringParam="userStory#1"
    ) {
        $this->categoryInterface = $categoryInterface;
        $this->arrayParam = $arrayParam;
        $this->stringParam = $stringParam;
    }
    public function displayParams() {
        echo "Array Param: " . print_r($this->arrayParam, true) . "<br>";
        echo "String Param: " . $this->stringParam . "<br>";
    }
}
