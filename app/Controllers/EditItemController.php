<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemsModel;
use CodeIgniter\HTTP\ResponseInterface;

class EditItemController extends BaseController
{
    public function index()
    {
        $items_id = $this->request->getGet('items_id');
        $nama_barang = $this->request->getGet('nama_barang');
        $category = $this->request->getGet('category');
        $harga_barang = $this->request->getGet('harga_barang');
        $tanggal_pembelian = $this->request->getGet('tanggal_pembelian');

        $data = [
            'items_id' => $items_id,
            'nama_barang' => $nama_barang,
            'category' => $category,
            'harga_barang' => $harga_barang,
            'tanggal_pembelian' => $tanggal_pembelian
        ];
        
        return view( 'edit', $data);
    }

    public function edit(){
        $model = new ItemsModel();

        $items_id = $this->request->getPost('items_id');
        $nama_barang = $this->request->getPost('nama_barang');
        $category = $this->request->getPost('category');
        $harga_barang = $this->request->getPost('harga_barang');
        $tanggal_pembelian = $this->request->getPost('tanggal_pembelian');

        $data = [
            'nama_barang' => $nama_barang,
            'category' => $category,
            'harga_barang' => $harga_barang,
            'tanggal_pembelian' => $tanggal_pembelian . ' 00:00:00',
        ];

        if($model->update($items_id, $data)){
               return redirect()->to(base_url('/dashboard'));
        } else{
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }
}
