<?php
// SEARCH AND PAGINATION
$search = $_GET['search'] ?? '';

$page = $_GET['page'] ?? 1;
$each_page = $_GET['each_page'] ?? 5;
$offset = ($page - 1) * $each_page;

$each_page = $each_page > 10 ? 5 : $each_page;

$stmt = $conn->prepare("SELECT * FROM books  WHERE title LIKE :search ORDER BY title LIMIT :each_page OFFSET :offset ");
$stmt->execute([
    'search' => "%$search%",
    'offset' => $offset,
    'each_page' => $each_page,
]);
$booklist = $stmt->fetchAll();

// max page results
$stmt = $conn->prepare('SELECT COUNT(*) AS num_row FROM books WHERE title LIKE :search');
$stmt->execute([
    'search' => "%$search%",
]);
$num_row = $stmt->fetch()['num_row'];
$tot_pages = ceil($num_row / $each_page);

// ----------------------------------------------------------------------
