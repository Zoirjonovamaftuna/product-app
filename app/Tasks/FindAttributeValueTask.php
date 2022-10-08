<?php

namespace App\Tasks;

use App\Models\AttributeValue;
use Exception;

class FindAttributeValueTask
{
    /**
     * @throws Exception
     */
    public function execute(int $attribute_id, int $attribute_value_id): AttributeValue
    {
        /** @var AttributeValue $attribute_value */
        $attribute_value = AttributeValue::query()->where('attribute_id', $attribute_id)->find($attribute_value_id);
        if (!$attribute_value) {
            throw new Exception('Attribute value not found', 404);
        }
        return $attribute_value;
    }

}
