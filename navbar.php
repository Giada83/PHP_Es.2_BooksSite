<?
// require_once __DIR__ . './includes/db_connect.php';
include __DIR__ . './register.php';
include __DIR__ . './login.php';
?>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= $URL ?>">LiteraryLoot</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- link -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $URL ?>">
                        <div class="circle"><i class="bi bi-house-fill"></i></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $URL ?>">
                        <div class="circle"><i class="bi bi-person-fill"></i></div>
                    </a>
                </li>
            </ul>

            <!-- search form -->
            <form class="d-flex" role="search" action="" method="GET">
                <input class="form-control me-2 input-nav" type="search" placeholder="Find a book title" aria-label="Search" name="search">
                <button class="btn btn-search" type="submit">Search</button>
            </form>


            <!-- button -->
            <?php if (!$_SESSION['session_id']) { ?>
                <button class="btn btn-search ms-2 sign" type="button" data-bs-toggle="modal" data-bs-target="#signInModal">SIGN IN</button>
            <?php } ?>

            <?php if (!$_SESSION['session_id']) { ?>
                <button class="btn btn-search ms-2 sign" type="button" data-bs-toggle="modal" data-bs-target="#signUpModal">SIGN UP</button>
            <?php } ?>

            <?php if ($_SESSION['session_id']) { ?>
                <a class="btn btn-search ms-2 sign" type="submit" href="./logout.php">LOG OUT</a>
            <?php } ?>
        </div>

    </div>
</nav>