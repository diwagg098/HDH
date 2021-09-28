<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index(Request $request, $id_guest)
    {
        $ceksesi = $request->session()->has('is_login');

        if ($ceksesi != 1) {
            Alert::info('', 'Anda harus login dulu untuk melakukan pemesanan');
            return redirect('/login');
        }

        $product = DB::table('cartproduct')->where('id_guest', $id_guest)
            ->join('products', 'products.product_id', '=', 'cartproduct.id_product')
            ->get();

        $room = DB::table('cartroom')->where('id_guest', $id_guest)
            ->where('status_cart', 0)
            ->join('rooms', 'rooms.nama_kamar', '=', 'cartroom.tipe_kamar')
            ->get();


        $data = [
            'product' => $product,
            'room' => $room
        ];
        return view('checkout', $data);
    }

    public function makeCart(Request $request)
    {
        $ceksesi = $request->session()->has('is_login');

        if (!$ceksesi) {
            Alert::info('', 'Anda harus login dulu untuk melakukan pemesanan');
            return redirect('/login');
        }

        $data = [
            'cartp_id' => Uuid::uuid4(),
            'id_guest' => $request->id_guest,
            'id_product' => $request->id_product,
            'jumlah' => 1,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $save = DB::table('cartproduct')->insert($data);
        if ($save) {
            Alert::success('Success', 'Product telah ditambahkan kedalam keranjang');
            return redirect('/checkout/' . $request->id_guest);
        } else {
            Alert::info('', 'Oops terjadi kesalahan');
            return redirect()->back();
        }
    }

    public function makereserv(Request $request)
    {
        $ceksesi = $request->session()->has('is_login');

        if (!$ceksesi) {
            Alert::info('', 'Anda harus login dulu untuk melakukan pemesanan');
            return redirect('/login');
        }

        $data = [
            'checkin' => $request->checkin,
            'cartr_id' => Uuid::uuid4(),
            'checkout' => $request->checkout,
            'tipe_kamar' => $request->type_kamar,
            'jumlah_tamu' => $request->jumlah_tamu,
            'id_guest' => $request->id_guest,
            'status_cart' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $save = DB::table('cartroom')->insert($data);
        if ($save) {
            Alert::success('', 'Kamar sudah ditambahkan dalam keranjang, Silahkan lakukan proses pembayaran');
            return redirect('/checkout/' . $request->id_guest);
        } else {
            Alert::info('', 'Oops terjadi kesaahan dalam pemesanan kamar');
            return redirect('/');
        }
    }
}
