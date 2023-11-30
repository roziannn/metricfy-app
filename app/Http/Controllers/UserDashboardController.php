<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function profile(){

        $user = Auth::user();

        return view('user.dashboard.profile', compact('user'));
    }

    public function profileUpdate(Request $request){
        $user = Auth::user();

        $request->validate([
            'name' => 'max:100',
            'email' => 'email',
            'kelas' => 'string',
            'avatar' => 'image|mimes:jpeg,png,jpg',
            'phone' => 'max:13'
        ]);


        $imageName = $user->avatar;

        if ($request->avatar) {
            $avatar_img = $request->avatar;
            $imageName = $user->username . '-' . time() . '.' . $avatar_img->extension();
            $avatar_img->move(public_path('img/avatar'), $imageName);
        }

        $request->user()->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'kelas' => $request->kelas,
                'avatar' => $imageName,
                'phone' => $request->phone,
            ]
        );

        $request->accepts('session');
        session()->flash('successUpdate', 'Berhasil mengubah profil!');

        return redirect()->back();
    }
}
