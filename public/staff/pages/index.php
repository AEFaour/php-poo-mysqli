<?php require_once('../../../private/initialize.php'); ?>

<?php

$page_set = find_all_pages();
$pages = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'History'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Leadership'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Contact Us'],
];
?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" style="min-height: 500px; padding: 0 30px;>
   <div class=" pages listing card">
<h1>Pages</h1>

<div class="actions card">
    <a class="action" href="<?php echo url_for('pages/new.php'); ?>">Create New Page</a>
</div>
<table class="table table-bordered text-center">
    <tr class="bg-danger">
        <th scope="col">ID</th>
        <th scope="col">Subject</th>
        <th scope="col">Position</th>
        <th scope="col">Visible</th>
        <th scope="col">Name</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
    </tr>
    <?php while($page = mysqli_fetch_assoc($page_set)) {  ?>
        <?php $subject=find_subject_by_id($page['subject_id']); ?>
        <tr>
            <td scope="row"><?= h($page['id']); ?></td>
            <td scope="row"><?= h($subject['menu_name']); ?></td>
            <td scope="row"><?= h($page['position']); ?></td>
            <td scope="row"><?= $page['visible'] == 1 ? 'true' : 'false'; ?></td>
            <td scope="row"><?= h($page['menu_name']); ?></td>
            <td scope="row"><a class="action" href="<?= url_for('pages/show.php?id=' . h(u($page['id']))); ?>">View</a>
            </td>
            <td scope="row"><a class="action" href="<?= url_for('pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
            <td scope="row"><a class="action" href="<?= url_for('pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a></td>
        </tr>
    <?php }; ?>
</table>
<?php

mysqli_free_result($page_set);
?>
</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

