<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemsModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
            $model = new ItemsModel();


        $data['items'] = $model->where('is_selected', 0)->findAll();
        $data['selected_items'] = $model->where('is_selected', 1)->findAll();
        $data['total'] = $model
        ->selectSum('harga_barang')
        ->where('is_selected', 1)
        ->first()['harga_barang'] ?? 0;
        $data['items'] = $model->findAll();

        return view('dashboard', $data);
    }

        public function delete()
    {
        $model = new ItemsModel();

        $itemsId = $this->request->getPost('items_id');

        if (!$itemsId) {
            return redirect()->to(base_url('/dashboard'))->with('error', 'ID tidak ditemukan, gagal menghapus.');
        }

        $model->delete($itemsId);         
        return redirect()->to(base_url('/dashboard'))->with('success', 'Data berhasil dihapus');
    }

        public function select()
            {
                $id = $this->request->getPost('items_id');

                if(!$id) {
                    return redirect()->back()->with('error', 'ID item tidak valid');
                }

                $model = new ItemsModel;

                $model->update($id, ['is_selected' => 1]);

                return redirect()->to('/dashboard');
        }


        public function unselect()
        {
            $id = $this->request->getPost('items_id');

            $model = new ItemsModel();
            $model->update($id, ['is_selected' => 0]);

            return redirect()->to('/dashboard');
        }

}
