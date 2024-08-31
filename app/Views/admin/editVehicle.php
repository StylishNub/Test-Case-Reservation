<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<h1 class="text-9 font-bold mb-20">Edit Kendaraan</h1>

<?php
$errors = session()->getFlashdata('errors');
if ($errors !== null && is_array($errors)) :
?>
    <div class="alert flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Danger</span>
        <div>
            <span class="font-medium">Terdapat beberapa error:</span>
            <ul class="mt-1.5 list-disc list-inside">
                <?php foreach ($errors as $error) : ?>
                    <li class=""><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<form action="<?= base_url('edit_vehicle/save_edit_vehicle'); ?>" method="post" class="w-180" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $vehicle['id']; ?>">
    
    <label for="registration_number" class="block mb-2 text-sm font-medium text-gray-900">Nomor Registrasi:</label>
    <input type="text" name="registration_number" id="registration_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= esc($vehicle['registration_number']); ?>">
    
    <div class="h-3"></div>
    <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kendaraan:</label>
    <input type="text" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= esc($vehicle['type']); ?>">
    
    <div class="h-3"></div>
    <label for="ownership" class="block mb-2 text-sm font-medium text-gray-900">Kepemilikan:</label>
    <input type="text" name="ownership" id="ownership" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= esc($vehicle['ownership']); ?>">
    
    <div class="h-3"></div>
    <label for="fuel_type" class="block mb-2 text-sm font-medium text-gray-900">Jenis BBM:</label>
    <input type="text" name="fuel_type" id="fuel_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= esc($vehicle['fuel_type']); ?>">
    
    <div class="h-3"></div>
    <label for="region_id" class="block mb-2 text-sm font-medium text-gray-900">Region:</label>
    <select name="region_id" id="region_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="">Pilih Region</option>
        <?php foreach ($regions as $region) : ?>
            <option value="<?= $region['id']; ?>" <?= ($region['id'] == $vehicle['region_id']) ? 'selected' : ''; ?>><?= esc($region['name']); ?></option>
        <?php endforeach; ?>
    </select>
    
    <div class="h-3"></div>
    <label for="last_service_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Service Terakhir:</label>
    <input type="date" name="last_service_date" id="last_service_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= esc($vehicle['last_service_date']); ?>">
    
    <div class="h-3"></div>
    <label for="next_service_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Service Berikutnya:</label>
    <input type="date" name="next_service_date" id="next_service_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= esc($vehicle['next_service_date']); ?>">
    
    <div class="h-3"></div>
    <label for="fuel_consumption" class="block mb-2 text-sm font-medium text-gray-900">Konsumsi BBM:</label>
    <input type="text" name="fuel_consumption" id="fuel_consumption" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= esc($vehicle['fuel_consumption']); ?>">
    
    <div class="h-3"></div>
    <button type="submit" class="py-2.5 px-5 bg-carrot-1 hover:bg-carrot-3 font-medium text-xs rounded-1 text-white transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>
