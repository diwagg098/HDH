<?php

namespace App\Http\Controllers;

use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'telp' => 'required|numeric|min:11',
            'password' => 'required|min:8',
            'password_confirm' => 'same:password|required'
        ], [
            'username.required' => 'username wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'email tidak valid',
            'telp.required' => 'Nomor telpon wajib diisi',
            'telp.numeric' => 'Nomor telpon harus angka',
            'telp.min' => 'No telp tidak valid',
            'password.required' => 'password harus diisi',
            'password.min' => 'password minimal 8 karakter',
            'password_confirm.required' => 'pastikan konfirmasi password anda sudah benar',
            'password_confirm.same' => 'konfirmasi password tidak sesuai'
        ]);

        $cekusername = DB::table('guest')->where('username', $request->username)->first();
        $cekemail = DB::table('guest')->where('email', $request->email)->first();

        if ($cekusername) {
            Alert::info('Oops', 'Maaf username sudah digunakan');
            return redirect('/create');
        } else if ($cekemail) {
            Alert::info('Oops', 'Maaf email sudah digunakan');
            return redirect('/create');
        }

        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'guest_id' => Uuid::uuid(),
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => Hash::make($request->password)
        ];

        $save = DB::table('guest')->insert($data);
        if ($save) {
            Alert::success('Success', 'Registrasi berhasil');
            return redirect('/login');
        } else {
            Alert::error('Error', 'Oops terjadi kesalahan dalam registrasi');
            return redirect('/create');
        }
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $cekemail = DB::table('guest')->where('email', $username)->first();

        if ($cekemail == false) {
            Alert::info('Oops', 'Email atau username anda belum terdaftar pada sistem kami');
            return redirect('/login');
        }

        if (!Hash::check($password, $cekemail->password)) {
            Alert::error('', 'Password anda salah');
            return redirect('/login');
        } else {
            Alert::success('Success', 'Login berhasil');
            return redirect('/')->with($request->session()->put([
                'guest_id' => $cekemail->guest_id,
                'nama' => $cekemail->nama,
                'is_login' => 1
            ]));
        }
    }
}
