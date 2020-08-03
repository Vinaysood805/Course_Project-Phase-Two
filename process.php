<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COMP1006 - Course Project </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Piedra&family=Quicksand&display=swap" rel="stylesheet">
  <!-- Compiled and minified JavaScript -->
  <link href="main.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <header>
      <h1> SkillShare</h1>
    </header>
    <main>
      <?php

      //create variables to store form data
      $user_first_name = filter_input(INPUT_POST, 'user_first_name');
      $user_last_name = filter_input(INPUT_POST, 'user_last_name');
      $user_email = filter_input(INPUT_POST, 'user_email', FILTER_VALIDATE_EMAIL);
      $location = filter_input(INPUT_POST, 'location');
      $social_media = filter_input(INPUT_POST, 'social_media');
      $skills = filter_input(INPUT_POST, 'skills');

      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["photo"]["name"]);
      $ok = true;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
          echo "<p>File is an image - " . $check["mime"] . "!</p>";
          $ok = true;
        } else {
          echo "<p>File is not an image!</p>";
          $ok = false;
        }
      }


      //set up a flag variable

      $ok = true;


      //validate
      // first name and last name not empty

      if (empty($user_first_name) || empty($user_last_name)) {
        echo "<p class='error'>Please provide both first and last name! </p>";
        $ok = false;
      }

      //email not empty and proper format
      if (empty($user_email) || $user_email === false) {
        echo "<p class='error'>Please include your email in the proper format!</p>";
        $ok = false;
      }

      //location not empty
      if (empty($location)) {
        echo "<p class='error'>Please provide your location! </p>";
        $ok = false;
      }

      //Social Media Detail not empty
      if (empty($social_media)) {
        echo "<p class='error'>Please provide your active social media detail! </p>";
        $ok = false;
      }

      //Skills not empty
      if (empty($skills)) {
        echo "<p class='error'>Please provide your Skills! </p>";
        $ok = false;
      }

      // Check file size
      if ($_FILES["photo"]["size"] > 500000) {
        echo "<p>Sorry, your file is too large! </p>";
        $ok = false;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed!</p>";
        $ok = false;
      }

      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "<p>The file ". basename( $_FILES["photo"]["name"]). " has been uploaded successfully.</p>";
        $ok = true;
      }
      //if form validates, try to connect to database and add info

      if ($ok === true) {
        try {

          // add a comment to explain the line of code below

          require_once('connect.php');

          // add a comment to explain the line of code below
          $sql = "INSERT INTO skills (user_first_name, user_last_name, user_email, location, social_media, skills, photo) VALUES (:user_first_name, :user_last_name, :user_email, :location, :social_media, :skills, :photo);"; // what is missing here?
          // add a comment to explain the line of code below
          $statement = $db->prepare($sql); // fill in the correct method
          // add a comment to explain the line of code below
          $statement->bindParam(':user_first_name', $user_first_name);
          $statement->bindParam(':user_last_name', $user_last_name);
          $statement->bindParam(':user_email', $user_email);
          $statement->bindParam(':location', $location);
          $statement->bindParam(':social_media', $social_media);
          $statement->bindParam(':skills', $skills);
          $statement->bindParam(':photo', $target_file);

          // add a comment to explain the line of code below
          $statement->execute(); // fill in the correct method

          // show message
          echo "<p> Skills added! Thanks for sharing! </p>";


          // add a comment to explain the line of code below

          $statement->closeCursor(); // fill in the correct method


        } catch (PDOException $e) {
          $error_message = $e->getMessage();
          //show error message to user
          echo "<p> Sorry! We weren't able to process your submission at this time. We've alerted our admins and will let you know when things are fixed! </p> ";
          echo $error_message;
          //email app admin with error
          mail('youremailhere@gmail.com', 'App Error ', 'Error :' . $error_message);
        }
      }
      ?>
      <a href="index.php" class="error-btn"> Back to Form </a>
    </main>
    <footer>
      <p> &copy; 2020 COMP1006 - Course Project </p>
    </footer>
  </div>
  <!--end container-->
</body>

</html>
