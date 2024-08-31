<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold"><?= $title; ?></h1>
        <a href="/manajemen_vehicle/tambah_vehicle" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Tambah Kendaraan
        </a>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded relative mb-6">
        <strong class="font-medium"><?= session()->getFlashdata('pesan') ?></strong>
    </div>
    <?php endif ?>

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-blue-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">No Registrasi</th>
                    <th class="py-3 px-6 text-left">Jenis</th>
                    <th class="py-3 px-6 text-left">Kepemilikan</th>
                    <th class="py-3 px-6 text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($vehicles as $index => $k) : ?>
                <tr class="border-b border-blue-200 hover:bg-blue-100">
                    <td class="py-3 px-6 text-left"><?= esc($k['registration_number']); ?></td>
                    <td class="py-3 px-6 text-left"><?= esc($k['type']); ?></td>
                    <td class="py-3 px-6 text-left"><?= esc($k['ownership']); ?></td>
                    <td class="py-3 px-6 text-center">
                        <a href="/manajemen_vehicle/edit_vehicle/<?= esc($k['id']); ?>" class="text-blue-500 hover:underline mr-4">
                            Edit
                        </a> |
                        <a href="/manajemen_vehicle/detail_vehicle/<?= esc($k['id']); ?>" class="text-blue-500 hover:underline mr-4">
                            View
                        </a> |
                        <a href="/manajemen_vehicle/delete_vehicle/<?= esc($k['id']); ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?');">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->endSection(); ?>
