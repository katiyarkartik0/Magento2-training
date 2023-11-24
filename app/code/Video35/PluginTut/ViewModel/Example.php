<?php

namespace Video35\PluginTut\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Video35\PluginTut\Model\ProductKey;

class Example implements ArgumentInterface
{
    protected ProductRepositoryInterface $productRepository;
    protected ProductKey $productKey;
    public function __construct(ProductRepositoryInterface $productRepository, ProductKey $productKey)
    {
        $this->productRepository = $productRepository;
        $this->productKey = $productKey;
    }

    public function getProductKey(RequestInterface $request): ?string
    {
        $productId = $request->getParam('product_id');
        if (null !== $productId) {
            $product = $this->productRepository->getById($productId);
            return $this->productKey->getKey($product, 'Product');
        }

        return null;
    }
}