<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ChangeNameTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('Welcome, Pengguna.')
                    ->type('email', 'anugrahbagas45@gmail.com')
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertSee('AnugrahBagasK')
                    ->click('.dropdown') // Klik tombol dropdown
                    ->clickLink('Profile')
                    ->type('name', 'Ari Dwi')
                    ->type('nis', '1202204133')
                    ->press('Update');
        });
    }
}
