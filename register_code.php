<!-- // REGISTER FORM -->
<?php
session_start();
require_once __DIR__ . './includes/db_connect.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    // username validation
    $isUsernameValid = filter_var(
        $username,
        FILTER_VALIDATE_REGEXP,
        [
            "options" => [
                "regexp" => "/^[a-z\d_]{3,20}$/i"
            ]
        ]
    );

    // password lenght
    $passLenght = mb_strlen($password);

    if (empty($username) || empty($email) || empty($password)) {
        echo  'Please, fill in all fields';
    } elseif (false == $isUsernameValid) {
        echo  'Invalid username. Only alphanumeric characters and underscores are allowed. The length must be between 3 and 20 characters';
    } elseif ($passLenght < 8 || $passLenght > 20) {
        echo  'Password length must be between 8 and 20 characters';
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);


        // user already exist?
        $query = 'SELECT id FROM users WHERE username = :username';
        $check = $conn->prepare($query);
        $check->bindParam(
            ':username',
            $username,
            PDO::PARAM_STR
        );
        $check->execute();

        $users = $check->fetchAll();

        if (count($users) > 0) {
            echo 'User already exist';
        } else {
            // $query = 'INSERT INTO users VALUES (0, :username, :email, :password)';

            // $check = $conn->prepare($query);
            // $check->bindParam(':username', $username, PDO::PARAM_STR);
            // $check->bindParam(':email', $email, PDO::PARAM_STR);
            // $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
            // $check->execute();

            $check = $conn->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password);');

            $check->execute([
                'username' => $username,
                'email' => $email,
                'password' => $password_hash,
            ]);

            if ($check->rowCount() > 0) {
                $_SESSION['message'] = "Successful registration";
                header('Location: index.php');
                exit(0);
            } else {
                $_SESSION['message'] = "OPS! Something wrong";
                header('Location: index.php');
                exit(0);
            }
        }
    }
}
