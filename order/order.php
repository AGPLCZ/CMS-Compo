<?php
require_once "../config.php";

ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);
echo "tady";
// Přijetí raw JSON payload z POST požadavku
$payload = file_get_contents('php://input');
$decoded = json_decode($payload, true);


$firstName =  $decoded['firstName'] ?? "Jméno";
$lastName =  $decoded['lastName'] ?? "Jméno";
$numberPhone =  $decoded['numberPhone'] ?? "numberPhone";
$orderDetails =  $decoded['orderDetails'] ?? "orderDetails";


// Vkládání dat do databáze
DB::insert('order_buy', array(
  'firstName' => $firstName,
  'lastName' => $lastName,
  'numberPhone' => $numberPhone,
  'orderDetails' => $orderDetails
));

// Kontrola, zda byl dotaz úspěšný
if (DB::affectedRows() == 1) {
    echo "Záznam byl úspěšně vložen.";
} else {
    echo "Při vkládání došlo k chybě.";
}




// $content = "From:" . $firstName;
// $context = stream_context_create([
//     'http' => [
//         'method' => 'POST',
//         'header' => "Content-Type: text/plain\r\n" . 
//         "Title: Objednávka přijata\r\n" .
//         "Priority: urgent\r\n" .      
//         "Tags: pizza",
//         'content' => $content
//     ]
// ]);

// file_get_contents('https://ntfy.sh/smsky254', false, $context);








// $content = "Tdddext: " . $decoded['text'];
// $context = stream_context_create([
//     'http' => [
//         'method' => 'POST',
//         'header' => "Content-Type: text/plain\r\n",
//         'content' => $content
//     ]
// ]);

// file_get_contents('https://ntfy.sh/smsky254', false, $context);




// $content = json_encode($decoded['text']);
// $context = stream_context_create([
//     'http' => [
//         'method' => 'POST',
//         'header' => "Content-Type: text/plain\r\n",
//         'content' => $content
//     ]
    
// ]);

// file_get_contents('https://ntfy.sh/smsky254', false, $context);


