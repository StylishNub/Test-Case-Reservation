<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold"><?= $title; ?></h2>
        <a href="<?= base_url('drivers'); ?>" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
            Kembali
        </a>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <form action="<?= base_url('driver_add/save_driver'); ?>" method="post" class="p-6">
            <?= csrf_field(); ?>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Driver:</label>
                <input type="text" id="name" name="name" class="form-input mt-1 block w-full border" value="<?= old('name'); ?>">
                <?php if (isset($errors['name'])): ?>
                    <p class="text-red-500 text-xs italic"><?= $errors['name']; ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="license_number" class="block text-gray-700 text-sm font-bold mb-2">Nomor Lisensi:</label>
                <input type="text" id="license_number" name="license_number" class="form-input mt-1 block w-full border" value="<?= old('license_number'); ?>">
                <?php if (isset($errors['license_number'])): ?>
                    <p class="text-red-500 text-xs italic"><?= $errors['license_number']; ?></p>
                <?php endif; ?>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
