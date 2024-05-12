<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);
session_start();

require_once "config.php";
require_once 'vendor/autoload.php';

use Compo\Navigation\UrlManager;
use Compo\Rendering\Template;
use Compo\Rendering\PageRenderer;
use Compo\Registry;
use Compo\Admin\Auth\Auth;
use Compo\Rendering\AdminRenderer;


$folder_located_project = "cms/CMS-Compo";
$tamplate = "mizzle";
$language = "cz";


// Oříznutí lomítek na začátku a na konci řetězce
$trimmed_folder_located_project = trim($folder_located_project, '/');
$registry = new Registry();
$registry->set("template", $tamplate);
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    $registry->set("path", $trimmed_folder_located_project);
} else {
    $registry->set("path", "");
}


$urlManager = new UrlManager();
$urls = $urlManager->getSegment(0);
$urlss = $urlManager->getSegment(1);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Získání hodnoty z AJAX požadavku
    $contents_id = $_POST['id'];
    $column = $_POST['column'];
    $value = $_POST['text'];
    $language = $_POST['language'] ?? 'cz';
    $back_url = htmlspecialchars($urlManager->getBackPage());

  

    DB::update('contents', [
        $column => $value
    ], "contents_id=%i", $contents_id);
    header("Location: " . htmlspecialchars($back_url));
    exit;

}
