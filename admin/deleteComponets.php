<?php
require_once '../db.meekro.php';
require_once "../config.php";
require_once '../vendor/autoload.php';

use Compo\Admin\Components\DeleteComponents;

$deleteComponents = new DeleteComponents();
$deleteComponents->deleteComponents();

?>