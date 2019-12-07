<?php require_once('../../../private/initialize.php'); ?>

<?php

$subject_set = find_all_subjects();

?>

<?php $page_title = 'Subjects'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content" style="min-height: 500px; padding: 0 30px;">
    <div class="subjects listing card">
        <h1>Subjects</h1>

        <div class="actions card">
            <a class="action" href="<?= url_for('subjects/new.php'); ?>">Create New Subject</a>
        </div>

        <table class="table table-bordered text-center">
            <tr class="bg-danger">
                <th scope="col">ID</th>
                <th scope="col">Position</th>
                <th scope="col">Visible</th>
                <th scope="col">Name</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>

            <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
                <tr>
                    <td scope="row"><?php echo $subject['id']; ?></td>
                    <td scope="row"><?php echo $subject['position']; ?></td>
                    <td scope="row"><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td scope="row"><?php echo $subject['menu_name']; ?></td>
                    <td scope="row"><a class="action"
                                       href="<?= url_for('subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a>
                    </td>
                    <td scope="row"><a class="action"
                                       href="<?= url_for('subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a>
                    </td>
                    <td scope="row"><a class="action"
                                       href="<?= url_for('subjects/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
        <?php

        mysqli_free_result($subject_set);
        ?>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

