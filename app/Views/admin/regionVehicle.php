<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-6">Kendaraan per Region</h2>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-blue-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">id</th>
                    <th class="py-3 px-6 text-left">nomor registrasi</th>
                    <th class="py-3 px-6 text-left">tipe</th>
                    <th class="py-3 px-6 text-center">nama region</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($vehicles as $vehicle) : ?>
        <tbody>
                <tr>
                    <td><?= $vehicle['id']; ?></td>
                    <td><?= $vehicle['registration_number']; ?></td>
                    <td><?= $vehicle['type']; ?></td>
                    <td><?= $vehicle['region_name']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
