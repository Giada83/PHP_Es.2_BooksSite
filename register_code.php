<?php
session_start();
require_once __DIR__ . './includes/db_connect.php';

// Define the test_input() function: used to filter and clean the data sent by the form, to avoid possible script and HTML injection attacks.
function test_input($data)
{
    $data = trim($data); //for empty whitespace
    $data = stripslashes($data); //unquotes a quoted string
    $data = htmlspecialchars($data); //convert special characters to HTML entries
    return $data;
}

// errors
$errors = array();

// POST 
if (isset($_POST['register'])) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Sanitize inputs using test_input() function
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    // Sanitize inputs using htmlspecialchars
    // $username = htmlspecialchars(trim($username));
    // $email = htmlspecialchars(trim($email));
    // $password = htmlspecialchars(trim($password));

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

    // email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }


    // password length
    $passLength = mb_strlen($password);

    if (empty($username)) {
        $errors['username'] = 'Please enter a username';
    } elseif (false == $isUsernameValid) {
        $errors['username'] = 'Invalid username. Only alphanumeric characters and underscores are allowed. The length must be between 3 and 20 characters';
    }

    if (empty($email)) {
        $errors['email'] = 'Please enter an email address';
    }

    if (empty($password)) {
        $errors['password'] = 'Please enter a password';
    } elseif ($passLength < 8 || $passLength > 20) {
        $errors['password'] = 'Password length must be between 8 and 20 characters';
    }

    if (empty($errors)) {
        // User already exist?
        $query = 'SELECT id FROM users WHERE username = :username';
        $check = $conn->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();

        $users = $check->fetchAll();

        if (count($users) > 0) {
            $_SESSION['danger'] = "<strong>OPS!</strong> User already exists";
            header('Location: register.php');
            exit();
        } else {
            // If the user does not already exist, proceed with inserting it into the database
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $query = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';

            // SQL injection prevention: use prepared statements
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $_SESSION['success'] = "<strong>Congratulations!</strong> Successful registration";
                header('Location: index.php');
                exit();
            } else {
                $_SESSION['error'] = "<strong>OPS!</strong> Something went wrong with registration";
                header('Location: register.php');
                exit();
            }
        }
    } else {
        // If there are errors, store them in the session and redirect to register.php
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }
}
