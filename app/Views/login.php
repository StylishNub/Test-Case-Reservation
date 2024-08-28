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

<body class=" antialiased font-normal leading-default bg-[#F6F6F6] ">
    <!-- navbar -->
    <nav class="w-full absolute h-16 px-10">
        <h1 class="font-bold text-9 mb-2 mt-2 text-yellow-600">LOGIK</h1>
    </nav>
    <div class="flex">
        <div class="bg-[#2D3250] w-full py-42 flex justify-end items-center">
            <div class="w-11/12 h-full bg-white rounded-l-[50px] px-16 py-25">
                <?php
                echo form_open('auth/cek_login');
                ?>
                <div class="px-9">
                    <h1 class="font-bold text-[32px]">Sign In !</h1>
                    <?php
                    $errors = session()->getFlashdata('errorslogin');
                    if ($errors !== null && is_array($errors)) :
                    ?>
                        <div class="alert flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Danger</span>
                            <div>
                                <span class="font-medium">Terdapat beberapa hal yang perlu anda perhatikan:</span>
                                <ul class="mt-1.5 list-disc list-inside">
                                    <?php foreach ($errors as $error) : ?>
                                        <li class=""><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                    if (session()->getFlashdata('pesanlogin')) {
                        echo '<div class="alert flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">';
                        echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
                        echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>';
                        echo '<span class="sr-only">Danger</span>';
                        echo '<div>';
                        echo '<span class="font-medium">';
                        echo session()->getFlashdata('pesanlogin');
                        echo '</span>';
                        echo '</div>';
                        echo '</div>';
                    } ?>
                    <?php if (session()->has('pesan')) : ?>
                        <div class="alert alert-success flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium"><?= session()->get('pesan') ?></span>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="modal-body">
                        <div class="mt-7">
                            <label for="name" class=" text-[24px]">Name</label>
                            <input type="text" name="name" class="w-full  placeholder:text-xs  shadow-lg rounded-full p-4 ">
                        </div>
                        <div class="mt-7">
                            <label for="password" class="text-[24px] -mt-40">password</label>
                            <input type="password" name="password" class="w-full  placeholder:text-slate-300 shadow-lg rounded-full p-4 ">
                        </div>
                        <div class="flex flex-col justify-center items-center gap-2 mt-7">
                            <button class="rounded-full px-7 font-bold text-6 shadow-lg pb-2 bg-white text-black">Sign In</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
        <div class="bg-white w-full py-42 flex items-center">
            <img src="/img/home.jfif" class="w-11/12 h-full" alt="">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
</body>

</html>