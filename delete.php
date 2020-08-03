<?php

$id = filter_input(INPUT_GET, 'id');

require_once('connect.php');

$sql = "DELETE FROM skills WHERE user_id = :id;";

$statement = $db->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();

header('Location:view.php');
?>
