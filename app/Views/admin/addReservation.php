<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<div class="container mx-auto py-8">
    <form action="<?= base_url('tambah_reservasi/save_reservation'); ?>" method="post">

        <h2 style="font-size:30px; font-weight:600; margin-top:-30px; margin-bottom:30px;">Form Reservasi Kendaraan</h2>

        <!-- Flex container untuk Nomor Registrasi Kendaraan dan Tipe Kendaraan -->
        <div class="flex flex-wrap -mx-4 mb-6">
            <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                <label for="vehicle_id" class="block text-gray-700 mb-2">Nomor Registrasi Kendaraan</label>
                <select name="vehicle_id" id="vehicle_id" class="block w-full p-2 border border-gray-300 rounded-md" onchange="updateVehicleType()">
                    <option value="" disabled selected>Pilih Nomor Registrasi</option>
                    <?php foreach ($vehicles as $vehicle) : ?>
                        <option value="<?= $vehicle['id']; ?>" data-type="<?= $vehicle['type']; ?>"><?= $vehicle['registration_number']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="w-full md:w-1/2 px-4">
                <label for="vehicle_type" class="block text-gray-700 mb-2">Tipe Kendaraan</label>
                <input type="text" id="vehicle_type" class="block w-full p-2 border border-gray-300 rounded-md" readonly>
            </div>
        </div>

        <!-- Flex container untuk Admin dan Pengemudi -->
        <div class="flex flex-wrap -mx-4 mb-6">
            <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                <label for="admin_name" class="block text-gray-700 mb-2">Admin</label>
                <input type="text" id="admin_name" name="admin_name" value="<?= session()->get('name'); ?>" class="block w-full p-2 border border-gray-300 rounded-md" readonly>
                <input type="hidden" name="admin_id" value="<?= session()->get('id'); ?>">
            </div>

            <div class="w-full md:w-1/2 px-4">
                <label for="driver_id" class="block text-gray-700 mb-2">Pengemudi</label>
                <select name="driver_id" id="driver_id" class="block w-full p-2 border border-gray-300 rounded-md">
                    <option value="" disabled selected>Pilih Pengemudi</option>
                    <?php foreach ($drivers as $driver) : ?>
                        <option value="<?= $driver['id']; ?>"><?= $driver['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Flex container untuk Tanggal Reservasi dan Tanggal Mulai -->
        <div class="flex flex-wrap -mx-4 mb-6">
            <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                <label for="reservation_date" class="block text-gray-700 mb-2">Tanggal Reservasi</label>
                <input type="date" name="reservation_date" id="reservation_date" class="block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="w-full md:w-1/2 px-4">
                <label for="start_date" class="block text-gray-700 mb-2">Tanggal Mulai</label>
                <input type="datetime-local" name="start_date" id="start_date" class="block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
        </div>

        <!-- Flex container untuk Tanggal Selesai -->
        <div class="flex flex-wrap -mx-4 mb-6">
            <div class="w-full px-4">
                <label for="end_date" class="block text-gray-700 mb-2">Tanggal Selesai</label>
                <input type="datetime-local" name="end_date" id="end_date" class="block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
        </div>

        <!-- Textarea untuk Tujuan -->
        <div class="mb-6">
            <label for="purpose" class="block text-gray-700 mb-2">Tujuan</label>
            <textarea name="purpose" id="purpose" class="block w-full p-2 border border-gray-300 rounded-md" required></textarea>
        </div>

        <!-- Input hidden untuk approval_id dengan nilai default 6 -->
        <input type="hidden" name="approval_id" value="6">

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Simpan Reservasi</button>
        </div>
    </form>
</div>

<script>
    function updateVehicleType() {
        const vehicleSelect = document.getElementById('vehicle_id');
        const selectedOption = vehicleSelect.options[vehicleSelect.selectedIndex];
        const vehicleType = selectedOption.getAttribute('data-type');
        document.getElementById('vehicle_type').value = vehicleType;
    }
</script>

<?= $this->endSection(); ?>
