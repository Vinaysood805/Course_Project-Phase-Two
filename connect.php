<?php
try {
    $dsn = 'mysql:host=localhost;dbname=Vinay200447158';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn, $username, $password);
    echo 'Connected successfully to server!';
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
//set error mode to exception
catch(PDOException $e) {
   $error_message = $e->getMessage();
   echo "<p> Whoops! Our bad! Something happened while trying to connect. It was this -  $error_message </p>";
}
?>
