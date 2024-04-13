<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);
require_once '../db.meekro.php'; 
require_once "../config.php";

$back =  $_SERVER["HTTP_REFERER"];


echo $back;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['akce'] === 'edit') {
    $contents_id = $_POST['contents_id'];
    $column = $_POST['column'];


	echo $contents_id;
	echo $column;
// %s  string
// %b  název sloupce

    $data = DB::queryFirstRow("SELECT %b FROM contents WHERE contents_id=%i", $column, $contents_id);
    if (!$data) {
        die("Záznam nebyl nalezen.");
    }

var_dump($data);
    echo '<form method="POST" action="http://localhost/CMS/CMS-Compo/admin/edit.php">';
    echo '<input type="hidden" name="akce" value="update">';
	echo '<input type="hidden" name="back" value="' . $back . '">';
    echo '<input type="hidden" name="contents_id" value="' . htmlspecialchars($contents_id) . '">';
    echo '<input type="hidden" name="column" value="' . htmlspecialchars($column) . '">';
    echo '<input type="text" name="value" value="' . htmlspecialchars($data[$column]) . '">';
    echo '<button type="submit">Uložit změny</button>';
    echo '</form>';
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['akce'] === 'update') {
    $contents_id = $_POST['contents_id'];
    $column = $_POST['column'];
    $value = $_POST['value'];
	$back = $_POST['back'];


echo $contents_id;
echo $column;
echo $value;

  DB::update('contents', array(
        $column => $value
    ), "contents_id=%i", $contents_id);

    echo "Změny byly uloženy.";
	echo "<a href=" . $back . ">zpet</a>";
	header("Location: $back"); 
}


?>