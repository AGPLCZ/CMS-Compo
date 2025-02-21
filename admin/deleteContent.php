<?php
require_once '../config.php';
require_once '../vendor/autoload.php';

use Compo\Admin\Content\DeleteContent;

// Spustíme třídu pro smazání obsahu
$deleteContent = new DeleteContent();
$deleteContent->handleRequest();
?>
