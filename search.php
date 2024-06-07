<?php include 'includes/db.php'; ?>
<?php include 'includes/functions.php'; ?>

<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="/otb/css/main.css">
<link rel="stylesheet" href="/otb/css/mini.min.css">

<link rel="stylesheet" href="/otb/js/mini.min.js">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Banner -->
    <?php include 'includes/banner.php'; ?>

    <section class="attractions p-x">
        <div class="attractions__heading">
            <h2>Searched Results</h2>
        </div>

        <div class="attractions_tickets">

            <?php view_attractions_on_search() ?>

        </div>
    </section>

    <footer class="p-x">
        Calcutta Heritage &copy; 2024. All Rights Reserved.
    </footer>

    <?php include 'includes/footer.php'; ?>