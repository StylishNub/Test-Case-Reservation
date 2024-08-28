<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Abril+Fatface&family=Actor&family=Alegreya:ital,wght@0,400..900;1,400..900&family=Aleo:ital,wght@0,100..900;1,100..900&family=Gowun+Batang&family=Gravitas+One&family=Katibeh&family=Marcellus&family=Purple+Purse&family=Quattrocento:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sree+Krushnadevaraya&display=swap" rel="stylesheet">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
    <script>
        <?php if (session()->getFlashdata('error')) : ?>
            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('myModal1').classList.remove('hidden');
            });
        <?php endif; ?>
    </script>
</head>

<body class=" font-normal leading-default bg-[#F6F6F6]">
    <!-- navbar -->
    <nav class="bg-[#2D3250] flex w-full h-16 px-10 justify-between items-center">
        <h1 class=" text-7 font-bold mb-2 text-yellow-500">LOGIK</h1>
        <div class="flex gap-16 font-abrill text-6">
            <a href="/home" class="border-b-2 hover:border-white text-yellow-500 <?= $menu == 'home' ? 'border-white' : 'border-transparent' ?> ">Home</a>
            <a href="/detail_reservasi" class="hover:border-b-2 hover:border-white text-yellow-500 <?= $menu == 'reservasi' ? 'border-white' : 'border-transparent' ?>">Reservasi</a>
        </div>
        <a href="<?= base_url('logout') ?>" class="hover:border-b-2 px-4 text-6 text-yellow-500 font-bold" >Log Out</a>
    </nav>

    <!-- main -->
    <main class="px-10">
        <?php $this->renderSection('content'); ?>
    </main>
    <script>
        // JavaScript to handle modal functionality
        document.querySelectorAll('[data-modal-target]').forEach(function(button) {
            button.addEventListener('click', function() {
                const targetModal = document.querySelector(this.getAttribute('data-modal-target'));
                targetModal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-close]').forEach(function(button) {
            button.addEventListener('click', function() {
                const targetModal = document.querySelector(this.getAttribute('data-modal-close'));
                targetModal.classList.add('hidden');
            });
        });

        window.addEventListener('click', function(event) {
            document.querySelectorAll('.modal').forEach(function(modal) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>