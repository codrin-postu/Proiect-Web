<?php

use models\HomeworkModel;
use controllers\generate\HomeworksTable;

?>
<!-- Dashboard Content  -->
<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Homework Reviewed</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="homework-list special-table">
        <div class="section-header">
            <h2><?php echo $data['homework']->title ?> - Received</h2>
        </div>
        <div class="section-content">
            <?php echo HomeworksTable::loadReceived($data['userClassroom'], $data['homework']) ?>
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