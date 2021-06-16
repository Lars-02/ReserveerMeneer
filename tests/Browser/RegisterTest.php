<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
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
                // ->type('birthday', "2001-12-14")
                ->type('birthday', "01-01-2001")
                ->type('city', "Tiel")
                ->type('streetname', "Timboektoelaan")
                ->type('house_number', "24")
                ->type('country_code', "NL")
                ->type('password', "12345678")
                ->type('password_confirmation', "12345678")
                ->click('button[type=submit]');

            $browser
                ->waitForText('Hey, John Doe');
        });
    }

    public function testCanThenLoginUser()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->assertSee('John Doe');

            $browser
                ->clickAtXPath('//*[@id="app"]/nav/div[10]/div')
                ->clickAtXPath('//*[@id="app"]/nav/div[10]/div/div[2]/a[4]')
                ->waitForText('Login');

            $browser
                ->visit('/login')
                ->type('email', "test@dev")
                ->type('password', "12345678")
                ->click('button[type=submit]');

            $browser
                ->waitForText('Hey, John Doe');
        });
    }
}
