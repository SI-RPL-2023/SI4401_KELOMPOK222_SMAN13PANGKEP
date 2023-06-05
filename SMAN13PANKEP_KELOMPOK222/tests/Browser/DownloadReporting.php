<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DownloadReporting extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group DownloadReporting
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('Welcome, Pengguna.')
                    ->click('.dropdown')
                    ->clickLink('Admin')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'admin')
                    ->press('Login')
                    ->press('Cetak Data');
        });
    }
}
