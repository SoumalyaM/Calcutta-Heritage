<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>
<?php include 'includes/functions.php'; ?>

<?php if (isset($_SESSION['token']))
    unset($_SESSION['token']); ?>

<?php
$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
$_SESSION['token-check'] = $token;
?>

<?php if (isset($_SESSION["payment"]))
    unset($_SESSION['payment']) ?>

    <link rel="stylesheet" href="/otb/css/main.css">
    <link rel="stylesheet" href="/otb/css/mini.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="/otb/js/mini.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    </head>

    <body>

        <!-- Navbar -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Banner -->
    <?php include 'includes/banner.php'; ?>

    <section class="attractions p-x">
        <div class="attractions__heading">
            <h2>Recommended Places</h2>
        </div>

        <div class="attractions_tickets">

            <?php view_attractions(); ?>

        </div>
    </section>

    <footer class="p-x">
        Calcutta Heritage &copy; 2024. All Rights Reserved.
    </footer>


    <?php if (isset($_SESSION['error'])): ?>
        <script>
            alertify.set('notifier', 'position', 'top-center');
            alertify.error(' <?= $_SESSION['error'] ?> ');
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif ?>


    <?php include 'includes/footer.php'; ?>