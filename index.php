<?php
session_start();
require_once __DIR__ . '/includes/db_connect.php';
include_once __DIR__ . '/index_code.php';
include_once __DIR__ . '/includes/html_start.php';
?>

<!-- navbar -->

<body class="body-index" <header><?php include_once __DIR__ . '/navbar.php'; ?></header>

    <div class="container">

        <!-- registration/login advise -->
        <?php include __DIR__ . './includes/session_alert.php'; ?>


        <!-- card book -->
        <?php
        if (count($booklist) == 0) { ?>
            <div class="no-found">
                <p> No books found</p>
                <p>Come back to <a href="./index.php">home</a></p>
            </div>
        <?php } else { ?>

            <!-- books fetch from database -->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-2 mt-3">

                <?php foreach ($booklist as $row) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?= $row['image'] ?? 'https://i.ibb.co/xmz9ycR/One-Page-Book-Cover-Image.jpg' ?>" class="card-img-top" alt="book cover">
                            <div class="card-body p-2">
                                <h5 class="card-title text-truncate"><?= $row['title'] ?></h5>
                                <p class="card-text"><?= $row['author'] ?></p>
                                <p class="card-text"> <?= $row['price'] ? '$' . $row['price'] : 'sold out' ?></p>
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
            <?php }
            } ?>
            </div>

            <!-- pagination -->
            <div class="mt-4">
                <?php if (count($booklist) !== 0) { ?>
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
                <?php } ?>
            </div>

    </div>

    <!-- close body -->
    <?php include_once __DIR__ . '/includes/html_end.php'; ?>