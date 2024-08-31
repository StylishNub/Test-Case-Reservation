<?php
namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\ReservationModel;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Approval extends BaseController
{
    protected $AuthModel;
    protected $ReservationModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
        $this->ReservationModel = new ReservationModel();
        helper('session');
    }

    public function index()
    {
        // Mengambil semua data reservasi dengan join ke vehicles dan approval
        $reservations = $this->ReservationModel->getReservationsWithVehicleTypeAndAdmin();

        // Menyiapkan data untuk view
        $data = [
            'title' => 'Daftar Reservasi Kendaraan',
            'menu' => 'reservasi',
            'reservations' => $reservations // Gunakan 'reservations' sebagai kunci
        ];

        // Mengirim data ke view 'approval/home'
        return view('approval/home', $data);
    }

    public function update_status($reservationId, $status)
    {
        // Validasi status yang diterima
        if (!in_array($status, ['Accepted', 'Rejected'])) {
            return redirect()->back()->with('error', 'Invalid status.');
        }

        // Memperbarui status reservasi
        $this->ReservationModel->update($reservationId, ['status' => $status]);

        // Redirect ke daftar reservasi
        return redirect()->to('/home');
    }

    public function detail_reservasi()
    {
        // Mengambil semua data reservasi dengan join ke vehicles dan approval
        $reservations = $this->ReservationModel->getReservationsWithVehicleType();

        // Menyiapkan data untuk view
        $data = [
            'title' => 'Daftar Reservasi Kendaraan',
            'menu' => 'reservasi',
            'reservations' => $reservations // Gunakan 'reservations' sebagai kunci
        ];

        // Mengirim data ke view 'approval/detailReservation'
        return view('approval/detailReservation', $data);
    }


    public function export_excel()
    {
        // Mengambil semua data reservasi
        $reservations = $this->ReservationModel->getReservationsWithVehicleTypeAndAdmin();

        // Membuat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Type');
        $sheet->setCellValue('C1', 'Driver');
        $sheet->setCellValue('D1', 'Reservasi');
        $sheet->setCellValue('E1', 'Mulai');
        $sheet->setCellValue('F1', 'Selesai');
        $sheet->setCellValue('G1', 'Status');

        // Isi data dari database
        $row = 2;
        foreach ($reservations as $index => $reservation) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $reservation['vehicle_type']); // Ubah ini
            $sheet->setCellValue('C' . $row, $reservation['driver_name']);
            $sheet->setCellValue('D' . $row, $reservation['reservation_date']);
            $sheet->setCellValue('E' . $row, $reservation['start_date']);
            $sheet->setCellValue('F' . $row, $reservation['end_date']);
            $sheet->setCellValue('G' . $row, $reservation['status']);
            $row++;
        }


        // Menyimpan file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Daftar_Reservasi_' . date('Y-m-d') . '.xlsx';

        // Mengirim file sebagai response untuk diunduh
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($filename) . '"');
        $writer->save('php://output');
        exit;
    }
}
