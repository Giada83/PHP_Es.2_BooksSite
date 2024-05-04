<?php
session_start();
include __DIR__ . './includes/html_start.php';
?>

<body class="body-dash">
    <div class="container vh-100">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col col-lg-10 bg-light rounded">

                <form class="p-4" action="./register_code.php" method="POST" novalidate>

                    <h2 class="modal-title">Sign Up</h2>

                    <!-- SESSION alert -->
                    <?php include __DIR__ . './includes/session_alert.php'; ?>

                    <!-- username -->
                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control <?php echo isset($_SESSION['errors']['username']) ? 'is-invalid' : ''; ?>" type="text" id="username" name="username" maxlength="20">
                        <?php if (isset($_SESSION['errors']['username'])) : ?>
                            <div class="invalid-feedback"><?php echo $_SESSION['errors']['username']; ?></div>
                        <?php endif; ?>
                        <div class="form-text">The username must be a maximum of 20 characters</div>
                    </div>

                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control <?php echo isset($_SESSION['errors']['email']) ? 'is-invalid' : ''; ?>" type="email" id="email" name="email">
                        <?php if (isset($_SESSION['errors']['email'])) : ?>
                            <div class="invalid-feedback"><?php echo $_SESSION['errors']['email']; ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control <?php echo isset($_SESSION['errors']['password']) ? 'is-invalid' : ''; ?>" type="password" id="password" name="password">
                        <?php if (isset($_SESSION['errors']['password'])) : ?>
                            <div class="invalid-feedback"><?php echo $_SESSION['errors']['password']; ?></div>
                        <?php endif; ?>
                        <div class="form-text">Password length must be between 8 and 20 characters</div>
                    </div>

                    <!-- button -->
                    <div class="mt-4">
                        <button class="btn btn-form" type="submit" name="register">Submit</button>
                        <a type="button" class="btn btn-form ms-1" href="./index.php">Close</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    include __DIR__ . './includes/html_end.php';
    unset($_SESSION['errors']); // Remove errors from the session after viewing them
    ?>