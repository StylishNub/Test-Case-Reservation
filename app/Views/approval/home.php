<?= $this->extend('layout/templateUser'); ?>

<?= $this->section('content'); ?>

<div class="flex px-10">

<!-- Menampilkan status reservasi -->
<div class="container mx-auto py-8">
    <h2 class="text-xl font-bold mb-4">Reservation Status</h2>
    <?php if (!empty($reservations)) : ?>
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Vehicle Type</th>
                    <th class="border border-gray-300 px-4 py-2">Admin</th>
                    <th class="border border-gray-300 px-4 py-2">Driver</th>
                    <th class="border border-gray-300 px-4 py-2">Start Date</th>
                    <th class="border border-gray-300 px-4 py-2">End Date</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) : ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?= $reservation['id']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $reservation['vehicle_type']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $reservation['admin_name']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $reservation['driver_name']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $reservation['start_date']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $reservation['end_date']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $reservation['status']; ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <?php if ($reservation['status'] === 'Pending') : ?>
                               <a href="<?= base_url('index/update_status/' . $reservation['id'] . '/Accepted'); ?>" class="bg-green-500 text-white px-2 py-1 rounded-md hover:bg-green-600">Accept</a>
                                <a href="<?= base_url('index/update_status/' . $reservation['id'] . '/Rejected'); ?>" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Reject</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No reservations found.</p>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
