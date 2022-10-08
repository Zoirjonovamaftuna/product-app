<?php

namespace App\UseCases;


use App\DTO\ProductDto;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Tasks\CreateProductAttributesTask;
use App\Tasks\FindProductTask;
use App\Tasks\FindProductTypeTask;
use Exception;
use Illuminate\Support\Facades\DB;

class EditProductUseCase
{
    public function __construct(
        private FindProductTypeTask $findProductTypeTask,
        private FindProductTask $findProductTask,
        private CreateProductAttributesTask $createProductAttributesTask,
    )
    {
    }

    /**
     * @throws Exception
     */
    public function execute(ProductDto $dto, int $product_id): Product
    {
        $product_type = $this->findProductTypeTask->execute($dto->getProductTypeId());
        $product = $this->findProductTask->execute($product_id);
        $product->update([
            'name' => $dto->getName(),
            'description' => $dto->getDescription(),
            'product_type_id' => $product_type->id,
        ]);

        $productAttributes = [];

        ProductAttribute::query()->where('product_id', $product->id)->delete();
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
