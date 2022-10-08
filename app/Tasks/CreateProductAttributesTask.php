<?php

namespace App\Tasks;

use App\DTO\ProductAttributeStoreDto;
use App\Models\ProductAttribute;
use Exception;

class CreateProductAttributesTask
{
    public function __construct(
        private FindAttributeTask $findAttributeTask,
        private FindAttributeValueTask $findAttributeValueTask,
    )
    {
    }

    /**
     * @param ProductAttributeStoreDto[] $productAttributes
     * @return ProductAttribute[]
     * @throws Exception
     */
    public function execute(array $productAttributes): array
    {
        $createdProductAttributes = [];
        foreach ($productAttributes as $product_attribute) {
            $attribute = $this->findAttributeTask->execute($product_attribute->getAttributeId());

            $attribute_value = $this->findAttributeValueTask->execute(
                $product_attribute->getAttributeId(),
                $product_attribute->getAttributeValueId()
            );

            $new_product_attribute = new ProductAttribute();
            $new_product_attribute->attribute()->associate($attribute);
            $new_product_attribute->attributeValue()->associate($attribute_value);
            $createdProductAttributes[] = $new_product_attribute;
        }

        return $createdProductAttributes;
    }
}
