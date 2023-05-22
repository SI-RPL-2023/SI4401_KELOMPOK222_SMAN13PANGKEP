<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('pages.user.edit',[
            'title' => 'Edit User',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->all();

        $item = User::findOrFail($id);
        request()->validate([
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users')->ignore($item->id)],
            'nomor_hp' => ['required'],
            'role' => ['required']
        ]);
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
        return redirect()->route('users.index')->with('success','User berhasil diupdate.');
    }
}
