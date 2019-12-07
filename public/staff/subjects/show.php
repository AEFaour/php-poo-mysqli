<?php require_once('../../../private/initialize.php'); ?>
<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$subject = find_subject_by_id($id);
?>

<?php $page_title = 'Show Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject show">

        <h1 class="text-center">Subject: <?php echo h($subject['menu_name']); ?></h1>

        <div class="attributes card">
            <dl>
                <dt class="p-3 mb-2 bg-danger text-white text-center">Menu Name</dt>
                <dd class="text-dark text-center"><?php echo h($subject['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt class="p-3 mb-2 bg-danger text-white text-center">Position</dt>
                <dd class="text-dark text-center"><?php echo h($subject['position']); ?></dd>
            </dl>
            <dl>
                <dt class="p-3 mb-2 bg-danger text-white text-center">Visible</dt>
                <dd class="text-dark text-center"><?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
            </dl>
        </div>


    </div>

</div>
