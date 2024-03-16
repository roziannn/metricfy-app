<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles
        ]);

        Alert::success('Berhasil!', "Berhasil mengubah data user!");
        return back();
    }

    public function storeUserByAdmin(Request $request)
    {

        $validatedData = $request->validate([
            "name" => "required|max:100",
            "email" => "required|email:dns|unique:users",
            "roles" => "required|",
            "password" => "required|min:6|max:100"
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        Alert::success('Berhasil!', "Berhasil menambahkan user baru!");
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data_user = User::find($id);
        $data_user->delete();

        Alert::success('Berhasil!', "Berhasil menghapus data user!");
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function login()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->roles === 'ADMIN') {
                return redirect()->route('dashboard.admin');
            }


            Alert::image('Hore!', 'Selamat Belajar 🎉', asset('img/partials/horeLogin.jpg'), '480px', '264px');

            return redirect()->route('home');
        }

        Alert::error('Gagal masuk!', 'Masukkan email dan password dengan benar.');

        return redirect('/');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
