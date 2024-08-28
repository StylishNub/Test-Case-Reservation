<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<div class="container mx-auto py-8">
    <form action="<?= base_url('tambah_reservasi/save_reservation'); ?>" method="post">
        <div class="mb-4">
            <label for="vehicle_id" class="block text-gray-700">Kendaraan</label>
            <select name="vehicle_id" id="vehicle_id" class="block w-full mt-1">
                <?php foreach ($vehicles as $vehicle) : ?>
                    <option value="<?= $vehicle['id']; ?>"><?= $vehicle['type']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="admin_id" class="block text-gray-700">Admin</label>
            <select name="admin_id" id="admin_id" class="block w-full mt-1">
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user['id']; ?>"><?= $user['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="driver_id" class="block text-gray-700">Pengemudi</label>
            <select name="driver_id" id="driver_id" class="block w-full mt-1">
                <?php foreach ($drivers as $driver) : ?>
                    <option value="<?= $driver['id']; ?>"><?= $driver['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="reservation_date" class="block text-gray-700">Tanggal Reservasi</label>
            <input type="date" name="reservation_date" id="reservation_date" class="block w-full mt-1" required>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Tanggal Mulai</label>
            <input type="datetime-local" name="start_date" id="start_date" class="block w-full mt-1" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">Tanggal Selesai</label>
            <input type="datetime-local" name="end_date" id="end_date" class="block w-full mt-1" required>
        </div>

        <div class="mb-4">
            <label for="purpose" class="block text-gray-700">Tujuan</label>
            <textarea name="purpose" id="purpose" class="block w-full mt-1" required></textarea>
        </div>

        <!-- Input hidden untuk approval_id dengan nilai default 6 -->
        <input type="hidden" name="approval_id" value="6">

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan Reservasi</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
