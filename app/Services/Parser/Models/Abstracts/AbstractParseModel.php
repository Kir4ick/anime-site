<?php

namespace App\Services\Parser\Models\Abstracts;

abstract class AbstractParseModel
{
    public function setAttributes(array $data): self
    {
        $attributes = $this->attributes();
        foreach ($data as $name => $value) {
            if (isset($attributes[$name])) {
                $this->$name = $value;
            }
        }

        return $this;
    }

    public function attributes(): array
    {
        $class = new \ReflectionClass($this);
        $names = [];
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (!$property->isStatic()) {
                $names[] = $property->getName();
            }
        }

        return $names;
    }
}
