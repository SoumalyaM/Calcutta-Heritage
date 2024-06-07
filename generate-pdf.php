<?php include 'includes/db.php'; ?>
<?php session_start(); ?>

<?php
if (!isset($_GET['code']))
    header("Location: index.php");
?>
<?php

global $connection;

$ticket_id = $_GET['code'];

$query = "SELECT payment_attraction_name, ticket_url, ticket_date FROM payments WHERE ticket_id = '$ticket_id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$imageData = file_get_contents($row['ticket_url']);
$imageDataUri = 'data:image/jpeg;base64,' . base64_encode($imageData);

// echo
$html =
    "
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'>
        <style>
        body {
            height: 100vh;
        }
        </style>
    </head>

    <body class='bg-gray-100'>

            <div
                class='p-5 bg-white border border-gray-200 rounded-lg shadow max-w-lg dark:border-gray-700 dark:bg-gray-800' style='margin: auto auto;position:relative;top:30%'>

                <img class='object-cover w-full rounded-t-lg h-100 md:h-auto md:rounded-none md:rounded-s-lg'
                    src='$imageDataUri' alt='Ticket Image' style='display:inline-block;width:200px;height:200px'>

                <div class='p-4' style='display:inline-block'>
                    <span class='mb-2 text-2xl font-bold text-gray-900 dark:text-white'>
                        {$row['payment_attraction_name']}
                    </span>
                    <br>
                    <br>
                    <span class='mb-3 font-normal text-gray-700 dark:text-gray-400'>{$row['ticket_date']}</span>
                </div>
            </div>

    </body>

    </html>
";

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('isPhpEnabled', true); 
$dompdf = new Dompdf($options);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Load HTML into Dompdf
$dompdf->loadHtml($html);

// Render the PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($row['payment_attraction_name'] . "_" . $ticket_id, [
    'Attachment' => false //true for download, false for preview in the browser
]);
?>