<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    public function show()
    {
        return view('produk.show');
    }

    public function create()
    {
        return view('produk.create');
    }

    public function list()
    {
        return view('produk.list');
    }

    public function edit($id)
    {
        return view('produk.edit', ['id' => $id]);
    }

    public function export()
    {
        return Excel::download(new ProdukExport, 'produk.xlsx');
    }
}
