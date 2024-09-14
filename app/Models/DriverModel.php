<?php
namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model
{
    protected $table = 'drivers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'license_number', 'status'];
    protected $useTimestamps = true;

    public function getDriverByName($name)
    {
        return $this->where('name', $name)->first();
    }
}
