<?php

namespace App\Http\Controllers;

use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid as UuidUuid;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $cartr_id = UuidUuid::uuid4();
        $id_guest = $request->id_guest;
        // dd($request->all());
        $request->validate(
            [
                'email' => 'required|email',
                'nama' => 'required',
                'telp' => 'required|numeric',
                'payment_metode' => 'required',
                'checkin' => 'required',
                'checkout' => 'required',
                'jumlah_tamu' => 'required'
            ],
            [
                'email.required' => 'email wajib diisi',
                'email.email' => 'email anda tidak valid',
                'nama.required' => 'nama harus diisi',
                'telp.required' => 'No telpon harus diisi',
                'telp.numeric' => 'No Telp harus berupa angka',
                'payment_metode.required' => 'Payment metode harus diisi',
                'checkin.required' => 'Tanggal Check-in harus diisi',
                'checkout.required' => 'Tangal Check-out harus diisi',
                'jumlah_tamu' => 'Jumlah tamu wajib diisi'
            ]
        );


        if ($request->bookingby == null) {
            $request->validate(
                [
                    'namaother' => 'required',
                    'emailother' => 'required|email',
                    'telpother' => 'required|numeric'
                ],
                [
                    'namaother.required' => 'Jika anda memesan untuk orang lain nama pengunjung harus diisi',
                    'emailother.required' => 'Jika anda memesan untuk orang lain email pengunjung harus diisi',
                    'telpother.required' => 'Jika anda memesan untuk orang lain No Telp pengunjung harus diisi',
                ]
            );
            $request->bookingby = 'for other';

            $databooking = [
                'for' => $request->bookingby,
                'email' => $request->emailother,
                'telp' => $request->telpother,
                'name' => $request->namaother,
                'note' => $request->note,
                'cart_id' => $cartr_id,
                'sub_total' => $request->gross_amount,
                'payment' => $request->payment_metode,
                'created_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $databooking = [
                'for' => $request->bookingby,
                'email' => $request->email,
                'telp' => $request->telp,
                'name' => $request->nama,
                'note' => $request->note,
                'cart_id' => $cartr_id,
                'sub_total' => $request->gross_amount,
                'payment' => $request->payment_metode,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        $datakamar = [
            'id_guest' => $id_guest,
            'cartr_id' => $cartr_id,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'jumlah_tamu' => $request->jumlah_tamu,
            'tipe_kamar' => $request->tipe_kamar,
            'status_cart' => 0
        ];

        // dd($databooking);

        $savecart = DB::table('cartroom')->insert($datakamar);
        $savebooking = DB::table('booking')->insert($databooking);

        if ($savecart && $savebooking) {
            Alert::success('', 'Berhasil');
            return redirect('/midtrans/' . $id_guest . '/' . $cartr_id);
        } else {
            Alert::error('', 'Oops');
            return redirect()->back();
        }
    }

    public function midtrans(Request $request, $id_guest, $id_cart)
    {
        $this->_initPaymentGateway();

        $booking = DB::table('booking')->where('cart_id', $id_cart)->first();
        $guest = DB::table('cartroom')->where('id_guest', $id_guest)->where('cartr_id', $id_cart)
            ->join('guest', 'guest.guest_id', '=', 'cartroom.id_guest')
            ->first();

        // dd($booking);

        if ($booking->payment == 'pembayaran online') {
            $gross_amount = $booking->sub_total;
        } else {
            $gross_amount = $booking->sub_total / 2;
        }

        $customer_details = [
            'first_name' => $guest->nama,
            'email' => $guest->email,
            'phone' => $guest->telp,
        ];

        $params = array(
            "enabled_payments" => [
                "bri_va", "bca_va", "permata_va", "mandiri_bill", "bni_va", "mandiri_va",
            ],
            'transaction_details' => array(
                'order_id' => $guest->cartr_id,
                'gross_amount' => $gross_amount
            ),
            'customer_details' => $customer_details
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('midtrans', compact('snapToken'));
    }

    public function transaction(Request $request)
    {
        $id_order = rand();
        $simpan = [
            'id_order' => $id_order,
            'id_cart' => $request->order_id,
            'gross_amount' => $request->gross_amount,
            'payment_type' => $request->payment_type,
            'transaction_time' => $request->transaction_time,
            'transaction_status' => $request->transaction_status,
            'status_code' => $request->status_code,
            'transaction_id' => $request->transaction_id
        ];

        DB::table('billing')->insert($simpan);
        Alert::success('Success', 'Transaksi anda sedang diproses, bukti akan dikirim ke email anda');
        return redirect('/');
    }
}
