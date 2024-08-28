<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','registration_number','type','ownership','fuel_type','region_id','last_service_date','next_service_date','fuel_consumption','created_at'];

     public function getVehiclesPerRegion()
    {
        return $this->select('vehicles.*, regions.name as region_name')
                    ->join('regions', 'vehicles.region_id = regions.id', 'left')
                    ->findAll();
    }
}
