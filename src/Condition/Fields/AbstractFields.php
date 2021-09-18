<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

use InvalidArgumentException;

use function implode;
use function in_array;

abstract class AbstractFields implements FieldsInterface
{
    /** @var array<int, string> $fields */
    protected array $fields;

    /** @var array<int, string> $validFields */
    protected static array $validFields;

    /**
     * @param array<int, string> $fields
     */
    public function __construct(array $fields)
    {
        $this->throwInvalidFieldException($fields);
        $this->fields = $fields;
    }

    /**
     * @param array<int, string> $fields
     */
    protected function throwInvalidFieldException(array $fields): void
    {
        foreach ($fields as $field) {
            if (! in_array($field, static::$validFields, true)) {
                throw new InvalidArgumentException('invalid field:' . $field);
            }
        }
    }

    public function __toString(): string
    {
        return implode(',', $this->fields);
    }
}
