<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<div class="flex flex-wrap mt-[60px] gap-4 justify-center">
    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-red-400 rounded-lg mb-4">
        <div class="text-xl font-extrabold mb-2">Jumlah Kendaraan</div>
        <div class="text-4xl"><?php echo $totalVehicles; ?></div>
    </div>
    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-yellow-400 rounded-lg mb-4">
        <div class="text-xl font-extrabold mb-2">Jumlah Driver</div>
        <div class="text-4xl"><?php echo $totalDrivers; ?></div>
    </div>
    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-green-400 rounded-lg mb-4">
        <div class="text-xl font-extrabold mb-2">Kendaraan Ready</div>
        <div class="text-4xl"><?php echo $vehiclesReady; ?></div>
    </div>
    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-gray-400 rounded-lg mb-4">
        <div class="text-xl font-extrabold mb-2">Driver Ready</div>
        <div class="text-4xl"><?php echo $driversReady; ?></div>
    </div>
    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-blue-400 rounded-lg mb-4">
        <div class="text-xl font-extrabold mb-2">Reservasi Diterima</div>
        <div class="text-4xl"><?php echo $acceptedReservations; ?></div>
    </div>
    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:flex-1 xl:w-1/2 2xl:w-[230px] p-4 bg-red-600 rounded-lg mb-4">
        <div class="text-xl font-extrabold mb-2">Reservasi Ditolak</div>
        <div class="text-4xl"><?php echo $rejectedReservations; ?></div>
    </div>
</div>

<!-- Tabel Status Reservasi -->
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-6">Status Reservasi</h2>
    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">No.</th>
                    <th class="py-3 px-6 text-left">Type</th>
                    <th class="py-3 px-6 text-left">Driver</th>
                    <th class="py-3 px-6 text-center">Reservasi</th>
                    <th class="py-3 px-6 text-center">Mulai</th>
                    <th class="py-3 px-6 text-center">Selesai</th>
                    <th class="py-3 px-6 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($reservations as $index => $reservation) : ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap"><?= $index + 1; ?></td>
                        <td class="py-3 px-6 text-left"><?= $reservation['type']; ?></td>
                        <td class="py-3 px-6 text-left"><?= $reservation['driver_name']; ?></td>
                        <td class="py-3 px-6 text-center"><?= $reservation['reservation_date']; ?></td>
                        <td class="py-3 px-6 text-center"><?= $reservation['start_date']; ?></td>
                        <td class="py-3 px-6 text-center"><?= $reservation['end_date']; ?></td>
                        <td class="py-3 px-6 text-center"><?= $reservation['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->endSection(); ?>
