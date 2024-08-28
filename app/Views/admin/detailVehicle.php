<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<h1 class="text-2xl font-bold mb-6">Detail Kendaraan</h1>

<div class="w-full">
    <?php if ($kendaraan) : ?>
    <div class="mb-6">
        <h2 class="text-xl font-semibold">Nomor Registrasi: <?= esc($kendaraan['registration_number']); ?></h2>
        <p class="text-lg">Jenis Kendaraan: <?= esc($kendaraan['type']); ?></p>
        <p class="text-lg">Kepemilikan: <?= esc($kendaraan['ownership']); ?></p>
        <p class="text-lg">Jenis BBM: <?= esc($kendaraan['fuel_type']); ?></p>
        <p class="text-lg">Region: <?= esc($kendaraan['region_name']); ?></p>
        <p class="text-lg">Tanggal Service Terakhir: <?= esc($kendaraan['last_service_date']); ?></p>
        <p class="text-lg">Tanggal Service Berikutnya: <?= esc($kendaraan['next_service_date']); ?></p>
        <p class="text-lg">Konsumsi BBM: <?= esc($kendaraan['fuel_consumption']); ?> L</p>
    </div>
    <?php else: ?>
    <p>Kendaraan tidak ditemukan.</p>
    <?php endif; ?>
</div>

<?php $this->endSection(); ?>
