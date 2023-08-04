<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function registration()
    {
        return view('user.form_register');
    }

    public function validate_registration(Request $req)
    {
            FacadesSession::flash('name', $req->name);
            FacadesSession::flash('email', $req->email);
            FacadesSession::flash('telepon', $req->telepon);
            FacadesSession::flash('username', $req->username);
            FacadesSession::flash('password', $req->password);


            //membuat proses validasi
            $this->validate($req,[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email',
                'telepon' => 'required|numeric|min:12',
                'username' => 'required|string|min:5',
                'password' => [
                    'required',
                    Password::min(8)
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                ]
            ],[
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'telepon.required' => 'Telepon wajib diisi',
                'username.required' => 'Username wajib diisi',
                'password.required' => 'Password wajib diisi',
                'name.string' => 'Nama wajib diisi dengan huruf',
                'email.email' => 'Isi email dengan benar',
                'telepon.numeric' => 'Telepon wajib diisi dengan angka',
                'username.string' => 'Username wajib diisi dengan huruf atau kombinasi karakter',
                'username.min' => 'Username minimal 5 karakter',
                'telepon.min' => 'Username minimal 12 karakter',
                'password.min' => 'Password minimal 8 karakter dengan kombinasi huruf besar, huruf kecil, angka, dan simbol',
            ]);
            $datas = $req->all();
            $save_data = new User;
            $save_data->name = $datas['name'];
            $save_data->email = $datas['email'];
            $save_data->telepon = $datas['telepon'];
            $save_data->username = $datas['username'];
            $save_data->password = Hash::make($datas['password']);
            $save_data->save();
            return redirect()->route('user.registration')->with('success', __('Berhasil Mendaftar'));
    }

    public function login()
    {
        return view('user.form_login');
    }

    public function validate_login(Request $req)
    {
        FacadesSession::flash('username', $req->username);
        FacadesSession::flash('password', $req->password);

        $req-> validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $kredensil = [
            'username' =>$req->username,
            'password' =>$req->password
        ];

        if(Auth::attempt($kredensil)){
            return redirect('user/beranda')->with('success', 'Berhasil Login');
        }else{
            return redirect('user/login')->withErrors('Username atau Password Kamu Salah');
        }
    }

    public function logout(Request $req)
    {
        $req = session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        $username = Auth::user()->username;
        return view('beranda', compact('username'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
