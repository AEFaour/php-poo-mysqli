<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$page = find_page_by_id($id);

?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?= url_for('pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">

      <h1 class="text-center">Page: <?php echo h($page['menu_name']); ?></h1>

      <div class="attributes card">
          <?php $subject = find_subject_by_id($page['subject_id']); ?>
          <dl>
              <dt class="p-3 mb-2 bg-danger text-white text-center">Subject</dt>
              <dd class="text-dark text-center"><?php echo h($subject['menu_name']); ?></dd>
          </dl>
          <dl>
              <dt class="p-3 mb-2 bg-danger text-white text-center">Menu Name</dt>
              <dd class="text-dark text-center"><?php echo h($page['menu_name']); ?></dd>
          </dl>
          <dl>
              <dt class="p-3 mb-2 bg-danger text-white text-center">Subject ID</dt>
              <dd class="text-dark text-center"><?php echo h($page['subject_id']); ?></dd>
          </dl>
          <dl>
              <dt class="p-3 mb-2 bg-danger text-white text-center">Position</dt>
              <dd class="text-dark text-center"><?php echo h($page['position']); ?></dd>
          </dl>
          <dl>
              <dt class="p-3 mb-2 bg-danger text-white text-center">Visible</dt>
              <dd class="text-dark text-center"><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
          </dl>
          <dl>
              <dt class="p-3 mb-2 bg-danger text-white text-center">Content</dt>
              <dd class="text-dark text-center"><?php echo h($page['content']); ?></dd>
          </dl>
      </div>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
