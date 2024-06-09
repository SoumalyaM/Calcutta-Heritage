<?php include 'includes/header.php'; ?>
<?php

if (!isset($_SESSION['user-id'])) {
    $_SESSION['error'] = 'Sign in / Sign up to book your tickets';
    header("Location: index.php");
}

if ($_SESSION['token'] !== $_SESSION['token-check']) {
    header("Location: index.php");
} else
    unset($_SESSION['token']);


$payment_amount = $_GET['pay'];
$site = $_GET['site'];

$_SESSION['payment'] = true;

require ("includes/payment-config.php");

?>

<script src="https://cdn.tailwindcss.com"></script>

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

    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px] bg-white">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Checkout</h1>
            <form action="payment-submit.php" method="POST">
                <div class="mb-5">
                    <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                        No. of tickets
                    </label>
                    <input type="number" name="guest" id="guest" placeholder="1" min="1" required
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div class="mb-5">
                    <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                        Date
                    </label>
                    <input type="date" name="ticket-date" id="date" min="2024-06-09" max="" required
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <input type="hidden" name="amount" value="<?= htmlspecialchars($payment_amount * 100) ?>">
                <input type="hidden" name="site" value="<?= $site ?>">


                <div class="py-3 px-8">
                    <button
                        class="hover:shadow-form rounded-md text-center text-base font-semibold text-white outline-none">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?= $publishable_key ?>" data-amount="<?= $payment_amount * 100 ?>"
                            data-name="Calcutta Heritage" data-email="<?= $_SESSION['email'] ?>"
                            data-description="Pay to get your tickets" data-image="assets/howrahBridge.jpg"
                            data-currency="inr">
                            </script>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>