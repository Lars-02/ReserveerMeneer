<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BuyMovieTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/login')
                ->type('email', "maikka39@gmail.com")
                ->type('password', "password")
                ->click('button[type=submit]');

            $browser
                ->waitForText('Hey, Maik de Kruif');
        });
    }

    public function tearDown(): void
    {
        parent::tearDown();

        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->assertSee('Hey, Maik de Kruif');

            $browser
                ->clickAtXPath('//*[@id="app"]/nav/div[10]/div')
                ->pause(500)
                ->clickAtXPath('//*[@id="app"]/nav/div[10]/div/div[2]/a[4]')
                ->waitForText('Login');
        });
    }

    public function testCanReserveMovie()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/movie/35/buy')
                ->type('row', "3")
                ->type('column', "10")
                ->type('seats', "1")
                ->click('button[type=submit]');

            $browser
                ->assertUrlIs('/movie/ticket')
                ->assertSee('Total zerotolerance orchestration');
        });
    }
}
