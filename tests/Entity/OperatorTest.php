<?php

namespace App\Tests\Entity;

use App\Entity\Operator;
use App\Tests\DatabasePrimer;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OperatorTest extends KernelTestCase
{
    public const PASSWORD_OK = 'unPasswordOK';
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        DatabasePrimer::prime($kernel);
        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
    }

    #[NoReturn]
    public function testWhenIsEmpty(): void
    {
        $operator = new Operator();

        self::assertNull($operator->getFirstName(), 'Default firstname of user is not null');
        self::assertEmpty($operator->getLastName(), 'Default lastname of user is not empty string');
        self::assertNull($operator->getData(), 'Default data of user is not null');
        self::assertEquals(0, $operator->getId(), 'Default ID value is not equals to 0');
        self::assertNull($operator->getSalt(), 'Default salt value of user is not null');
        self::assertNull($operator->getPassword(), 'Default password of user is not null');
        self::assertNull($operator->getPlainTextPassword(), 'Default plaintext of user is not null');
        self::assertEmpty($operator->getUsername(), 'Default username of user is not null');
        self::assertIsArray($operator->getRoles(), 'Default getRoles is not an array');
        self::assertContains('ROLE_USER', (array)$operator->getRoles()[0], 'Default user role value ' .
        ' is not equal to ROLE_USER');
    }

    #[NoReturn]
    public function testClassAttributes(): void
    {
        self::assertClassHasAttribute('firstName', Operator::class, 'Possède attribut firstName');
    }

    #[NoReturn]
    public function testSettersAndGetters(): void
    {
        $operator = new Operator();

        self::assertInstanceOf(Operator::class, $operator->setFirstsName('Brice'));
        self::assertInstanceOf(Operator::class, $operator->setLastName('POTE'));
        self::assertInstanceOf(Operator::class, $operator->setData('Ceci est un commentaire'));
        self::assertInstanceOf(Operator::class, $operator->setPassword('password'));
        self::assertInstanceOf(Operator::class, $operator->setPlainTextPassword('plainTextPwd'));
        self::assertInstanceOf(Operator::class, $operator->setUserName('username'));
    }

    #[NoReturn]
    public function testPasswordIsOk(): void
    {
        $operator = new Operator();
        $operator->setFirstsName('Brice');
        $operator->setLastName('POTE');
        $operator->setData('Ceci est un commentaire');
        $operator->setPlainTextPassword(self::PASSWORD_OK);
        $operator->setUserName('username');
        $operator->setPassword(self::PASSWORD_OK);
        $minLength = 8;
        $maxLength = 16;

        self::assertTrue(
            strlen($operator->getPlainTextPassword()) >= $minLength,
            'le mot de passe est moins grand que ' . $minLength . ' caractères'
        );

        self::assertTrue(
            strlen($operator->getPlainTextPassword()) <= $maxLength,
            'le mot de passe est plus grand que ' . $maxLength . ' caractères'
        );
    }
}
