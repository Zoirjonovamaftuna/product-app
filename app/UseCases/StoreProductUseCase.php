<?php

namespace App\UseCases;


use App\DTO\ProductDto;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Tasks\CreateProductAttributesTask;
use App\Tasks\FindAttributeTask;
use App\Tasks\FindAttributeValueTask;
use App\Tasks\FindProductTypeTask;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreProductUseCase
{
    public function __construct(
        private FindProductTypeTask $findProductTypeTask,
        private CreateProductAttributesTask $createProductAttributesTask,
    )
    {
    }

    /**
     * @throws Exception
     */
    public function execute(ProductDto $dto): Product
    {
        $product_type = $this->findProductTypeTask->execute($dto->getProductTypeId());
        $product = new Product();
        $product->name = $dto->getName();
        $product->description = $dto->getDescription();
        $product->productType()->associate($product_type);
        $product->save();
        $productAttributes = [];

        if ($product_attributes = $dto->getProductAttributes()) {
            $productAttributes = $this->createProductAttributesTask->execute($product_attributes);
        }
        return DB::transaction(function() use ($product, $productAttributes) {
            $product->save();
            foreach ($productAttributes as $productAttribute) {
                /** @var ProductAttribute $productAttribute */
                $productAttribute->product()->associate($product);
                $productAttribute->save();
            }

            return $product;
        });
    }

}
