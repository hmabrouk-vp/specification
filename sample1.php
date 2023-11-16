<?php
require_once  './vendor/autoload.php';

use App\V1\Core\AndSpecification;
use App\V1\Core\CallableSpecification;
use App\V1\Core\NotSpecification;
use App\V1\Core\OrSpecification;
use App\V1\Sample\BusinessLogic\MultipleOfSpecification;
use App\V1\Sample\BusinessLogic\NumberGreaterThan6Specification;
use App\V1\Sample\BusinessLogic\NumberLessThan10Specification;
use App\V1\Sample\Sample1\Number;

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


$assert3 = new CallableSpecification();
assert($assert3->isSatisfiedBy([
    CallableSpecification::CALLABLE => 'toto',
    CallableSpecification::ARGS => $number->number
]));


function toto($a) {
    return $a % 2 == 0;
}

class A {
    function toto($a) {
        return $a % 2 == 0;
    }
}

assert($assert3->isSatisfiedBy([
    CallableSpecification::CALLABLE => [new A(), 'toto'],
    CallableSpecification::ARGS => $number->number
]));

