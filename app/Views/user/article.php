<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div class="m-8 bg-[#AFAE9F] rounded-8">
    <div class="px-36 pb-6 pt-3 flex flex-col mb-9">
        <div class="bg-carrot-1 w-[310px] h-[39px] z-990 ml-11"></div>
        <div class="flex -mt-3">
            <img src="/img/articlepage.png" class="ml-7">
            <div class="bg-[#933000] opacity-80 py-16 pr-11 pl-19 h-96 mt-7 -ml-10 text-white">
                <h1 class="font-marcellus text-10 mb-10 text-center">CARE ABOUT MENTAL HEALTH</h1>
                <p class="font-actor text-6 text-center">"Mental health is a priority. You have the right to rest and care for yourself."</p>
            </div>
        </div>
        <div class="bg-carrot-1 w-[73px] h-[68px] z-990 -mr-11 -mt-10"></div>
    </div>
    <div class="w-[956px] flex flex-wrap gap-19 mx-auto ">
        <!-- FOREACH -->
        <?php foreach ($artikel as $a) : ?>
            <div class="flex flex-col gap-4 p-4 items-center w-[268px]  ">
                <div class="rounded-9 w-full h-[218px] bg-cover bg-center" style="background-image: url(/img/<?= $a['gambar']; ?>)"></div>
                <div>
                    <div class="h-[1px] bg-black w-full"></div>
                    <p class="font-alegreya text-4"><?= $a['judul']; ?></p>
                    <div class="h-[1px] bg-black w-full"></div>
                </div>
                <a href="/detail_artikel/<?= $a['id']; ?>" class="font-alegreya text-4 font-extrabold w-25 bg-[#D9D9D9] text-center ">READ MORE</a>
            </div>
        <?php endforeach ?>


    </div>
</div>

<?php $this->endSection(); ?>