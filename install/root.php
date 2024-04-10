<?php
if (isset($_POST["submit"])) {
  $serverName = $_POST["db_server_name"];
  $userName = $_POST["db_user_name"];
  $dbPassword = $_POST["db_pass"];
  $dbName = $_POST["db_name"];


  $conn = new mysqli("$serverName", "$userName", "$dbPassword", "$dbName");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

  
  $sql = array();

  $sql[] = "DROP TABLE IF EXISTS `test`";
  $sql[] = "DROP TABLE IF EXISTS `test2`";


  $sql[] = "CREATE TABLE `test` (
    `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `title` varchar(128) CHARACTER SET latin2 NOT NULL,
    `sequence` int NOT NULL,
    `ext` int NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";



  foreach ($sql as $line) {
    $stmt = $conn->prepare($line);
    $stmt->execute();
    echo "vloženo:" . $line;
  }
  $stmt->close();
}
echo "Databáze vytvořena. Smažte soubor install.php!";
