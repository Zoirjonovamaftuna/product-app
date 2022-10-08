<?php

namespace App\DTO;

use Carbon\Carbon;

final class ProductAttributeStoreDto
{
    public function __construct(
        private int $attribute_id,
        private int $attribute_value_id,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            attribute_id: $data['attribute_id'],
            attribute_value_id: $data['attribute_value_id']
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'attribute_id' => $this->attribute_id,
            'attribute_value_id' => $this->attribute_value_id,
        ];
    }

    /**
     * @return int
     */
    public function getAttributeId(): int
    {
        return $this->attribute_id;
    }

    /**
     * @return int
     */
    public function getAttributeValueId(): int
    {
        return $this->attribute_value_id;
    }

}
