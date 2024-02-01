<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table            = 'detailpenjualan';
    protected $primaryKey       = 'detailid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['penjualanid','produkid','jumlahproduk','subtotal'];
}
