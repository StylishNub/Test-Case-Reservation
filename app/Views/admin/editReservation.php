<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-6">Edit Reservasi</h2>

    <form action="<?= base_url('edit_reservation/save_edit_reservation/' . $reservation['id']); ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-4">
            <label for="vehicle_id" class="block text-gray-700">Kendaraan</label>
            <select name="vehicle_id" id="vehicle_id" class="block w-full mt-1" required>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <option value="<?= $vehicle['id']; ?>" <?= $reservation['vehicle_id'] == $vehicle['id'] ? 'selected' : ''; ?>>
                        <?= $vehicle['type']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="admin_id" class="block text-gray-700">Admin</label>
            <select name="admin_id" id="admin_id" class="block w-full mt-1" required>
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user['id']; ?>" <?= $reservation['admin_id'] == $user['id'] ? 'selected' : ''; ?>>
                        <?= $user['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="driver_id" class="block text-gray-700">Pengemudi</label>
            <select name="driver_id" id="driver_id" class="block w-full mt-1" required>
                <?php foreach ($drivers as $driver) : ?>
                    <option value="<?= $driver['id']; ?>" <?= $reservation['driver_name'] == $driver['name'] ? 'selected' : ''; ?>>
                        <?= $driver['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="reservation_date" class="block text-gray-700">Tanggal Reservasi</label>
            <input type="date" name="reservation_date" id="reservation_date" value="<?= $reservation['reservation_date']; ?>" class="block w-full mt-1" required>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Tanggal Mulai</label>
            <input type="datetime-local" name="start_date" id="start_date" value="<?= $reservation['start_date']; ?>" class="block w-full mt-1" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">Tanggal Selesai</label>
            <input type="datetime-local" name="end_date" id="end_date" value="<?= $reservation['end_date']; ?>" class="block w-full mt-1" required>
        </div>

        <div class="mb-4">
            <label for="purpose" class="block text-gray-700">Tujuan</label>
            <textarea name="purpose" id="purpose" class="block w-full mt-1" required><?= $reservation['purpose']; ?></textarea>
        </div>

        <!-- Input hidden untuk approval_id dengan nilai default 6 -->
        <input type="hidden" name="approval_id" value="<?= $reservation['approval_id']; ?>">

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Reservasi</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
