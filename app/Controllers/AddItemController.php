<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemsModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class AddItemController extends BaseController
{
    public function index()
    {
            return view(name: 'add');
    }

    public function addItems(){
        $model = new ItemsModel();

        $namaBarang = $this->request->getPost('nama_barang');
        $categoryBarang = $this->request->getPost('category');
        $hargaBarang = (int) $this->request->getPost('harga_barang');
        $tanggalPembelian = $this->request->getPost('tanggal_pembelian');

        $data = [
            'nama_barang'        => $namaBarang,
            'category'    => $categoryBarang,
            'harga_barang'       => $hargaBarang,
            'tanggal_pembelian'  => $tanggalPembelian . ' 00:00:00',
        ];

        if($namaBarang == ''){
            return redirect()->back()->with('error', 'Nama barang tidak boleh kosong');
        }
        if($categoryBarang == ''){
            return redirect()->back()->with('error', 'Category barang tidak boleh kosong');
        }   
        if($hargaBarang == ''){
            return redirect()->back()->with('error', 'Harga barang tidak boleh kosong');
        }        
        if($tanggalPembelian == ''){
            return redirect()->back()->with('error', 'Tanggal pembelian tidak boleh kosong');
        }

        if($model->insert($data)){
            return redirect()->to(base_url('/dashboard'));
        } else{
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }

    }
}
