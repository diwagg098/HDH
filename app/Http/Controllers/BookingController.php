<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function index(Request $request, $id_guest, $cartr_id)
    {
        $ceksesi = $request->session()->has('is_login');

        if (!$ceksesi) {
            Alert::info('', 'Silahkan login terlebih dahulu untuk melakukan pemesanan');
            return redirect('/login');
        }

        $content = DB::table('cartroom')->where('id_guest', $id_guest)->where('cartr_id', $cartr_id)
            ->join('rooms', 'rooms.nama_kamar', '=', 'cartroom.tipe_kamar')
            ->first();

        return view('payment', compact('content'));
    }
}
