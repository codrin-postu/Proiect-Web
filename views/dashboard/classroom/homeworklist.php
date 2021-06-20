<?php

use models\HomeworkModel;
use controllers\generate\HomeworksTable;

?>
<!-- Dashboard Content  -->
<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Homework Added succesfully</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="homework-list special-table">
        <div class="section-header">
            <h2>Homework List</h2>
            <?php if ($data['userClassroom']->isCreator()) : ?>
                <p><a href="/dashboard/classroom/<?php echo $data['classroom']->id ?>/homework/create">Add new homework</a></p>
            <?php endif; ?>
        </div>
        <div class="section-content">
            <?php echo HomeworksTable::load($data['userClassroom']) ?>
        </div>
    </section>

</div>

<!-- JS Scripts -->
<script>
    document.body.classList.remove('stop-transition-load')
</script>
<script src="/assets/scripts/dashboard-sidemenu.js"></script>
</body>

</html>