<?php

namespace App\Tests\Entity;

use App\Entity\Operator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OperatorTest extends KernelTestCase
{
    public function testIsEmpty(): void
    {
        $operator = new Operator();

        self::assertEmpty($operator->getFirstName());
        self::assertEmpty($operator->getLastName());
        self::assertEmpty($operator->getComments());
        self::assertEmpty($operator->getId());
        self::assertEmpty($operator->getSalt());
        self::assertEmpty($operator->getPassword());
        self::assertEmpty($operator->getPlainTextPassword());
        self::assertEmpty($operator->getUsername());
        self::assertIsArray($operator->getRoles());
    }

    public function testSettersAndGetters(): void
    {
        $operator = new Operator();

        self::assertInstanceOf(Operator::class, $operator->setFirstsName('Brice'));
        self::assertInstanceOf(Operator::class, $operator->setLastName('POTE'));
        self::assertInstanceOf(Operator::class, $operator->setComment('Ceci est un commentaire'));
        self::assertInstanceOf(Operator::class, $operator->setPassword('password'));
        self::assertInstanceOf(Operator::class, $operator->setPlainTextPassword('plainTextPwd'));
        self::assertInstanceOf(Operator::class, $operator->setUserName('username'));
    }
}
