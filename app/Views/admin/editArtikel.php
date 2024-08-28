<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<h1 class="text-9 font-bold mb-20">Edit Artikel</h1>

<form action="/edit_artikel/save_edit" method="post" class="w-180" enctype="multipart/form-data">
    <input type="hidden" name="id_artikel" id="id_artikel" class="" value="<?= $artikel['id']; ?>">
    <input type="hidden" name="gambarLama" value="<?= $artikel['gambar']; ?>">
    <label class="custom-file-label hidden mb-2 text-sm font-medium text-gray-900 dark:text-white" id="customFileLabel" for="gambar"><?= $artikel['gambar']; ?></label>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="gambar">Gambar:</label>
    <div>
        <img src="/img/<?= $artikel['gambar']; ?>" class="img-preview w-36">
    </div>
    <input onchange="previewImg()" value="<?= $artikel['gambar']; ?>" class="custom-file-input block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50" id="gambar" name="gambar" type="file">

    <div class="h-3"></div>
    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul:</label>
    <input type="text" name="judul" id="judul" value="<?= $artikel['judul']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
    <div class="h-3"></div>
    <label for="sub_judul" class="block mb-2 text-sm font-medium text-gray-900">Sub Judul:</label>
    <input type="text" name="sub_judul" id="sub_judul" value="<?= $artikel['sub_judul']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
    <div class="h-3"></div>
    <label for="isi_artikel" class="block mb-2 text-sm font-medium text-gray-900">Isi Artikel:</label>
    <textarea name="isi_artikel" id="isi_artikel" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "><?= $artikel['isi_artikel']; ?></textarea>
    <div class="h-3"></div>
    <button onclick="changeFileValue()" type="submit" class="py-2.5 px-5 bg-carrot-1 hover:bg-carrot-3 font-medium text-xs rounded-1 text-white transition duration-200 ease-in-out">Simpan</button>
</form>

<?php $this->endSection(); ?>