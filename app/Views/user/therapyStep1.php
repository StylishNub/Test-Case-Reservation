<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>
<div class="py-20">
    <h1 class="font-sree-krushnadevaraya text-12 mb-9">Consul With dr. Ika. SpKJ, lets Book Appointment in here !</h1>
    <img src="/img/therapyImg.png" class="w-full mb-28">
    <div class="flex justify-center items-center w-full">
        <h1 class="bg-carrot-1 px-11 font-katibeh text-24 text-center ">CALMHEALTH</h1>
    </div>
    <div class="py-13 px-6 bg-[#F5F5F5] border-2 border-carrot-2 -mt-13">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-carrot-1 rounded-full -mr-10"></div>
            <h1 class="font-sree-krushnadevaraya text-12 pb-5 mr-10">1</h1>
            <p class="font-rokkitt font-bold text-8 leading-6">Choose <br> Appointment</p>
        </div>
        <div class="px-20 py-13">
            <div class="border-2 p-4 px-7 rounded-4 border-black">
                <h1 class="font-roboto font-medium text-8">Consultation</h1>
                <p class="font-roboto font-normal text-6">Practic Dr. Ika, SpKJ</p>
            </div>
        </div>
        <div class="px-20">
            <div class=" border-2 p-4 px-7 rounded-4 border-black">
                <form action="/save_step1" method="post" class="">
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

                    <h1 class="font-roboto text-8 font-medium">Choose therapy date :</h1>
                    <input type="date" name="date" class="flex flex-col my-5 font-roboto font-normal text-6">

                    <h1 class="font-roboto text-8 font-medium">Choose therapy hours :</h1>
                    <h6 class="font-roboto font-medium text-4 text-center">TIME ZONE</h6>
                    <h6 class="font-roboto font-medium text-4 text-center mb-5">(GMT+7:00 Malang)</h6>
                    <div class="flex items-center justify-evenly w-full">
                        <label class="flex flex-col font-roboto font-normal text-6">
                            <input type="radio" name="time" value="14:30">
                            14:30
                        </label><br>

                        <label class="flex flex-col font-roboto font-normal text-6">
                            <input type="radio" name="time" value="15:00">
                            15:00
                        </label><br>

                        <label class="flex flex-col font-roboto font-normal text-6">
                            <input type="radio" name="time" value="15:25">
                            15:25
                        </label><br>

                        <label class="flex flex-col font-roboto font-normal text-6">
                            <input type="radio" name="time" value="15:50">
                            15:50
                        </label><br>
                    </div>
                    <div class="flex w-full justify-end mt-5">
                        <button type="submit" class="px-6 py-2 font-roboto font-medium text-4 rounded-1 gap-3 bg-carrot-1 flex justify-center items-center">
                            Next
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>

                        </button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
<?php $this->endSection(); ?>