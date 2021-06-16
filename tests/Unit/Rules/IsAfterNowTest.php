<?php

namespace Tests\Unit;

use App\Rules\IsAfterNow;
use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;

class IsAfterNowTest extends TestCase
{
    public function testIsBeforeNow()
    {
        $isAfterNow = new IsAfterNow();

        $this->assertFalse(
            $isAfterNow->passes(null, date("Y-m-d H:i:s", strtotime(Date::now()) - 60))
        );
    }

    public function testIsAfterNow()
    {
        $isAfterNow = new IsAfterNow();

        $this->assertTrue(
            $isAfterNow->passes(null, date("Y-m-d H:i:s", strtotime(Date::now()) + 60))
        );
    }
}
