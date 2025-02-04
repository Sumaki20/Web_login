<?php
session_start();
include('connect.php');
$errors = array();
if(isset($_POST['reg_user']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

    if(empty($username))
    {
        array_push($errors, "Username is required");
    }
    if(empty($email))
    {
        array_push($errors, "Email is required");
    }
    if(empty($password_1))
    {
        array_push($errors, "Password is required");
    }
    if($password_1 != $password_2)
    {
        array_push($errors, "The two passwords do not match");
    }
    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $query = mysqli_query($con,$user_check_query);
    $result = mysqli_fetch_assoc($query);
    if($result)
    {
        if($result['username'] === $username)
        {
            array_push($errors, "Username already exists");
        }
        if($result['email'] === $email)
        {
            array_push($errors, "Email already exists");
        }
    }
    if(count($errors) == 0)
    {
        $password = md5($password_1);

        // คำสั่ง INSERT สำหรับตาราง user
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";
        mysqli_query($con,$sql);

        $user_id = mysqli_insert_id($con);

        // คำสั่ง INSERT id สำหรับตาราง user_activity
        $sql_user_activity = "INSERT INTO user_activity (user_id) VALUES ('$user_id')";
        mysqli_query($con,$sql_user_activity);

        // คำสั่ง INSERT สำหรับตาราง user_data
        $sql_user_data = "INSERT INTO user_data (user_id, firstname, lastname) VALUES ('$user_id', '$firstname', '$lastname')";
        mysqli_query($con,$sql_user_data);

        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }else{
        array_push($errors, "Username or Email already exists");
        $_SESSION['error'] = "Username or Email already exists";
        header("location: register.php");
    }
}
?>