<!-- no completely responsive -->

<?php
// ini_set('display_errors', 1);
session_start();
require_once __DIR__ . './includes/db_connect.php';
require_once __DIR__ . './includes/html_start.php';

$stmt = $conn->prepare('SELECT * FROM books WHERE id = ?');
$stmt->execute([$_GET["id"]]);
$detail = $stmt->fetch();
// echo print_r($detail);

?>

<body class="body-detail">
    <div class="container">
        <div class="row d-flex justify-content-center mt-3 mb-3">
            <div class="col col-md-6 col-lg-8">

                <div class="card book">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $detail['image'] ?>" class="img-fluid" alt="book cover">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body pt-0">
                                <div>
                                    <h5 class="mt-2 mt-md-0"><?= $detail['title'] ?></h5>
                                </div>
                                <p> by <?= $detail['author'] ?></p>

                                <div class="small mt-3">
                                    <?php
                                    if ($detail['category'] === 'fantasy') {
                                    ?>
                                        <span style="background-color: #e1f2bd"><?= $detail['category'] ?></span>
                                    <?php
                                    } elseif ($detail['category'] === 'history') {
                                    ?>
                                        <span style="background-color: #D7D7D7"><?= $detail['category'] ?></span>
                                    <?php
                                    } elseif ($detail['category'] === 'scifi') {
                                    ?>
                                        <span style="background-color: #B3D6FF"><?= $detail['category'] ?></span>
                                    <?php
                                    } else {
                                    ?>
                                        <span style="background-color: #F2BDBD"><?= $detail['category'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="small mt-2"><?= $detail['price'] ? 'Price: ' . $detail['price'] . '$' : 'sold out' ?></div>
                            </div>
                        </div>
                        <div class="col-md-1 d-flex justify-content-center"><a href="./index.php" type="button" class="btn-close"></a></div>
                    </div>

                    <div class=" mt-3">
                        <hr>
                        <h4>Review</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include_once __DIR__ . './includes/html_end.php'; ?>