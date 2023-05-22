<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $item = auth()->user();
        return view('pages.profile',[
            'title' => 'Profile Saya',
            'item' => $item
        ]);
    }

    public function update()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users')->ignore(auth()->id())]
        ]);

        $data = request()->all();
        $item = auth()->user();
        if($item->role === 'siswa')
        {
            $item->siswa->update([
                'nama' => request('name'),
                'nis' => request('nis'),
                'kelas' => request('kelas')
            ]);
        }
        if(request('password'))
        {
            request()->validate([
                'password' => ['required','min:5'],
            ]);
            $data['password'] = bcrypt(request('password'));
        }else{
            $data['password'] = $item->password;
        }

       $item->update($data);

        return redirect()->route('profile.index')->with('success','Profile berhasil diupdate.');

    }
}
