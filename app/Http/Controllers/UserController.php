<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $request->accepts('session');
        session()->flash('successUpdate', 'Berhasil mengubah data user!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data_user = User::find($id);
        $data_user->delete();

        return redirect('/admin/dashboard')->with('successDelete', 'Berhasil menghapus data!');
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

            // return redirect()->back();
            return redirect()->route('home');
        }

        return redirect('/')->with('loginError', 'Login failed! Masukkan email dan password dengan benar.');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
