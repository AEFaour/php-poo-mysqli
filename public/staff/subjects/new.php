<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    $subject = [];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('subjects/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }

} else {

}

$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set) + 1;
mysqli_free_result($subject_set);
$subject = [];
$subject["position"] = $subject_count;
?>

<?php $page_title = 'Create Subject'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" style="min-height: 500px; padding: 0 30px;">

    <a class="back-link" href="<?= url_for('subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new card">
        <h1>Create Subject</h1>

        <?= display_errors($errors); ?>
        <form action="<?= url_for('subjects/new.php'); ?>" method="post">
            <dl class="form-group">
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" class="form-control" value=""/></dd>
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
                    <input type="checkbox" name="visible" class="form-check-input" value="1"/>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" class="btn btn-danger mb-2" value="Create Subject"/>
            </div>
        </form>

    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
