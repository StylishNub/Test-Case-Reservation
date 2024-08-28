<?php

namespace App\Models;

use CodeIgniter\Model;

class RegionsModel extends Model
{
    protected $table = 'regions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','name','address', 'created_at'];
}
