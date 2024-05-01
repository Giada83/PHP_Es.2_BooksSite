<div class="modal fade" id="signInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signInModalLabel">Sign In</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <!-- form -->
                <form action="./login_code.php" method="POST">
                    <!-- username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" id="username" name="username" maxlength="20">
                    </div>
                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    <!-- button -->
                    <button class="btn btn-primary" type="submit" name="login">Sign Up</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">underston</button>
            </div>
        </div>
    </div>
</div>