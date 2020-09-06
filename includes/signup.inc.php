<?php

/* code inside the if statement is executed only if user clicks on the signup button*/
if (isset($_POST['signup-submit'])) {

 require "dbh.inc.php";

 $fullname = $_POST['fullname'];
 $mail = $_POST['mail'];
 $password = $_POST['pwd'];

 /* if any of the fields is left empty, then sign up is going to be unsuccessful and user will be sent back 
 to the initial page (index.php)*/
 if (empty($fullname) || empty($mail) || empty($password)) {
  header("Location: ../index.php?error=emptyfields1&fullname=" . $fullname . "&mail=" . $mail);
  exit();
  // if email is not valid AND name does not comply with REGEXP validation, then user is sent back
 } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^\D*$/", $fullname)) {
  header("Location: ../index.php?error=invalidfullnamemail");
  exit();
 } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../index.php?error=invalidmail&fullname=" . $fullname);
  exit();
 } else if (!preg_match("/^\D*$/", $fullname)) {
  header("Location: ../index.php?error=invalidfullname&mail=" . $mail);
  exit();
 } else {
  $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
   header("Location: ../index.php?error=sqlerror");
   exit();
  } else {
   mysqli_stmt_bind_param($stmt, "s", $mail);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $resultCheck = mysqli_stmt_num_rows($stmt);
   if ($resultcheck > 0) {
    header("Location: ../index.php?error=mailtaken&fullname=" . $fullname);
    exit();
   }
   // now let's insert the data in the database
   else {
    $sql = "INSERT INTO users (nameidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("Location: ../index.php?error=sqlerror");
     exit();
    } else {
     $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
     mysqli_stmt_bind_param($stmt, "sss", $fullname, $mail, $hashedPwd);
     mysqli_stmt_execute($stmt);
     //now the user has signed up to the website and now we will return him to the sign up page with success message
     header("Location: ../index.php?signup=success");
     exit();
    }
   }
  }
 }
 /* just in case user gets access to this page (by writing in URL /includes/signup.inc.php), then we send him back to the signup.php */
} else {
 header("Location: ../index.php");
 exit();
}
