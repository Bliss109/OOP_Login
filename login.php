<?php
require_once 'config/config.php';
$errors = [ 'email' => '', 'password1' => ''];

$email = $password1 = '';
if (isset($_POST['login'])) {

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email should not be empty';
    } else {
        $email = htmlspecialchars($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please provide a valid email';
        }
    }

    // check password1
    if (empty($_POST['password1'])) {
        $errors['password1'] = 'Password should not be empty';
    } else {
        $password1 = htmlspecialchars($_POST['password1']);
    }


    // Check if no more errors
    if (!array_filter($errors)) {
        // hash password
        $password = md5($password1);
        // check if email already exists
       $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
       $stmt = $conn->prepare($sql);
       $stmt->execute([
           'email' => $email,
           'password' => $password
       ]);

       $user = $stmt->fetch();

       if($stmt->rowCount()){
        $_SESSION['user'] = $user;
        header('location: index.php');
       }

    }


}

