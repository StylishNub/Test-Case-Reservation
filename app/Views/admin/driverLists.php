<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold"><?= $title; ?></h2>
        <a href="<?= base_url('driver_list/driver_add'); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            + Tambah Driver
        </a>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">No.</th>
                    <th class="py-3 px-6 text-left">Nama Driver</th>
                    <th class="py-3 px-6 text-left">Nomor Lisensi</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($drivers as $index => $driver) : ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap"><?= $index + 1; ?></td>
                        <td class="py-3 px-6 text-left"><?= $driver['name']; ?></td>
                        <td class="py-3 px-6 text-left"><?= $driver['license_number']; ?></td>
                        <td class="py-3 px-6 text-center"><?= $driver['status']; ?></td>
                        <td class="py-3 px-6 text-center">
                            <a href="<?= base_url('drivers/edit/' . $driver['id']); ?>" class="text-blue-500 hover:underline">Edit</a> | 
                            <a href="<?= base_url('drivers/delete/' . $driver['id']); ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
