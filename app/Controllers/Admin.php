<?php

namespace App\Controllers;

use App\Models\VehicleModel;
use App\Models\RegionsModel;
use App\Models\ReservationModel;
use App\Models\UserModel;   
use App\Models\DriverModel;   
use App\Models\ApprovalModel;   
class Admin extends BaseController
{
    protected $vehicleModel;
    protected $regionsModel;
    protected $reservationsModel;
    protected $userModel;
    protected $approvalModel;
    protected $driverModel;

    public function __construct()
    {
        $this->reservationsModel = new ReservationModel();
        $this->vehicleModel = new VehicleModel();
        $this->regionsModel = new RegionsModel();
        $this->userModel = new UserModel();
        $this->approvalModel = new ApprovalModel();
        $this->driverModel = new DriverModel();
    }
    public function index(): string
    {
   // Mengambil data statistik
    $totalVehicles = $this->vehicleModel->countAll();
    $totalDrivers = $this->driverModel->countAll();
    
    // Menghitung kendaraan dan driver yang sudah diterima
    $acceptedVehicles = $this->reservationsModel->where('status', 'Accepted')->join('vehicles', 'vehicles.id = reservations.vehicle_id')->countAllResults();
    $acceptedDrivers = $this->reservationsModel->where('status', 'Accepted')->distinct()->countAllResults('driver_name');
    
    // Menghitung kendaraan dan driver yang sudah ditolak
    $rejectedVehicles = $this->reservationsModel->where('status', 'Rejected')->join('vehicles', 'vehicles.id = reservations.vehicle_id')->countAllResults();
    $rejectedDrivers = $this->reservationsModel->where('status', 'Rejected')->distinct()->countAllResults('driver_name');
    
    // Menghitung kendaraan dan driver yang siap
    $vehiclesReady = $totalVehicles - $acceptedVehicles - $rejectedVehicles;
    $driversReady = $totalDrivers - $acceptedDrivers - $rejectedDrivers;
    
    // Menghitung reservasi diterima dan ditolak
    $acceptedReservations = $this->reservationsModel->where('status', 'Accepted')->countAllResults();
    $rejectedReservations = $this->reservationsModel->where('status', 'Rejected')->countAllResults();

    // Menyiapkan data untuk view

    $reservations = $this->reservationsModel->getReservationsWithVehicleType(); // Update method sesuai kebutuhan
    $data = [
        'title' => 'Dashboard',
        'menu' => 'dashboard',
        'totalVehicles' => $totalVehicles,
        'totalDrivers' => $totalDrivers,
        'vehiclesReady' => $vehiclesReady,
        'driversReady' => $driversReady,
        'acceptedReservations' => $acceptedReservations,
        'rejectedReservations' => $rejectedReservations,
        'reservations' => $reservations

        ];
        return view('admin/dashboard', $data);
    }

        //Vehicle Models
    public function manajemen_vehicle()
    {
        // Mengambil semua data kendaraan dari model
        $vehicleModel = $this->vehicleModel->findAll();
        
        // Menyiapkan data untuk view
        $data = [
            'title' => 'Manajemen Kendaraan',
            'menu' => 'manajemen',
            'vehicles' => $vehicleModel // Gunakan 'vehicles' sebagai kunci
        ];
        
        // Mengirim data ke view 'admin/manajemenArtikel'
        return view('admin/manajemenVehicle', $data);
    }

public function detail_vehicle($id)
{

    $vehicle = $this->vehicleModel->where('vehicles.id', $id)
                                  ->select('vehicles.*, regions.name as region_name')
                                  ->join('regions', 'vehicles.region_id = regions.id', 'left')
                                  ->first();

    // Memeriksa apakah data kendaraan ditemukan
    if (!$vehicle) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Kendaraan dengan ID ' . $id . ' tidak ditemukan.');
    }

    // Menyiapkan data untuk view
    $data = [
        'title' => 'Detail Kendaraan',
        'menu' => 'detail',
        'kendaraan' => $vehicle
    ];

    // Mengirim data ke view 'admin/detailVehicle'
    return view('admin/detailVehicle', $data);
}


