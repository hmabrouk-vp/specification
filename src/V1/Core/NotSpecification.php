<?php

namespace App\V1\Core;

use App\V1\SpecificationInterface;

class NotSpecification implements SpecificationInterface
{
    /** @var SpecificationInterface */
    private $specification;

    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy($item)
    {
        return !$this->specification->isSatisfiedBy($item);
    }
}