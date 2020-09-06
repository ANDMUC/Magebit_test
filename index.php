<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
 <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />

 <link rel="stylesheet" href="./styles.css" />
 <title>Test</title>
</head>

<body>
 <div class="container">
  <div class="center-div">
   <div class="sign-up">
    <h1>Don't have an account?</h1>
    <hr class="horizontal-line" />
    <p>
     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
     nemo mollitia deleniti magni?
    </p>
    <button type="submit" id="signUpButton" style="user-select: none;">Sign Up</button>
   </div>
   <div class="login">
    <h1>Have an account?</h1>
    <hr class="horizontal-line" />
    <p>
     Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio?
    </p>
    <button type="submit" id="loginButton" style="user-select: none;">Login</button>
   </div>
   <!-- Login logs -->
   <div class="baltais-login">
    <form class="login-form" action="includes/login.inc.php" method="post">
     <div class="signUpLogo">
      <p style="font-size: 24px">Login</p>
      <img src="images/magebitlogo.png" alt="" />
     </div>
     <hr class="horizontal-line" />
     <?php
     if (isset($_GET['error'])) {
      if ($_GET['error'] == 'emptyfields') {
       echo '<p class="error-message">Fill in all fields!</p>';
      } else if ($_GET['error'] == 'loginfailed') {
       echo '<p class="error-message">Incorrect e-mail or password!</p>';
      } else if ($_GET['error'] == 'loginfailed') {
       echo '<p class="error-message">Incorrect e-mail or password!</p>';
      }
     }
     ?>
     <!--  LOGIN Email input -->
     <div class="emailInput">
      <input type="text" name="mailLogin" placeholder="Email" />
      <i class="far fa-envelope"></i>
     </div>
     <!-- LOGIN Password input -->
     <div class="passwordInput">
      <input type="password" name="pwdLogin" placeholder="Password" />
      <i class="fas fa-lock"></i>
     </div>
     <!-- LOGIN button -->
     <div class="buttonField">
      <button type="submit" name="login-submit" style="user-select: none;">Login</button>
      <p>Forgot?</p>
     </div>
    </form>
   </div>
   <!-- Sign-up logs -->
   <div class="baltais-signup">
    <form class="signup-form" action="includes/signup.inc.php" method="post">
     <div class="signUpLogo">
      <p style="font-size: 24px">Sign Up</p>
      <img src="images/magebitlogo.png" alt="" />
     </div>
     <hr class="horizontal-line" />
     <?php
     if (isset($_GET['error'])) {
      if ($_GET['error'] == 'emptyfields1') {
       echo '<p class="error-message">Fill in all fields!</p>';
      } else if ($_GET['error'] == 'invalidfullnamemail') {
       echo '<p class="error-message">Invalid name and e-mail!</p>';
      } else if ($_GET['error'] == 'invalidmail') {
       echo '<p class="error-message">Invalid e-mail!</p>';
      } else if ($_GET['error'] == 'invalidfullname') {
       echo '<p class="error-message">Invalid name!</p>';
      }
     }
     if (isset($_GET['signup'])) {
      if ($_GET['signup'] == 'success') {
       echo '<p class="success-message">Signup successful!</p>';
      }
     }
     ?>
     <!-- SIGNUP Name input -->
     <div class="nameInput">
      <input type="text" name="fullname" placeholder="Name" value="<?php
                                                                   if (isset($_GET['fullname'])) {
                                                                    echo $_GET['fullname'];
                                                                   }
                                                                   ?>" />
      <i class="far fa-user"></i>
     </div>
     <!-- SIGNUP Email input -->
     <div class="emailInput">
      <input type="text" name="mail" placeholder="Email" value="<?php
                                                                if (isset($_GET['mail'])) {
                                                                 echo $_GET['mail'];
                                                                }
                                                                ?>" />
      <i class="far fa-envelope"></i>
     </div>
     <!-- SIGNUP Password input -->
     <div class="passwordInput">
      <input type="password" name="pwd" placeholder="Password" />
      <i class="fas fa-lock"></i>
     </div>
     <!-- SIGNUP button -->
     <div class="buttonField">
      <button class="submit-signup-form" type="submit" name="signup-submit" style="user-select: none;">Sign Up</button>
     </div>
    </form>
   </div>
  </div>
 </div>
 <script src="./app.js"></script>
</body>

</html>