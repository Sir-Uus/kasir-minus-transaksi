<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $beforeFilters = ['auth'];

    public function index()
    {
        //
        $pelanggan = new PelangganModel;
        $data['pelanggans'] = $pelanggan->findAll();
        return view('admin/pelanggan',$data);
    }
    public function store()
    {
        $pelanggan = new PelangganModel;
        $pelanggan->insert($this->request->getPost());
        return redirect('pelanggan')->with("success","Data pelanggan berhasil ditambah");
    }
    public function edit($id)
    {
        $pelanggan = new PelangganModel; 
        $datapelanggan = $pelanggan->find($id);
        return view("admin/editpelanggan",['datapelanggan'=>$datapelanggan]);
    }
    public function update()
    {
        $pelanggan  = new PelangganModel;
        $pelanggan->update($this->request->getPost('pelangganid'),$this->request->getPost());
        return redirect('pelanggan')->with("success","Data berhasil diupdate");
    }
    public function delete($id)
    {
        $pelanggan = new PelangganModel;
        $pelanggan->delete($id);
        return redirect('pelanggan')->with('success','Data berhasil diHapus');
    }
}
