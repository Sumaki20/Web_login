<?php
session_start();
include('connect.php');
$errors = array();

if(isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    if(empty($username))
    {
        array_push($errors, "Username is required");
        header("location: index.php");
    }
    if(empty($password))
    {
        array_push($errors,"Passwprd is required");
        var_dump($errors);
        header("location: index.php");
    }

    if (count($errors) == 0)
    {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password='$password'";
        $result = mysqli_query($con, $query);

        $row = mysqli_fetch_assoc($result);
        $query_data = "SELECT * FROM user_data WHERE user_id = '{$row['id']}'";
        $result_data = mysqli_query($con, $query_data);
        $row_data = mysqli_fetch_assoc($result_data);

        if(mysqli_num_rows($result) == 1)
        {
            //$time_loged = date("Y-m-d H:i:s", strtotime("now"));
            $_SESSION['username'] = $username;
            $_SESSION['user'] = $row_data['user_id'];
            $_SESSION['firstname'] = $row_data['firstname'];
            $_SESSION['lastname'] = $row_data['lastname'];
            $_SESSION['success'] = "Your are now logged in";
            $_SESSION['time_loged'] = $time_loged;
            $query_log = "INSERT INTO user_activity (user_id) VALUES ('" . $_SESSION['user'] . "')";
            mysqli_query($con, $query_log);
            header("location: index.php");
        }else
        {
            array_push($errors, "Wrong username/password combination");
            $_SESSION['error'] = "Wrong username or password try again";
            header("location: index.php");
        }
    }

}