<?php

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('pages/index.php'));
}
$id = $_GET['id'];


if (is_post_request()) {

    // Handle form values sent by new.php
    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = update_page($page);
    if ($result === true) {
        redirect_to(url_for('pages/show.php?id=' . $id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }
} else {
    $page = find_page_by_id($id);
}

$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set);
mysqli_free_result($page_set);

?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" style="min-height: 500px; padding: 0 30px;">

    <a class="back-link" href="<?= url_for('pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page edit card">
        <h1>Edit Page</h1>

        <?= display_errors($errors); ?>
        <form action="<?= url_for('pages/edit.php?id=' . h(u($id))); ?>" method="post">
            <dl class="form-group">
                <dt>Subject</dt>
                <dd>
                    <select name="subject_id" class="form-control">
                        <?php
                        $subject_set = find_all_subjects();
                        while ($subject = mysqli_fetch_assoc($subject_set)) {
                            echo "<option value=\"" . h($subject['id']) . "\"";
                            if ($page["subject_id"] == $subject['id']) {
                                echo " selected";
                            }
                            echo ">" . h($subject['menu_name']) . "</option>";
                        }
                        mysqli_free_result($subject_set);
                        ?>
                    </select>
                </dd>
            </dl>
            <dl class="form-group">
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" class="form-control" value="<?= h($page['menu_name']); ?>"/>
                </dd>
            </dl>
            <dl class="form-group">
                <dt>Position</dt>
                <dd>
                    <select name="position" class="form-control">
                        <?php
                        for ($i = 1; $i <= $page_count; $i++) {
                            echo "<option value=\"{$i}\"";
                            if ($page["position"] == $i) {
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
                           value="1"<?php if ($page['visible'] == "1") {
                        echo " checked";
                    } ?> />
                </dd>
            </dl>
            <dl class="form-group">
                <dt>Content</dt>
                <dd>
                    <textarea name="content" cols="60" rows="10"
                              class="form-control"><?php echo h($page['content']); ?></textarea>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" class="btn btn-danger mb-2" value="Edit Page"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
