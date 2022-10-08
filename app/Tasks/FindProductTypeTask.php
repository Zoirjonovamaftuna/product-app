<?php

namespace App\Tasks;

use App\Models\ProductType;
use Exception;

class FindProductTypeTask
{
    /**
     * @throws Exception
     */
    public function execute(int $product_type_id): ProductType
    {
        /** @var ProductType $product_type */
        $product_type = ProductType::query()->find($product_type_id);
        if (!$product_type) {
            throw new Exception('Product Type not found', 404);
        }
        return $product_type;
    }

}
