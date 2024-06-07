<?php include 'includes/header.php'; ?>


<?php
if (!isset($_SESSION["payment"]))
    header("Location: index.php");
require ("includes/payment-config.php");

$token = $_POST["stripeToken"];
$amount = $_POST["amount"];
$site = $_POST["site"];
$ticket_date = $_POST["ticket-date"];

if (!empty($token)) {
    global $connecton;

    $data = \Stripe\Charge::create([
        "amount" => $amount,
        "currency" => "inr",
        "description" => $site,
        "source" => $token,
    ]);

    $amount /= 100; // converting back to Rs

    $filePath = $site . time();
    $filePath = "tickets/{$filePath}.png";

    function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Function to check if the generated ID is unique
    function isUniqueId($connection, $ticketId)
    {

        $query = "SELECT COUNT(*) as count FROM payments WHERE ticket_id = '$ticketId'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['count'] == 0;
    }

    // Function to generate a unique ticket ID
    function generateUniqueTicketId($connection)
    {
        do {
            $ticketId = generateRandomString();
        } while (!isUniqueId($connection, $ticketId));
        return $ticketId;
    }

    // Example usage
    $uniqueTicketId = generateUniqueTicketId($connection);
    // echo "Generated unique ticket ID: " . $uniqueTicketId;



    $payment_query = "INSERT INTO payments (payment_customer_id, payment_customer_name, payment_token, payment_amount, payment_attraction_name, ticket_date, ticket_url, ticket_id) ";
    $payment_query .= "VALUES ('{$_SESSION['user-id']}', '{$_SESSION['name']}', '$token', '$amount', '$site', '$ticket_date', '$filePath', '$uniqueTicketId')";
    $payment_result = mysqli_query($connection, $payment_query);

    // echo "<pre>";
    // print_r($data);

}

require 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
// use Endroid\QrCode\Label\LabelAlignment;
// use Endroid\QrCode\Label\Font\NotoSans;
// use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;

// Generate the QR code

$result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data($uniqueTicketId)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(ErrorCorrectionLevel::High)
    ->size(150)
    ->margin(5)
    ->foregroundColor(new Color(43, 138, 62))
    // ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
    // ->logoPath('tickets/hello.png')
    // ->logoResizeToWidth(50)
    // ->logoPunchoutBackground(true)
    // ->labelText('This is the label')
    // ->labelFont(new NotoSans(20))
    // ->labelAlignment(LabelAlignment::Center)
    // ->validateResult(false)
    ->build();

// Output the QR code as an image
// header('Content-Type: ' . $result->getMimeType());
// echo $result->getString();

$result->saveToFile($filePath);

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

<div>
    <a href="#"
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
            src="<?= $filePath ?>" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $site ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $ticket_date ?></p>
        </div>

    </a>
    <p class="py-3 text-center text-blue-700"><a href="admin/payments.php">View your tickets</a></p>

</div>


</body>

</html>