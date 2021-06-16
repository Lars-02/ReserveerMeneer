<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCanRegisterUser()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('//register')
                ->assertSee('Register Account');

            $browser
                ->type('email', "test@dev")
                ->type('firstname', "John")
                ->type('lastname', "Doe")
                ->type('birthday', "2001-01-01")
                ->type('city', "Tiel")
                ->type('streetname', "Timboektoelaan")
                ->type('house_number', "24")
                ->type('country_code', "NL")
                ->type('password', "12345678")
                ->type('password_confirmation', "12345678")
                ->click('button[type=submit]');

            $browser
                ->waitForReload()
                ->assertUrlIs(config('app.url') . '/');
        });
    }
}
