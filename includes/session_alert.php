<!-- registration/login advise -->

<!-- Registration ok -->
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-success alert-dismissible fade show mt-3 mb-0" role="alert">
        <strong>Congratulations!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['message']);
}

// Already logged in
if (isset($_SESSION['alert'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show mt-3 mb-0" role="alert">
        <strong>OPS!</strong> <?= $_SESSION['alert']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['alert']);
}

// logged in
if (isset($_SESSION['user'])) { ?>
    <div class="alert alert-success alert-dismissible fade show mt-3 mb-0" role="alert">
        <strong>Welcome</strong> <?= $_SESSION['user']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['user']);
}

// logged out
if (isset($_SESSION['logout'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show mt-3 mb-0" role="alert">
        <strong>Goodbye!</strong> <?= $_SESSION['logout']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['logout']);
} ?>