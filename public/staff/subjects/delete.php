<?php
require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('subjects/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {

    $result = delete_subject($id);
    redirect_to(url_for('subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}
?>

<?php $page_title = 'Delete Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" style="min-height: 500px; padding: 0 30px;">

    <a class="back-link" href="<?php echo url_for('subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject delete card">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo h($subject['menu_name']); ?></p>

        <form action="<?php echo url_for('subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" class="btn btn-danger mb-2" value="Delete Subject"/>
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
