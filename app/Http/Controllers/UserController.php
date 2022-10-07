<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $allUsers = User::where('role', 'user')->get();
        $users = User::where('role', 'user')
            ->whereNotNull('last_seen')
            ->orderBy('last_seen', 'DESC')
            ->get();

        // $allUsers = User::where('role', 'user')->get();
        $allUsers = $users->map(function ($user) {
            $moviesUser = Movie::where('user_id', '=', $user->id)->get();
            $user->movie = $moviesUser;
            return $user;
        });

        // $pecahUser = $allUsers->map(function ($user) {
        //     return $user->count();
        // });

        return view('userPage.users.index', [
            'users' => $users,
            'movies' => $allUsers
        ]);
    }

    public function delete(User $user)
    {
        $userDel = User::where('id', $user->id)->delete();

        if ($userDel) {
            Movie::where('user_id', $user->id)->delete();
        }

        return redirect('/users')->with('berhasil', 'User Telah Dihapus!');
    }

    public function change(Request $request, User $user)
    {
        // return $request;
        $users = User::find($user->id);
        if ($request->file('image')) {
            $validateImage = $request->validate(['image' => 'image|mimes:jpeg,png,jpg|file|max:2048']);
            if ($users->image) {
                Storage::delete($users->image);
            }
            $validateImage['image'] = $request->file('image')->store('profileImages');
            User::where('id', $user->id)->update($validateImage);
            return redirect('/dashboard')->with('berhasil', 'Foto Profile Telah Diubah!');
        } else {
            return redirect('/dashboard');
        }
    }

    public function edit(Request $request, User $user)
    {
        $users = User::find($user->id);
        if ($request->name == $users->name || $request->name == null) {
            return redirect('/dashboard');
        }

        $validateNama = $request->validate(['name' => 'required|min:3|max:255']);
        User::where('id', $user->id)->update($validateNama);
        return redirect('/dashboard')->with('berhasil', 'Perubahan Profile Telah Disimpan!');
    }

    public function reset(Request $request, User $user)
    {
        // return $request;
        $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required',
            'konf_pass' => 'required'
        ]);

        $pass = User::findorFail($user->id);

        if (Hash::check($request->old_pass, $pass->password)) {
            if ($request->new_pass == $request->konf_pass) {
                User::find($user->id)->update([
                    'password' => Hash::make($request->new_pass)
                ]);
                return redirect('/dashboard')->with('berhasil', 'Password Berhasil di ubah');
            } else {
                return redirect('/dashboard')->with('error', 'Konfirmasi Password tidak sama');
            }
        } else {
            return redirect('/dashboard')->with('error', 'Password Lama salah');
        }
    }
}
