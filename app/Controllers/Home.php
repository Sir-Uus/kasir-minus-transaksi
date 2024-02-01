<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;
use App\Models\PelangganModel;

class Home extends BaseController
{
    public function index()
    {
        $produk = new ProdukModel;
        $pelanggan = new PelangganModel;
        $data['pelanggans'] = $pelanggan->findAll();
        $data['produks'] = $produk->findAll();
        return view('admin/dashboard',$data);
    }
}
