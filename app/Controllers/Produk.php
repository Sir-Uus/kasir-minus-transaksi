<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $beforeFilters = ['auth'];

        public function index()
    {
        //
        $produk = new ProdukModel;
        $data['produks'] = $produk->findAll();
        return view('admin/produk',$data);
    }
    public function store()
    {
        $produk = new ProdukModel;

        $file = $this->request->getFile('gambar');

        if($file->isValid() && ! $file->hasMoved())
        {
            $imgname = $file->getRandomName();
            $file->move(WRITEPATH . '../public/img/',$imgname);
        }else{
            echo 'error';
        }

     $data = [
         'namaproduk' => $this->request->getPost('namaproduk'),
         'harga' => $this->request->getPost('harga'),
         'gambar' => $file->getName(    ),
         'stok' => $this->request->getPost('stok'),
    ];

         $produk->insert($data);
         return redirect('produk')->with("success","Data produk berhasil ditambah");
    }
    public function edit($id)
    {
        $produk = new ProdukModel; 
        $dataproduk = $produk->find($id);
        return view("admin/editproduk",['dataproduk'=>$dataproduk]);
    }
    public function update()
    {
        $produk  = new ProdukModel;
        $produk->update($this->request->getPost('produkid'),$this->request->getPost());
        return redirect('produk')->with("success","Data berhasil diupdate");
    }
    public function delete($id)
    {
        $produk = new ProdukModel;
        $produk->delete($id);
        return redirect('produk')->with('success','Data berhasil diHapus');
    }
    public function addToCart()
{
    $productName = $this->request->getPost('namaproduk');
    $productPrice = $this->request->getPost('harga');

    // Lakukan operasi penambahan produk ke dalam keranjang di sini (misalnya, simpan dalam session atau database)
    
    // Contoh: Simpan dalam session
    $cart = session('cart') ?? [];
    $cart[] = [
        'namaproduk' => $productName,
        'harga' => $productPrice,
    ];
    session()->set('cart', $cart);

    return json_encode(['status' => 'success']);
}
}
