<?
include __DIR__ . './login.php'; //for login
?>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="./index.php">LiteraryLoot</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- link -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">
                        <i class="bi bi-house-fill"></i>
                    </a>
                </li>
                <?php if ($_SESSION['session_id']) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./dashboard.php">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item d-flex align-items-center">
                    <p>
                        <i class="bi bi-bookmark-check-fill"></i> Welcome
                        <?php if ($_SESSION['session_id']) {
                            echo "$_SESSION[session_user]";
                        } else {
                            echo "Guest";
                        } ?>
                    </p>
                </li>
            </ul>

            <!-- search form -->
            <form class=" d-flex" role="search" action="" method="GET">
                <input class="form-control input-nav" type="search" placeholder="Find a book title" aria-label="Search" name="search">
                <button class="btn btn-search ms-2" type="submit">Search</button>
            </form>

            <!-- button -->
            <?php if (!$_SESSION['session_id']) { ?>
                <button class="btn ms-2 sign" type="button" data-bs-toggle="modal" data-bs-target="#signInModal">Sign In</button>
            <?php } ?>

            <?php if (!$_SESSION['session_id']) { ?>
                <a class="btn ms-2 sign" type="button" href="./register.php">Sign Up</a>

            <?php } ?>

            <?php if ($_SESSION['session_id']) { ?>
                <a class="btn btn-search ms-2 logout" type="submit" href="./logout.php">Log Out</a>
            <?php } ?>
        </div>

    </div>
</nav>