<?php
$localhost='localhost';
$root='root';
$passwors='';
$database='drug';
$connect=mysqli_connect($localhost,$root,$passwors,$database);

if (mysqli_connect_errno()) {

    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
      
    exit();
  }
?>