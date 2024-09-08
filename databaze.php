<?php 
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
// $user = 'dobrodruzi.cz';
// $password = 'e4gXbzJ7qmtM';
// $dbName = 'dobrodruzi_py';
// $host = '127.0.0.1'; 




// Inicializace Eloquentu
$capsule = new Capsule;

// $capsule->addConnection([
//     'driver'    => 'mysql',
//     'host'      => '127.0.0.1', // uprav podle tvé konfigurace
//     'database'  => 'dobrodruzi_py', // uprav podle tvé konfigurace
//     'username'  => 'dobrodruzi.cz', // uprav podle tvé konfigurace
//     'password'  => 'e4gXbzJ7qmtM', // uprav podle tvé konfigurace
//     'charset'   => 'utf8',
//     'collation' => 'utf8_unicode_ci',
//     'prefix'    => '',
// ]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


