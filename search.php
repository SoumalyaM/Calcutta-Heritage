<?php include 'includes/db.php'; ?>
<?php include 'includes/functions.php'; ?>

<?php include 'includes/header.php'; ?>

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

<footer class="p-x"></footer>

<?php include 'includes/footer.php'; ?>