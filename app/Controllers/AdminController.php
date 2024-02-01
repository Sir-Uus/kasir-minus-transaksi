<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;
use App\Models\PelangganModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "admin"){
            echo 'acces denied';
            exit;
        }
    }
    public function index()
    {
        $produk = new ProdukModel;
        $pelanggan = new PelangganModel;
        
        $data['pelanggans'] = $pelanggan->findAll();
        $data['produks'] = $produk->findAll();
        return view('admin/dashboard',$data);
    }
}
