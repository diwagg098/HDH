<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function index()
    {
        $content = DB::table('rooms')->limit(3)->get();
        return view('reservation', compact('content'));
    }

    public function reserv(Request $request, $id_kamar)
    {
        $ceksesi = $request->session()->has('is_login');
        if (!$ceksesi) {
            Alert::info('', 'Anda harus login terlebih dahulu untuk melakukan pemesanan');
            return redirect('/login');
        }

        $content = DB::table('rooms')->where('id_kamar', $id_kamar)->first();


        Alert::info("", 'Silahkan isi form ini');
        return view('roompayment', compact('content'));
    }
}
