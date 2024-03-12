<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return redirect()->back()->with(['successRegister' => 'Registration successfull! Please Login']);
        $request->accepts('session');
        session()->flash('successUpdate', 'Berhasil mengubah data user!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data_user = User::find($id);
        $data_user->delete();

        return redirect()->back()->with('successDelete', 'Berhasil menghapus data!');
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
