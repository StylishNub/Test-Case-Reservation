<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Actor&family=Alegreya:ital,wght@0,400..900;1,400..900&family=Aleo:ital,wght@0,100..900;1,100..900&family=Gowun+Batang&family=Gravitas+One&family=Katibeh&family=Marcellus&family=Purple+Purse&family=Quattrocento:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sree+Krushnadevaraya&display=swap" rel="stylesheet">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
</head>

<body class="antialiased leading-default bg-[#F6F6F6]">
    <div class="absolute w-full min-h-75"></div>
    <!-- sidenav -->
<aside class="fixed bg-[#2D3250] inset-y-0 flex flex-col w-64 p-0 overflow-y-auto antialiased transition-transform duration-200 border-0 shadow-2xl max-w-64 ease-nav-brand z-990 xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap text-black" href="#">
            <span class="font-bold transition-all text-9 duration-200 ease-nav-brand text-white">LOGIK</span>
        </a>
    </div>
    <hr class="h-1 mt-0 bg-white" />
    <div class="flex-grow">
        <ul class="flex flex-col pl-0  gap-2 mb-0">
            <li class="mt-0.5 w-full">
                <a class="sidebar-item py-2.7 text-sm my-0 mx-2 flex items-center whitespace-nowrap transition-colors duration-200 <?= $menu == 'dashboard' ? 'bg-white text-black font-bold' : 'hover:bg-white hover:text-black' ?>" href="<?= base_url('dashboard') ?>">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 text-5 font-bold text-yellow-500">Dashboard</span>
                </a>
            </li>
            <!-- Dropdown Menu for Region -->
            <li class="relative mt-0.5 w-full">
                <button id="dropdownRegionButton" class="sidebar-item py-2.7 text-sm my-0 mx-2 flex items-center justify-between whitespace-nowrap transition-colors duration-200 <?= $menu == 'region' ? 'bg-white text-black font-bold' : 'hover:bg-white hover:text-black' ?>">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-green-500 ni ni-map"></i>
                    </div>
                    <span class="ml-1 text-5 font-bold text-yellow-500">Region</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownRegionMenu" class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg">
                    <a href="<?= base_url('list') ?>" class="block px-4 py-2 font-bold text-yellow-500 hover:bg-gray-100">Daftar Region</a>
                    <a href="<?= base_url('region_vehicles') ?>" class="block px-4 py-2 font-bold text-yellow-500 hover:bg-gray-100">Kendaraan per Region</a>
                </div>
            </li>
            <li class="mt-0.5 w-full">
                <a class="sidebar-item py-2.7 text-sm my-0 mx-2 flex items-center whitespace-nowrap transition-colors duration-200 <?= $menu == 'driver' ? 'bg-white text-black font-bold' : 'hover:bg-white hover:text-black' ?>" href="<?= base_url('driver_list') ?>">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 text-5 font-bold text-yellow-500">Driver</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="sidebar-item py-2.7 text-sm my-0 mx-2 flex items-center whitespace-nowrap transition-colors duration-200 <?= $menu == 'manajemen' ? 'bg-white text-black font-bold' : 'hover:bg-white hover:text-black' ?>" href="<?= base_url('manajemen_vehicle') ?>">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 text-5 font-bold text-yellow-500">Data kendaraan</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="sidebar-item py-2.7 text-sm my-0 mx-2 flex items-center whitespace-nowrap transition-colors duration-200 <?= $menu == 'reservasi' ? 'bg-white text-black font-bold' : 'hover:bg-white hover:text-black' ?>" href="<?= base_url('reservation_list') ?>">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 text-5 font-bold text-yellow-500">Reservasi Kendaraan</span>
                </a>
            </li>

            <li class="absolute bottom-2 mt-0.5 w-full ">
                <a class="sidebar-item py-2.7 text-sm my-0 mx-2 flex items-center whitespace-nowrap transition-colors duration-200 hover:bg-white hover:text-black" href="<?= base_url('logout') ?>">
                    <div class="flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                    </div>
                    <span class="flex items-center text-5  font-bold text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        Keluar
                    </span>
                </a>
            </li>
        </ul>
    </div>
</aside>
    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-64 rounded-xl">
        <div class="w-full px-10 py-6 mx-auto">
            <?php $this->renderSection('content'); ?>
        </div>
    </main>
</body>
<!-- main script file  -->
<script src="<?= base_url() ?>js/main.js"></script>
<script>
    // Toggle dropdown visibility
    document.getElementById('dropdownRegionButton').addEventListener('click', function () {
        const menu = document.getElementById('dropdownRegionMenu');
        menu.classList.toggle('hidden');
    });

    // Optional: Hide dropdown if clicked outside
    document.addEventListener('click', function (event) {
        const button = document.getElementById('dropdownRegionButton');
        const menu = document.getElementById('dropdownRegionMenu');

        if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });

    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('label[for="gambar"]');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

</html>
