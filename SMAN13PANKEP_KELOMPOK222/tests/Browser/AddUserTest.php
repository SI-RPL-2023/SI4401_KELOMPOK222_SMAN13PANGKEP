<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('Login')
                    ->select('role', 'admin')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertPathIs('/')
                    ->clickLink('USER')
                    ->assertSee('Data User')
                    ->clickLink('Tambah Data')
                    ->select('role', 'siswa')
                    ->type('name', 'Rifqi')
                    ->type('email', 'rifqi@gmail.com')
                    ->type('nomor_hp', '086378229201')
                    ->type('password', 'testtest')
                    ->press('Simpan')
                    ->assertPathIs('/users');
        });
    }
}
