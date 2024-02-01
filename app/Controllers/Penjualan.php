<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenjualanModel;
use App\Models\DetailModel;

class Penjualan extends BaseController
{

    Public function store()
    {
        $penjualan = new PenjualanModel;
        $detail = new DetailModel;
        $data = [
            'tanggalpenjualan' => $this->request->getPost('tanggalpenjualan'),
            'totalharga' => $this->request->getPost('totalharga'),
            'pelangganid' => $this->request->getPost('pelangganid'),

        ];

        $penjualan->insert($data);


        // $modalTableRows = $this->request->getPost('modal_table_rows'); // Berikan name pada element form yang menyimpan rows
        // $detailData = [];

        // foreach ($modalTableRows as $row) {
        //     $productName = $row['product_name'];
        //     $qty = $row['qty'];

        //     // Simpan data ke tabel 'detail'
        //     $detailData[] = [
        //         'penjualan_id' => $penjualanId,
        //         'product_name' => $productName,
        //         'qty' => $qty,
        //     ];
        // }

        // Simpan data ke tabel 'detail'
        // $detailModel->insertBatch($detailData);

        // Response success atau error sesuai kebutuhan        
        // $data2 = [
        //     $produk = $this->request->getPost('produkid'),
        //     $jumlahproduk = $this->request->getPost('jmlproduk'),
        //     $subtotal = $this->request->getPost('subtotal')
        // ];

        // $detail->insert($data2);

        return redirect('dashboard')->with("success","Data penjualan berhasil ditambah");
    }
    public function index()
    {
        $penjualan = new PenjualanModel;
        $data['penjualans'] = $penjualan->findAll();
        return view('detail',$data);
    }
}
