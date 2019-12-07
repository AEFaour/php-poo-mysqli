<?php

require_once("../../../private/initialize.php");

if (!isset($_GET['id'])) {
    redirect_to(url_for('subjects/index.php'));
}
$id = $_GET['id'];


if (is_post_request()) {
    $subject = [];
    $subject['id'] = $id;
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = update_subject($subject);
    if($result === true){
        redirect_to(url_for('subjects/show.php?id=' . $id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }

} else {
    $subject = find_subject_by_id($id);

}

$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);

?>

<?php $page_title = 'Edit Subject'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" style="min-height: 500px; padding: 0 30px;">

    <a class="back-link" href="<?= url_for('subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject edit new card">
        <h1>Edit Subject</h1>

        <?= display_errors($errors); ?>

        <form action="<?= url_for('subjects/edit.php?id=' . h(u($id))); ?>" method="post">
            <dl class="form-group">
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" class="form-control" value="<?= h($subject['menu_name']); ?>"/>
                </dd>
            </dl>
            <dl class="form-group">
                <dt>Position</dt>
                <dd>
                    <select name="position" class="form-control">
                        <?php
                        for ($i = 1; $i <= $subject_count; $i++) {
                            echo "<option value=\"{$i}\"";
                            if ($subject["position"] == $i) {
                                echo "selected";
                            }
                            echo ">{$i}</option>";
                        }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl class="form-check form-check-inline">
                <dt class="form-check-label">Visible</dt>
                <dd style="margin-left: 33px; margin-top: 10px">
                    <input type="hidden" name="visible" class="form-check-input" value="0"/>
                    <input type="checkbox" name="visible" class="form-check-input"
                           value="1" <?php if ($subject['visible'] == "1") {
                        echo " checked";
                    } ?>/>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" class="btn btn-danger mb-2" value="Edit Subject"/>
            </div>
        </form>

    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
