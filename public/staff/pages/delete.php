<?php
require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('pages/index.php'));
}
$id = $_GET['id'];


if (is_post_request()) {

    $result = delete_page($id);
    redirect_to(url_for('pages/index.php'));
} else {
    $page = find_page_by_id($id);

}
?>

<?php $page_title = 'Delete Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" style="min-height: 500px; padding: 0 30px;">

    <a class="back-link" href="<?php echo url_for('pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject delete card">
        <h1>Delete Page</h1>
        <p>Are you sure you want to delete this page?</p>
        <p class="item"><?php echo h($page['menu_name']); ?></p>

        <form action="<?php echo url_for('pages/delete.php?id=' . h(u($page['id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" class="btn btn-danger mb-2" value="Delete Page"/>
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

