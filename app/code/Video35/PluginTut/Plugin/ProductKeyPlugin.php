<?php

namespace Video35\PluginTut\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;
use Video35\PluginTut\Model\ProductKey;

class ProductKeyPlugin{
    public function beforeProductKey(ProductKey $subject,ProductInterface $product, string $prefix){

        //do something

        return [$product,$prefix];
    }
    public function afterGetKey(ProductKey $subject,$result){
        return $result . "Item from plugin";
    }
    public function aroundGetKey(ProductKey $subject,callable $proceed, ProductInterface $product, string $prefix){
        $prefix .=$product->getId();
        $result= $proceed($product,$prefix);
        $result .= '--'.$product->getName();
        return $result;
    }
}