public function reservation_list()
{
    // Mengambil semua data reservasi dengan join ke vehicles
    $reservations = $this->reservationsModel->getReservationsWithVehicleType();

    // Menyiapkan data untuk view
    $data = [
        'title' => 'Daftar Reservasi Kendaraan',
        'menu' => 'reservasi',
        'reservations' => $reservations // Gunakan 'reservations' sebagai kunci
    ];

    // Mengirim data ke view 'reservations/index'
    return view('admin/reservationList', $data);
}


    
public function tambah_reservasi()
{
    // Inisialisasi model yang diperlukan
    $regionModel = new \App\Models\RegionsModel();
    $vehicleModel = new \App\Models\VehicleModel(); 
    $userModel = new \App\Models\UserModel(); 
    $approvalModel = new \App\Models\ApprovalModel(); 
    $driverModel = new \App\Models\DriverModel(); // Tambahkan model driver
    
    $data = [
        'title' => 'Tambah Reservasi',
        'menu' => 'Reservasi',
        'validation' => \Config\Services::validation(),
        'reservations' => $regionModel->findAll(),
        'vehicles' => $vehicleModel->findAll(),
        'users' => $userModel->findAll(),
        'approvers' => $approvalModel->findAll(),
        'drivers' => $driverModel->findAll(), // Ambil data driver
    ];

    return view('admin/addReservation', $data);
}
    
    public function save_reservation()
    {
    $reservationId = $this->reservationsModel->insert([
    'vehicle_id' => $this->request->getVar('vehicle_id'),
    'admin_id' => $this->request->getVar('admin_id'),
    'driver_name' => $this->driverModel->find($this->request->getVar('driver_id'))['name'],
    'approval_id' => 6, // Diset null karena approval dilakukan kemudian
    'status' => 'Pending',
    'reservation_date' => $this->request->getVar('reservation_date'),
    'start_date' => $this->request->getVar('start_date'),
    'end_date' => $this->request->getVar('end_date'),
    'purpose' => $this->request->getVar('purpose')
        ]);

        // Menambahkan entri ke tabel approval
        $this->approvalModel->insert([
            'reservation_id' => $reservationId,
            'approver_id' => $this->request->getVar('approval_id'),
            'status' => 'Pending',
            'comments' => '',
            'approved_at' => null
        ]);

        return redirect()->to('/reservation_list');
    }
    
    public function list()
    {
    // Mengambil semua data kendaraan dari model
    $regionModel = $this->regionsModel->findAll();
    
    // Menyiapkan data untuk view
    $data = [
        'title' => 'List Region',
        'menu' => 'region list',
        'regions' => $regionModel // Gunakan 'vehicles' sebagai kunci
    ];
    
    return view('admin/regionList', $data);
}
    public function tambah_region()
    {
    // Mengambil semua data kendaraan dari model
    $regionModel = $this->regionsModel->findAll();
    
    // Menyiapkan data untuk view
    $data = [
        'title' => 'Tambah Region',
        'menu' => 'region list',
        'regions' => $regionModel // Gunakan 'vehicles' sebagai kunci
    ];
    

    return view('admin/addRegion', $data);
}

 
    public function save_region()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Region wajib diisi !'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong !'
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/list/tambah_region');
        } else {
            $this->regionsModel->save([
                'name' => $this->request->getVar('name'),
                'address' => $this->request->getVar('address')
            ]);
            return redirect()->to('/list');
        }
    }

    public function tambah_vehicle()
{
    // Inisialisasi model jika diperlukan
    $regionModel = new \App\Models\RegionsModel();

    $data = [
        'title' => 'Tambah Kendaraan',
        'menu' => 'manajemen',
        'validation' => \Config\Services::validation(), // Mengambil layanan validasi
        'regions' => $regionModel->findAll() // Mengambil data regions jika dibutuhkan
    ];
    
    return view('admin/addVehicle', $data);
}

public function save()
{
    if (!$this->validate([
        'registration_number' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor Registrasi wajib diisi!'
            ]
        ],
        'type' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jenis Kendaraan wajib diisi!'
            ]
        ],
        'ownership' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kepemilikan wajib diisi!'
            ]
        ],
        'fuel_type' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jenis BBM wajib diisi!'
            ]
        ],
        'region_id' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Region wajib dipilih!'
            ]
        ],
        'last_service_date' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanggal Service Terakhir wajib diisi!'
            ]
        ],
        'next_service_date' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanggal Service Berikutnya wajib diisi!'
            ]
        ],
        'fuel_consumption' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Konsumsi BBM wajib diisi!'
            ]
        ],
    ])) {
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to('/tambah_artikel')->withInput();
    }

    // Simpan data jika validasi lolos
    $this->vehicleModel->save([
        'registration_number' => $this->request->getVar('registration_number'),
        'type' => $this->request->getVar('type'),
        'ownership' => $this->request->getVar('ownership'),
        'fuel_type' => $this->request->getVar('fuel_type'),
        'region_id' => $this->request->getVar('region_id'),
        'last_service_date' => $this->request->getVar('last_service_date'),
        'next_service_date' => $this->request->getVar('next_service_date'),
        'fuel_consumption' => $this->request->getVar('fuel_consumption'),
    ]);

    return redirect()->to('/manajemen_vehicle');
}

public function region_vehicles()
{
    $vehiclesModel = $this->vehicleModel; // Pastikan untuk menggunakan properti model
    $regionsModel = $this->regionsModel; // Pastikan untuk menggunakan properti model
    
    // Mengambil semua data kendaraan dan region dari model
    $vehicleData = $vehiclesModel->getVehiclesPerRegion(); // Pastikan method ini ada di VehicleModel
    $regionData = $regionsModel->findAll();
    
    // Menyiapkan data untuk view
    $data = [
        'title' => 'Daftar Kendaraan Per Region',
        'menu' => 'region-vehicles',
        'regions' => $regionData, // Data region
        'vehicles' => $vehicleData // Data kendaraan
    ];
    
    // Mengirim data ke view 'admin/regionVehicle'
    return view('admin/regionVehicle', $data);
}





    public function driver_list()
    {
        $drivers = $this->driverModel->findAll();
        
        $data = [
            'title' => 'List Driver',
            'menu' => 'driver list',
            'drivers' => $drivers
        ];
        
        return view('admin/driverLists', $data);
    }

    public function driver_add()
    {
        $data = [
            'title' => 'Tambah Driver',
            'menu' => 'Tambah Driver'
        ];
        
        return view('admin/addDriver', $data);
    }

    public function save_driver()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Driver wajib diisi!'
                ]
            ],
            'license_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Lisensi wajib diisi!'
                ]
            ],
        ])) {
            $errors = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/driver_list/driver_add')->withInput();
        } else {
            $this->driverModel->save([
                'name' => $this->request->getVar('name'),
                'license_number' => $this->request->getVar('license_number'),
                'status' => $this->request->getVar('status') // Assuming status is being submitted from the form
            ]);
            return redirect()->to('/driver_list');
        }
    }


}
