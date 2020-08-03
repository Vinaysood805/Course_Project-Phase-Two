<?php require_once ('auth.php'); ?>
<!DOCTYPE html>
 <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View Skills </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php

        require_once('connect.php');

        $sql = "SELECT * FROM skills;";

        $statement= $db->prepare($sql);
        $statement->execute();

        $records = $statement->fetchAll();
        echo '<table>';
        foreach($records as $record) {
            echo '<div><img src="' . $record['photo'] . '"></div>';
            echo'<tr><td>' . $record['user_first_name'] . '</td<td>' . $record['user_last_name'] . '</td<td>' . $record['user_email'] . '</td<td>' . $record['location'] .'</td><td>' . $record['social_media'] . $record['skills'] . '</td><td><a href="delete.php?id=' . $record['user_id'] . '"> Delete?</a></td></tr>';
        }
        echo '</table>';
        ?>

    </body>
</html>
