<?php 
namespace Compo\Database;

use mysqli;
use Exception;

class Database
{
    private $conn;

    public function __construct()
    {
        // Načtení konfigurace
        require_once __DIR__ . '/../../config.php';

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            // Vytvoření připojení k databázi
            $this->conn = new mysqli($host, $user, $password, $dbName);
            $this->conn->set_charset("utf8mb4");
        } catch (\Exception $e) {
            // Zachycení chyby připojení k databázi
            error_log($e->getMessage());
            exit('Error connecting to database'); 
        }
    }

    // Příklad metody pro provedení dotazu
    public function query($sql)
    {
        $result = $this->conn->query($sql);
        if ($result === false) {
            throw new \Exception("SQL Error: " . $this->conn->error);
        }
        return $result;
    }

    // Uzavření připojení
    public function close()
    {
        $this->conn->close();
    }
}


/*

require_once 'vendor/autoload.php';

use Compo\Database\Database;

$db = new Database();

try {
    $result = $db->query("SELECT * FROM table_name");
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

$db->close();


*/