<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function proses_login()
    {
        request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $role = request('role');

        if($role === 'admin')
        {

            if(Auth::attempt(['email' => request('email'),
            'password' => request('password'),
            'role' => 'admin']) || Auth::attempt(['nomor_hp' => request('email'),
            'password' => request('password'),
            'role' => 'admin']))
            {
                request()->session()->regenerate();
                return redirect()->route('dashboard');
            }else{
               return redirect()->route('login')->with('error','Masukan data anda dengan benar.');
            }
        }else if($role === 'siswa')
        {

            if(Auth::attempt(['email' => request('email'),
            'password' => request('password'),
            'role' => 'siswa']) || Auth::attempt(['nomor_hp' => request('email'),
            'password' => request('password'),
            'role' => 'siswa']))
            {
                request()->session()->regenerate();
                return redirect()->route('dashboard');
            }else{
               return redirect()->route('login')->with('error','Masukan data anda dengan benar.');
            }
        }else if($role === 'bendaharawan')
        {

            if(Auth::attempt(['email' => request('email'),
            'password' => request('password'),
            'role' => 'bendaharawan']) || Auth::attempt(['nomor_hp' => request('email'),
            'password' => request('password'),
            'role' => 'bendaharawan']))
            {
                request()->session()->regenerate();
                return redirect()->route('dashboard');
            }else{
               return redirect()->route('login')->with('error','Masukan data anda dengan benar.');
            }
        }else if($role === 'pustakawan')
        {

            if(Auth::attempt(['email' => request('email'),
            'password' => request('password'),
            'role' => 'pustakawan']) || Auth::attempt(['nomor_hp' => request('email'),
            'password' => request('password'),
            'role' => 'pustakawan']))
            {
                request()->session()->regenerate();
                return redirect()->route('dashboard');
            }else{
               return redirect()->route('login')->with('error','Masukan data anda dengan benar.');
            }
        }else if($role === 'guru')
        {

            if(Auth::attempt(['email' => request('email'),
            'password' => request('password'),
            'role' => 'guru']) || Auth::attempt(['nomor_hp' => request('email'),
            'password' => request('password'),
            'role' => 'guru']))
            {
                request()->session()->regenerate();
                return redirect()->route('dashboard');
            }else{
               return redirect()->route('login')->with('error','Masukan data anda dengan benar.');
            }
        }

    }

    public function proses_register()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:5','confirmed'],
            'nomor_hp' => ['required'],
            'role' => ['required','in:bendaharawan,siswa,pustakawan,guru']
        ]);

        $data = request()->all();
        $data['password'] = bcrypt(request('password'));
        $user = User::create($data);
        if(request('role') === 'siswa')
        {
            Siswa::create([
                'nama' => request('name'),
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('users.index')->with('success','Berhasil Daftar dan silahkan login.');
    }
}
