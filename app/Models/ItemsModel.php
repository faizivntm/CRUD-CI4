<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{
    protected $table            = 'items';
    protected $primaryKey       = 'items_id';

    protected $allowedFields = [
        'nama_barang',
        'category',
        'harga_barang',
        'tanggal_pembelian',
        'is_selected'
    ];

    
}
