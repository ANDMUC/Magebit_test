<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
 <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />

 <link rel="stylesheet" href="./logged_in.css" />
 <title>Test</title>
</head>

<body>
 <div class="container">
  <div class="center-div">
   <div class="logged-in">
    <?php
    if (isset($_SESSION['userEmail'])) {
     echo "<p>You are logged in!</p>";
    }
    ?>
    <form class="logout-button" action="includes/logout.inc.php" method="post">
     <button class="logout-button" type="submit" style="user-select: none;">Logout</button>
    </form>
   </div>
  </div>
 </div>
</body>

</html>