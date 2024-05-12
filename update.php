<?php 


require_once "config.php";
require_once 'vendor/autoload.php';

// update.php
// header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contents_id = $_POST['id'] ?? '';
    $column = $_POST['column'] ?? 'neee';
    $value = $_POST['value'] ?? '';

    
    // Zde byste měli přidat logiku pro aktualizaci databáze či jiné zpracování
    
    echo json_encode(['success' => true, 'id' => $contents_id, 'column' => $column, 'value' => $value]);

        DB::update('contents', [
        $column => $value
    ], "contents_id=%i", $contents_id);
}
