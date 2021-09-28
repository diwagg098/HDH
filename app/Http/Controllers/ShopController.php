<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $content = DB::table('products')->where('status', 'ready')->get();
        return view('shop', compact('content'));
    }
}
