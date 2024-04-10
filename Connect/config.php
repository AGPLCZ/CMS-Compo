<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli("127.0.0.1", "dobrodruzi.cz", "e4gXbzJ7qmtM", "green");
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('Error connecting to database'); //Should be a message a typical user could understand
}




// Nastavení připojení k databázi
DB::$user = 'dobrodruzi.cz';
DB::$password = 'e4gXbzJ7qmtM';
DB::$dbName = 'green';
DB::$host = '127.0.0.1'; // Obvykle 'localhost'
DB::$encoding = 'utf8mb4'; // Nastavení kódování

