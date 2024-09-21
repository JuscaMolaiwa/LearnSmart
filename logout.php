<?php  

session_start();
include "Utils/Util.php";

session_unset();
session_destroy();

$em = "Successfully logged out! ";
Util::redirect("login.php", "error", $em);