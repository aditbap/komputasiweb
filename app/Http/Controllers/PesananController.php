<?php

namespace App\Http\Controllers;

class PesananController extends Controller
{
    public function histori()
    {
        // Contoh data histori pesanan
        $data = [
            [
                'id' => 1,
                'produk' => 'Produk A',
                'jumlah' => 2,
                'harga' => 50000,
                'tanggal' => '2025-01-01',
            ],
            [
                'id' => 2,
                'produk' => 'Produk B',
                'jumlah' => 1,
                'harga' => 75000,
                'tanggal' => '2025-01-03',
            ],
        ];

        return response()->json($data);
    }
}
