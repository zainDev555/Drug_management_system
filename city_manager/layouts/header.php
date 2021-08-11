<?php
include "../db.php";

session_start();
 $_SESSION['city'];


if (!$_SESSION['email']) {

  header("location:../citymanagerLogin.php");
}
if (isset($_POST['logout'])) {
 
  session_destroy();
  unset($_SESSION['email']);
  unset($_SESSION['city']);
  header("location:../citymanagerLogin.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>city-Manager-pannel</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="./assets/css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="./assets/css/admin.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
 