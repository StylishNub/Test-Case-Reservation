<?php
namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'reservations';
    protected $allowedFields = [
        'vehicle_id', 'admin_id', 'driver_name', 'approval_id',
        'status', 'reservation_date', 'start_date', 'end_date', 'purpose'
    ];

    // Method untuk mendapatkan reservasi dengan join tabel vehicles
    public function getReservationsWithVehicleType()
    {
        return $this->select('reservations.*, vehicles.type, vehicles.registration_number')
                    ->join('vehicles', 'reservations.vehicle_id = vehicles.id')
                    ->findAll();
    }

        public function getReservationsWithVehicleTypeAndAdmin()
    {
        return $this->select('reservations.*, vehicles.type as vehicle_type,vehicles.registration_number , user.name as admin_name')
                    ->join('vehicles', 'vehicles.id = reservations.vehicle_id')
                    ->join('user', 'user.id = reservations.admin_id')
                    ->findAll();
    }
}
