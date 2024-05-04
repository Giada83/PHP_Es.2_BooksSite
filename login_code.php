<!-- login form -->
<?php
session_start();
require_once __DIR__ . './includes/db_connect.php';

// user already logged in?
if (($_SESSION['session_id'])) {
    $_SESSION['warning'] = "You are already logged in";
    header('Location: index.php');
    die();
};

// verify user authentication
if (isset($_POST['login'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (empty($username) || empty($password)) {
        $_SESSION['danger'] = "Please, insert username and password";
        header('Location: index.php');
        exit(0);
        //     echo '<script type="text/javascript">
        //    window.onload = function () { alert("Please, insert username and password"); }</script>';
    } else {
        $query = 'SELECT username, password FROM users WHERE username = :username';

        $check = $conn->prepare($query);
        $check->bindParam(':username', $username);
        $check->execute();

        $user = $check->fetch();

        // check if user exist and the password is correct
        if (!$user || password_verify($password, $user['password']) === false) {
            // error on index page because server errors don't function with modal
            $_SESSION['danger'] = "Incorrect user credentials";
            header('Location: index.php');
            exit(0);
        }

        // if login ok regenerate session_id with username and temporary session id
        else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];

            $_SESSION['success'] = '<strong>' . 'Welcome' . ' ' . $username . '</strong>' . ', now you can go to your
            <a href=./dashboard.php> personal area</a> or write a review';
            header('Location: index.php');
            exit(0);
        }
    }
}
