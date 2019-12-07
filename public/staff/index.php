<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff menu'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" style="min-height: 500px; padding: 0 30px;">
    <div id="main-menu">
        <h2 class="text-center">Main Menu</h2>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="<?= url_for('subjects/index.php'); ?>">Subjects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= url_for('pages/index.php'); ?>">Pages</a>
            </li>

        </ul>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

