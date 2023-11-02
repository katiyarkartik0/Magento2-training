<?php
declare(strict_types=1);

namespace UserStory2\Kartik\Plugins;

use Magento\Catalog\Model\Product;

class ProductOnSale {
    public function afterGetName(Product $subject, $result){
        $price  = $subject->getFinalPrice();
        if($price <60){
            $result = "On Sale " . $result;
        }
        return $result;
    }
}