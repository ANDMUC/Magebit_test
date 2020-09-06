<?php

if (isset($_POST['login-submit'])) {

 require 'dbh.inc.php';

 $emailLogin = $_POST['mailLogin'];
 $pwdLogin = $_POST['pwdLogin'];

 // if either of the fields is empty, throw the user back to index.php
 if (empty($emailLogin) || empty($pwdLogin)) {
  header("Location: ../index.php?error=emptyfields");
  exit();
 } else {
  $sql = "SELECT * FROM users WHERE emailUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
   header("Location: ../index.php?error=sqlerror");
   exit();
  } else {
   // now we want to check if the info that user gives us during the login matches with something in database
   mysqli_stmt_bind_param($stmt, 's', $emailLogin);
   // now we need to execute the parameters above, so we can get a result from database
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   if ($row = mysqli_fetch_assoc($result)) {
    $pwdCheck = password_verify($pwdLogin, $row['pwdUsers']);
    if ($pwdCheck == false) {
     // for safety purposes we are not going to tell in the URL that password was incorrect
     header("Location: ../index.php?error=loginfailed");
    } else {
     session_start();
     $_SESSION['userId'] = $row['idUsers'];
     $_SESSION['userEmail'] = $row['emailUsers'];
     header("Location: ../logged_in.php?login=success");
     exit();
    }
   } else {
    // in this case such user does not exist
    header("Location: ../index.php?error=loginfailed");
    exit();
   }
  }
 }
} else {
 header("Location: ../index.php");
 exit();
}
