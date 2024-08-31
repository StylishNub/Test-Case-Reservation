<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<!-- Tambahkan tabel daftar reservasi di bawah ini -->
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold"><?= $title; ?></h2>
    </div>
    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <!-- Tombol untuk Ekspor ke Excel -->
        <a href="<?= base_url('detail_reservasi/export_excel'); ?>" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
            Ekspor ke Excel
        </a>
    </div>
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">No.</th>
                    <th class="py-3 px-6 text-left">Type</th>
                    <th class="py-3 px-6 text-left">Driver</th>
                    <th class="py-3 px-6 text-center">Reservasi</th>
                    <th class="py-3 px-6 text-center">Mulai</th>
                    <th class="py-3 px-6 text-center">Selesai</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
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
                        <td class="py-3 px-6 text-center">
                            <a href="<?= base_url('reservations/edit/' . $reservation['id']); ?>" class="text-blue-500 hover:underline">Edit</a> | 
                            <a href="<?= base_url('reservations/delete/' . $reservation['id']); ?>" class="text-red-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->endSection(); ?>
