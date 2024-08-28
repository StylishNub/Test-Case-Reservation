<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>
<?php
$id = session()->get('id');
$email = session()->get('email');
?>
<div class="py-30">
    <div class="py-13 px-6 bg-[#F5F5F5] border-2 border-carrot-2">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-carrot-1 rounded-full -mr-[45px]"></div>
            <h1 class="font-sree-krushnadevaraya text-12 pb-5 mr-10">2</h1>
            <p class="font-rokkitt font-bold text-8 leading-6">Your <br> Information</p>
        </div>

        <div class="px-20 py-10">
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
            <div class="border-2 p-4 px-7 rounded-4 border-black">
                <h1 class="font-roboto font-medium text-8">Consultation</h1>
                <p class="font-roboto font-normal text-6"><?= $new_date = date('F d,Y', strtotime($date_)); ?> at <?= $time_; ?> (Dr.Ika, SpKJ)</p>
            </div>
        </div>
        <div class="px-20">

            <form action="/save_therapy" method="post">
                <input type="text" name="id" value="<?= $id; ?>" class="hidden">
                <input type="date" name="date" value="<?= $date_; ?>" class="hidden">
                <input type="text" name="time" value="<?= $time_; ?>" class="hidden">
                <h1 class="font-roboto font-normal text-8">Name</h1>
                <div class="flex w-full justify-between gap-7">
                    <input type="text" name="first_name" placeholder="First Name" class=" border-2 w-full p-4 px-7 rounded-2 border-black bg-transparent placeholder:text-slate-900">
                    <input type="text" name="last_name" placeholder="Last Name" class=" border-2 p-4 px-7 w-full rounded-2 border-black bg-transparent placeholder:text-slate-900">
                </div>
                <br>
                <h1 class="font-roboto font-normal text-8">Phone</h1>
                <div class="flex w-full">
                    <input type="text" name="phone" class=" border-2 w-full p-4 px-7 rounded-2 border-black bg-transparent placeholder-text-black">
                </div>
                <br>
                <h1 class="font-roboto font-normal text-8">Email</h1>
                <div class="flex w-full">
                    <input type="email" name="email" value="<?= $email; ?>" class=" border-2 w-full p-4 px-7 rounded-2 border-black bg-transparent placeholder-text-black">
                </div>
                <br>
                <button class="font-roboto text-5 text-black font-medium px-10 py-6 bg-[#D9D9D9] rounded-full">Complete Appointment</button>
            </form>
        </div>
    </div>
</div>
<!-- error simpan -->
<div id="myModal1" class="modal hidden fixed inset-0 z-990 overflow-auto bg-gray-800 bg-opacity-75 flex items-center justify-center md:p-5 lg:p-8 xl:p-10">
    <!-- Modal Content -->
    <div class="bg-white w-full md:w-[488px] sm:rounded overflow-auto">
        <div class="flex justify-end p-2">
            <!-- Close Button -->
            <button class="text-gray-600 hover:text-gray-800" data-modal-close="#myModal1">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="px-9">
            <div class="flex flex-col justify-center items-center my-7 gap-1">
                <h1 class="text-xl font-semibold mb-4 text-center"><?= session()->getFlashdata('error'); ?></h1>
                <button data-modal-close="#myModal1" class="py-2 px-7 rounded-2 bg-carrot-1 font-semibold text-white hover:bg-carrot-3 transition duration-200 ease-in-out">close</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>