<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='signupform';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $con->set_charset("utf8mb4");

  