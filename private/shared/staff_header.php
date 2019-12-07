<?php
if(isset($page_title)) {
    $page_title = 'Staff Area';
}
?>

<!doctype html>

<html lang="en">
<head>
    <title>GBI - <?= $page_title; ?> </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= url_for('node_modules/bootstrap/dist/css/bootstrap.css/bootstrap.min.css');  ?>">
</head>

<body class="container-fluid">
<header class="p-3 mb-2 bg-danger text-white">
    <h1 class="text-center text-white">GBI Staff Area</h1>
</header>
<navigation>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="<?= url_for('index.php'); ?>">Menu</a>
        </li>
    </ul>
</navigation>
