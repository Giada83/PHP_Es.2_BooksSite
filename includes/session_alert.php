<!-- registration/login advise -->

<!-- DANGER/red color -->
<?php if (isset($_SESSION['danger'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show mt-3 mb-0" role="alert">
        <?= $_SESSION['danger']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['danger']);
} ?>

<!-- WARNING/yellow color -->
<?php if (isset($_SESSION['warning'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show mt-3 mb-0" role="alert">
        <?= $_SESSION['warning']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['warning']);
} ?>

<!-- SUCCESS/green color  -->
<?php if (isset($_SESSION['success'])) { ?>
    <div class="alert alert-success alert-dismissible fade show mt-3 mb-0" role="alert">
        <?= $_SESSION['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['success']);
} ?>