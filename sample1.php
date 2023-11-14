<?php
require_once  './vendor/autoload.php';

use App\V1\Logic\AndSpecification;
use App\V1\Logic\NotSpecification;
use App\V1\Logic\OrSpecification;
use App\V1\Sample\Sample1\MultipleOfSpecification;
use App\V1\Sample\Sample1\Number;
use App\V1\Sample\Sample1\NumberGreaterThan6Specification;
use App\V1\Sample\Sample1\NumberLessThan10Specification;

$number = new Number(7);

$multipleOf = new MultipleOfSpecification($number);
$numberLessThan10 = new NumberLessThan10Specification();
$numberGreaterThan6 = new NumberGreaterThan6Specification();

//assert 1  between 6 and 10
$assert1 = new AndSpecification([$numberGreaterThan6, $numberLessThan10]);
assert($assert1->isSatisfiedBy($number));
$number->number = 12;
assert(!$assert1->isSatisfiedBy($number));
$notAssert1 = new NotSpecification($assert1);
assert($notAssert1->isSatisfiedBy($number));

$assert2 = new MultipleOfSpecification(new Number(6));
assert((new OrSpecification([$assert1, $assert2]))->isSatisfiedBy($number));
