<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>
<div class="py-30">
    <div class="py-13 px-6 bg-[#F5F5F5] border-2 border-carrot-2">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-carrot-1 rounded-full -mr-[45px]"></div>
            <h1 class="font-sree-krushnadevaraya text-12 pb-5 mr-10">3</h1>
            <p class="font-rokkitt font-bold text-8 leading-6">Confirmation</p>
        </div>
        <div class="mx-auto border-2 border-black bg-white py-5 w-[754px]">
            <div class="px-13">
                <h1 class="font-roboto font-light text-8">Succeed! Book Consultation with dr. Ika, SpKJ</h1>
                <h1 class="font-roboto font-medium text-6"><?= $new_date = date('F, d, Y', strtotime($date)); ?></h1>
                <h1 class="font-roboto font-normal text-8"><?= $time; ?></h1>
            </div>
            <div class="flex px-5 gap-2">
                <img src="/img/gps.png" class="w-[23px] h-[26px] mt-1">
                <p class="font-roboto font-light text-5 mb-20">Practic Psychiatric dr. Ika, SpKJ. In De Banana Residence, Jl. Griya Permata Alam, Kabupaten Malang, Jawa Timur 65152.</p>
            </div>
        </div>

    </div>
</div>
<?php $this->endSection(); ?>