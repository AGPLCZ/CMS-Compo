<?php
namespace Compo\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

//Eloquent
class Database
{
    public function __construct()
    {
        // Načtení konfigurace
        require_once __DIR__ . '/../../config.php';

        try {
            $capsule = new Capsule;
    
            $capsule->addConnection([
                'driver'    => 'mysql',
                'host'      => $host,
                'database'  => $dbName,
                'username'  => $user,
                'password'  => $password,
                'charset'   => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix'    => '',
            ]);
    
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
        } catch (\Exception $e) {
            error_log($e->getMessage());
            exit('Chyba při připojování k databázi.');
        }

    }

    



}