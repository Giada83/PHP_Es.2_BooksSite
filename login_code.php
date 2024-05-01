<!-- login form -->
<?php
session_start();
require_once __DIR__ . './includes/db_connect.php';

// user already logged in?
if (isset($_SESSION['session_id'])) {
    $_SESSION['alert'] = "You are already logged in";
    header('Location: index.php');
    exit(0);
};

// verify user authentication
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        printf("Please, insert username and password");
    } else {
        $query = 'SELECT username, password FROM users WHERE username = :username';

        $check = $conn->prepare($query);
        $check->bindParam(':username', $username);
        $check->execute();

        $user = $check->fetch();

        // check if user exist and the password is correct
        if (!$user || password_verify($password, $user['password']) === false) {
            echo 'Incorrect user credentials';
        }

        // if login ok regenerate session_id with username and temporary session id
        else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];

            $_SESSION['user'] = '<strong>' . $username . '</strong>' . '' . ', now you can go to your
            <a href=./dashboard.php> personal area</a> or write a review';
            header('Location: index.php');
            exit(0);
        }
    }
}
