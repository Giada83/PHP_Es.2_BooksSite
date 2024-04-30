<?php
require_once __DIR__ . '/includes/db_connect.php';
include_once __DIR__ . '/includes/html_start.php';
?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">The Books World</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Find a book" aria-label="Search">
                <button class="btn btn-search" type="submit" name="search">Search</button>
            </form>
        </div>
    </div>
</nav>

<!-- books fetch from database -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 row-cols-lg-5 g-2 mt-3">

        <!-- card book -->
        <?php $stmt = $conn->query('SELECT * FROM books ORDER BY title');
        foreach ($stmt as $row) { ?>

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
</div>

<!-- close body -->
<?php include_once __DIR__ . '/includes/html_end.php'; ?>