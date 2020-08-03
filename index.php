<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COMP1006 - Course Project </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&family=Quicksand&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <header>
      <h1> SkillShare</h1>
    </header>
    <main>
      <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="user_first_name"> User First Name:  </label>
        <input type="text" name="user_first_name" class="form-control" id="user_first_name">
        <label for="user_last_name"> User Last Name:  </label>
        <input type="text" name="user_last_name" class="form-control" id="user_last_name">
        <label for="user_email"> User Email: </label>
        <input type="email" name="user_email" class="form-control" id="user_email">
        <label for="location"> Your Location: </label>
        <input type="text" name="location" class="form-control" id="location">
        <label for="social_media"> Social Media: </label>
        <input type="text" name="social_media" class="form-control" id="social_media">
        <label for="skills"> Your Skills: </label>
        <input type="text" name="skills" class="form-control" id="skills">
        <label for="photo"> Upload Your Profile Picture: </label>
        <input type="file" name="photo" id="photo"><br>
        <input type="submit" name="submit" value="Send & Share" class="btn">
      </form>
    </main>
    <footer>
      <p> &copy; 2020 COMP1006 - Course Project </p>
    </footer>
   </div><!--end container-->
  </body>
</html>
