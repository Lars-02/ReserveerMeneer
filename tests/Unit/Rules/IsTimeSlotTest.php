<?php

namespace Tests\Unit;

use App\Rules\IsTimeSlot;
use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;

class IsTimeSlotTest extends TestCase
{
    public function testIsTimeSlot()
    {
        $isTimeSlot = new IsTimeSlot();

        for ($i = 0; $i < 60; $i += 1) {
            $time = Date::now();
            $time->setTime(0, $i, 0);
            if ($i % 30 === 0) {
                $this->assertTrue(
                    $isTimeSlot->passes(null, $time)
                );
            } else {
                $this->assertFalse(
                    $isTimeSlot->passes(null, $time)
                );
            }
        }
    }
}
