<?php

namespace App\Tasks;

use App\Models\Product;
use Exception;

class FindProductTask
{
    /**
     * @throws Exception
     */
    public function execute(int $product_id): Product
    {
        /** @var Product $product */
        $product = Product::query()->find($product_id);
        if (!$product) {
            throw new Exception('Product not found', 404);
        }
        return $product;
    }

}
