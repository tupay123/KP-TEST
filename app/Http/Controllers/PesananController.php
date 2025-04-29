<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::paginate(10); // 10 pesanan per halaman
        return view('pesanan.index', compact('pesanans'));
    }
    public function create($id)
    {
        $food = Food::findOrFail($id);
        return view('pesanan.create', compact('food'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:food,id', // Pastikan food_id ada di database
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jumlah' => 'required|integer|min:1',
        ]);

        $food = Food::findOrFail($request->food_id);
        $totalHarga = $food->price * $request->jumlah;

        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-0SLs1-4RoiG0NolYKN77ehzs';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat transaksi Snap
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . uniqid(),  // Generate unique order ID
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => $request->nama_pemesan,
                'phone' => $request->no_hp,
            ],
            'item_details' => [
                [
                    'id' => $food->id,
                    'price' => $food->price,
                    'quantity' => $request->jumlah,
                    'name' => $food->name,
                ],
            ],
        ];

        // Ambil Snap Token dari Midtrans
        $snapToken = Snap::getSnapToken($params);

        // Simpan pesanan ke database
        $pesanan = Pesanan::create([
            'food_id' => $food->id,
            'nama_pemesan' => $request->nama_pemesan,
            'no_hp' => $request->no_hp,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'order_id' => $params['transaction_details']['order_id'], // Simpan order_id
            'status' => 'pending', // Status awal adalah pending
        ]);

        // Redirect ke halaman pembayaran dengan Snap Token
        return view('pesanan.bayar', compact('snapToken', 'pesanan'));
    }


}
