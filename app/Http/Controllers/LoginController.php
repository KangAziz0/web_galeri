<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        Session::flash('username', $request->user);
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
        
        // dd($data);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success','Selamat datang '.$request->username);
        } else {
            return redirect()->route('login')->with('gagal', 'Username Atau Password Anda Salah');
            // dd($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::latest()->first();
        if ($user == null) {
            $user = new User();
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->nama_lengkap = $request->nama;
            $user->alamat = $request->alamat;
            $user->foto = '';
            $user->save();
            return redirect('/login');
        }
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama;
        $user->alamat = $request->alamat;
        $user->foto = '';
        $user->save();
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
