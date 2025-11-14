<?php

namespace App\Models;

use CodeIgniter\Model;

class BatteryModel extends Model
{
    protected $table            = 'batteries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'type', 'capacity', 'voltage', 'price', 'category_id'];
}