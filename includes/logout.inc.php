<?php

session_start();

// removes the values set to the $_SESSION variables
session_unset();

// destroys the sessionS currently running in the website
session_destroy();

header("Location: ../index.php?logout");
