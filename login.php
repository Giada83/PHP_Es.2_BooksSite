<div class="modal fade" id="signInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title fs-5" id="signInModalLabel">Sign In</h2>
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
                    <div class="mt-4">
                        <button class="btn btn-form" type="submit" name="login">Sign In</button>
                        <button type="button" class="btn btn-form ms-1" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>