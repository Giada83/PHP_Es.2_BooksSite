<?php
require_once __DIR__ . '/includes/db_connect.php';
include_once __DIR__ . '/code.php';
include_once __DIR__ . '/includes/html_start.php';
?>

<!-- navbar -->
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= $URL ?>">The Books World</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                <form class="d-flex" role="search" action="" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Find a book title" aria-label="Search" name="search">
                    <button class=" btn btn-search" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<div class="container">

    <!-- books fetch from database -->
    <div class="row row-cols-1 row-cols-md-4 row-cols-lg-5 g-2 mt-3">

        <!-- card book -->
        <?php
        // $stmt = $conn->query('SELECT * FROM books ORDER BY title');
        foreach ($booklist as $row) { ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $row['image'] ?>" class="card-img-top" alt="book cover">
                    <div class="card-body p-2">
                        <h5 class="card-title text-truncate"><?= $row['title'] ?></h5>
                        <p class="card-text"><?= $row['author'] ?></p>
                        <p class="card-text">$ <?= $row['price'] ?></p>
                        <p class="card-text">
                            <?php
                            if ($row['category'] === 'fantasy') {
                            ?>
                                <span style="background-color: #e1f2bd"><?= $row['category'] ?></span>
                            <?php
                            } elseif ($row['category'] === 'history') {
                            ?>
                                <span style="background-color: #D7D7D7"><?= $row['category'] ?></span>
                            <?php
                            } elseif ($row['category'] === 'scifi') {
                            ?>
                                <span style="background-color: #B3D6FF"><?= $row['category'] ?></span>
                            <?php
                            } else {
                            ?>
                                <span style="background-color: #F2BDBD"><?= $row['category'] ?></span>
                            <?php } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- pagination -->
    <div class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $page == 1 ? ' disabled' : '' ?>">
                <a class="page-link" href="<?= $URL ?>/?page=<?= $page - 1 ?><?= $search ? "&search=$search" : '' ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php
            for ($i = 1; $i <= $tot_pages; $i++) { ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $URL ?>/?page=<?= $i ?><?= $search ? "&search=$search" : '' ?>"><?= $i ?></a>
                </li><?php } ?>

            <li class="page-item <?= $page == $tot_pages ? ' disabled' : '' ?>">
                <a class="page-link" href="<?= $URL ?>/?page=<?= $page + 1 ?><?= $search ? "&search=$search" : '' ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>

</div>

<!-- close body -->
<?php include_once __DIR__ . '/includes/html_end.php'; ?>