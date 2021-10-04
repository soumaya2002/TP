<?php

namespace App\Tests\Entity;

use App\Entity\Operator;
use PHPUnit\Framework\TestCase;

class OperatorTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $operator = new Operator();

        self::assertEmpty($operator->getFirstName());
        self::assertEmpty($operator->getLastName());
        self::assertEmpty($operator->getComments());
    }

    public function testSettersAndGetters(): void
    {
        $operator = new Operator();

        self::assertInstanceOf(Operator::class, $operator->setFirstsName('Brice'));
        self::assertInstanceOf(Operator::class, $operator->setLastName(null));
        self::assertInstanceOf(Operator::class, $operator->setComment('Ceci est un commentaire'));
    }
}
