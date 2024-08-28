<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Daftar Region</h2>
        <a href="<?= base_url('list/tambah_region'); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            + Add Region
        </a>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nama Region</th>
                    <th class="py-3 px-6 text-center">Alamat</th>
                    <th class="py-3 px-6 text-center">Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($regions as $region) : ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap"><?= $region['id']; ?></td>
                        <td class="py-3 px-6 text-left"><?= $region['name']; ?></td>
                        <td class="py-3 px-6 text-center"><?= $region['address']; ?></td>
                        <td class="py-3 px-6 text-center"><?= $region['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
