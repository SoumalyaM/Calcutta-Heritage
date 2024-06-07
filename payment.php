<?php include 'includes/header.php'; ?>
<?php

if (!isset($_SESSION['user-id'])) {
    $_SESSION['error'] = 'Sign in / Sign up to book your tickets';
    header("Location: index.php");
}

$payment_amount = $_GET['pay'];
$site = $_GET['site'];

$_SESSION['payment'] = true;

require ("includes/payment-config.php");

?>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</head>

<body>

    <form action="payment-submit.php" method="POST" style="display:flex;gap:1rem">

        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input name="ticket-date" datepicker type="text" datepicker-format="dd/mm/yyyy" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Select date">
        </div>

        <input type="hidden" name="amount" value="<?= htmlspecialchars($payment_amount * 100) ?>">
        <input type="hidden" name="site" value="<?= $site ?>">
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?= $publishable_key ?>"
            data-amount="<?= $payment_amount * 100 ?>" data-name="Calcutta Heritage"
            data-email="<?= $_SESSION['email'] ?>" data-description="Pay to get your tickets"
            data-image="assets/howrahBridge.jpg" data-currency="inr">
            </script>

    </form>
</body>

</html>