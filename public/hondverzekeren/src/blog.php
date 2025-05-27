<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include 'partials/head.php'; ?>
</head>

<body class="text-base">
    <?php include 'partials/header.php'; ?>

    <!-- hero -->
    <section class="section section--primary section--hero section--page-header bg-[url('../../../src/public/img/hero-bg.jpg')] bg-cover bg-center bg-no-repeat text-white relative overflow-hidden">
        <div class="container text-center">
            <h1 class="section-title--lg lg:text-[60px] mb-2 font-medium">Blog</h1>
        </div>
    </section>
    <!-- /hero -->

    <!-- content -->
    <section class="section section--white section--content">
        <div class="container">

            <div class="flex flex-col lg:grid lg:grid-cols-3 gap-12">
                <?php for($i=0;$i<=5;$i++): ?>
                    <div class="col-span-1">
                        <div class="relative pb-[100%] rounded-[20px] mb-4 overflow-hidden">
                            <img src="../src/public/img/d4dafed883c6d259b8270f4bb463c0f23187e10a.png" alt="Blog Image <?= $i+1 ?>" class="w-full h-full object-cover absolute top-0 left-0">
                        </div>
                        <span class="uppercase text-secondary font-semibold">28 MAY 2025</span>
                        <h2 class="text-3xl text-primary font-semibold mb-2">Blog Title <?= $i+1 ?></h2>
                        <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at erat vel quam facilisis commodo.</p>
                        <a href="#" class="text-secondary font-bold">Lees meer</a>
                    </div>
                <?php endfor ?>
            </div>

            <div class="pagination flex items-center justify-center mt-20 gap-2">
                <a href="#" class="arrow"><i class="fa-light fa-arrow-left"></i></a>
                <span>1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#" class="arrow"><i class="fa-light fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!-- /content -->

    <?php include 'partials/footer.php'; ?>
</body>
<?php include 'partials/scripts.php'; ?>

</html>