<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

abstract class StringValueObject
{
    private $value;

    public function __construct(string $string)
    {
        $this->value = $string;
    }

    public function value(): string
    {
        return $this->value;
    }
}
