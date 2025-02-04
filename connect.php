<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='signupform';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if ($con) {
    //echo "Connected successfully";
  }
  else{
      die(mysqli_error($con));
  }