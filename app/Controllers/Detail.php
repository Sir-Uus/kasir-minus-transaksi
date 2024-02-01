<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenjualanModel;

class Detail extends BaseController
{
    protected $beforeFilters = ['auth'];
    public function index()
    { 
        $penjualan = new PenjualanModel;
        $data['penjualans'] = $penjualan->findAll();
        return view('admin/detail',$data);
    }
}
