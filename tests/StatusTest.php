<?php

namespace App\Tests;

use App\Entity\Status;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testIsActive(): void
    {
        $status = new Status();
        $status->setIsActive(true);
        
        $this->assertTrue($status->isActive() === true);
    }
}
