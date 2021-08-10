<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'web_mysqli');

if ( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['cpassword'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if (empty($username)) {
        header("Location: register.php?error=User Name is required");
        exit();
    } else if (empty($password)) {
        header("Location: register.php?error=Password is required");
        exit();
    } else if (empty($cpassword)) {
        header("Location: register.php?error=Repeat Password is required");
        exit();
    } else if (empty($email)) {
        header("Location: register.php?error=Email is required");
        exit();
    } else if (empty($phone)) {
        header("Location: register.php?error=Phone is required");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: register.php?error=The confirmation password  does not match");
        exit();
    } else {

        // hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE username='$username' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: register.php?error=The username is taken try another&");
            exit();
        } else {
            $sql2 = "
                        insert into users(username, email, phone, password)
                        values('$username','$email','$phone','$password')
            ";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: login.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: register.php?error=unknown error occurred");
                exit();
            }
        }
    }
} else {
    header("Location: register.php");
    exit();
}
