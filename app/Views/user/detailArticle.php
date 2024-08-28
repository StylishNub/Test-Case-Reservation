<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div class="m-8 px-40 py-8 border-carrot-2 border-4 rounded-8 flex flex-col items-center">
    <div class="bg-carrot-1 w-full h-5 mb-2"></div>
    <img src="/img/<?= $artikel['gambar']; ?>" class="w-full">
    <div class="bg-[#D9D9D9] w-116 font-alegreya text-5 -mt-8 px-10 text-center"><?= $artikel['judul']; ?></div>
    <div class="h-[1px] bg-black w-full my-7"></div>
    <p class="font-alegreya font-bold text-10 -mt-9 -mb-5"><?= $artikel['sub_judul']; ?></p>
    <div class="h-[1px] bg-black w-full my-7"></div>
    <textarea cols="" rows="10" class="w-full bg-transparent py-2 resize-none h-285 font-aleo font-normal text-justify text-6" disabled><?= $artikel['isi_artikel']; ?></textarea>
</div>



<?php $this->endSection(); ?>