<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function profile()
    {

        $user = Auth::user();

        return view('user.dashboard.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'max:100',
            'email' => 'email',
            'kelas' => 'string',
            'avatar' => 'image|mimes:jpeg,png,jpg',
            'phone' => 'numeric|regex:/^[0-9]*$/'
        ]);


        $imageName = $user->avatar;

        if ($request->hasFile('avatar')) {
            $avatar_img = $request->file('avatar');
            $imageName = $user->name . '-' . time() . '.' . $avatar_img->extension();
            $avatar_img->move(public_path('img/avatar'), $imageName);

            //if user update avatar, delete last photo and replace new one
            $oldImg_path = public_path('img/avatar') . '/' . $user->avatar;
            if ($user->avatar && file_exists($oldImg_path)) {
                unlink($oldImg_path);
            }
        }

        $request->user()->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'kelas' => $request->kelas,
                'avatar' => $request->hasFile('avatar') ? $imageName : $user->avatar,
                'phone' => $request->phone,
            ]
        );

        $request->accepts('session');
        session()->flash('successUpdate', 'Berhasil mengubah profil!');

        return redirect()->back();
    }

    public function profilePasswordUpdate(Request $request)
    {
        $this->validate($request, [
            'new_password' => 'required|confirmed|min:8|string'
        ], [
            'new_password.confirmed' => 'Password konfirmasi tidak cocok.'
        ]);

        $auth = Auth::user();

        $user = User::find($auth->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('successUpdatePassword', "Password berhasil diubah!");
    }
}
