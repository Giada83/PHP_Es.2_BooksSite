<!-- REGISTRATION FORM INTO POP UP WINDOW -->

<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="signUpModalLabel">Sign Up</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- form -->
            <div class="modal-body">
                <form action="./register_code.php" method="POST">
                    <!-- username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" id="username" name="username" maxlength="20" required>
                        <div class="form-text">The username must be a maximum of 20 characters</div>
                    </div>
                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>
                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <!-- button -->
                    <div class="mt-4">
                        <button class="btn btn-form" type="submit" name="register">Submit</button>
                        <button type="button" class="btn btn-form ms-1" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>