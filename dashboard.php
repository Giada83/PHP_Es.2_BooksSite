<?php
session_start();
require_once __DIR__ . './includes/db_connect.php';
include_once __DIR__ . '/includes/html_start.php';


if (!isset($_SESSION['session_id'])) {
    $_SESSION['danger'] = "Reserved access!";
    header('Location: index.php');
    die();
};

$dashboard = $conn->prepare('SELECT * FROM users WHERE username = ?');
$dashboard->execute([$_SESSION['session_user']]);

$row = $dashboard->fetch();
// echo print_r($row);
?>


<body class="body-dash">
    <div class="container vh-100">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col col-md-6 col-lg-8 bg-light rounded">

                <div class="p-5 box">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Welcome <?= $row['username'] ?></h3>

                            <?php include __DIR__ . './includes/session_alert.php'; ?>

                        </div>
                        <div>
                            <a href="./index.php">
                                <h3><i class="bi bi-houses"></i></i></h3>
                            </a>
                        </div>
                    </div>

                    <p>PROFILE SETTING</p>

                    <table class="table">
                        <tbody class="table-text">
                            <tr>
                                <td class="col-3">Username</td>
                                <td><?= $row['username'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $row['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?= $row['gender'] ?? '<span style="font-style: italic">not insert</span>' ?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><?= $row['city'] ?? '<span style="font-style: italic">not insert</span>' ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?= $row['address'] ?? '<span style="font-style: italic">not insert</span>' ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- update information -->
                    <a href="./update_profile.php?id=<?= $row['id'] ?>">
                        <button class="btn btn-dash" type="submit" name="update">Update</button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- close body -->
    <?php include_once __DIR__ . '/includes/html_end.php'; ?>