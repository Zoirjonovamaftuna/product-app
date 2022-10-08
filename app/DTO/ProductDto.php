<?php

namespace App\DTO;

final class ProductDto
{
    public function __construct(
        private string $name,
        private string $description,
        private int    $product_type_id,
        private array  $product_attributes
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            name: $data['name'],
            description: $data['description'],
            product_type_id: $data['product_type_id'],
            product_attributes: array_map(function ($product_attribute) {
                return ProductAttributeStoreDto::fromArray($product_attribute);
            }, $data['product_attributes'])

        );
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'product_type_id' => $this->product_type_id
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getProductTypeId(): int
    {
        return $this->product_type_id;
    }

    /**
     * @return ProductAttributeStoreDto[]
     */
    public function getProductAttributes(): array
    {
        return $this->product_attributes;
    }
}
