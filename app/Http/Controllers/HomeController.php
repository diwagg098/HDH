<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $ip = $request->ip();
        $date = date('Y-m-d');

        $datap = DB::table('pengunjung')->where('ip', $ip)->where('date', $date)->first();
        if (!$datap) {
            $datap = [
                'ip' => $ip,
                'date' => $date
            ];
            DB::table('pengunjung')->insert($datap);
        }


        $gallery = DB::table('gallery')->get();
        $rooms = DB::table('rooms')->limit(3)->get();
        $products = DB::table('products')->where('status', 'ready')->limit(4)->get();
        $fitur = DB::table('rooms')->limit(3)->get('fitur');

        // dd($products);


        // $decode = json_decode($fitur);

        // return json_decode($fitur);

        $data = [
            'gallery' => $gallery,
            'rooms' => $rooms,
            'products' => $products,
            'fitur' => $fitur
        ];

        return view('welcome', $data);
    }
}
