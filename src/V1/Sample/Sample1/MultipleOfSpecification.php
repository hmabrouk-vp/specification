<?php

namespace App\V1\Sample\Sample1;

use App\V1\SpecificationInterface;

class MultipleOfSpecification implements SpecificationInterface
{
    /**  @var Number */
    private $number;

    public function __construct(Number $number)
    {
        $this->number = $number;
    }

    public function isSatisfiedBy($item)
    {
        return $item->number % $this->number->number == 0;
    }
}