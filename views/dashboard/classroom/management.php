<!-- Dashboard Content  -->
<?php

use core\Application;
use controllers\generate\StudentTable;
?>

<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Catalogue Update</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="class-documentation special-table">
        <div class="section-header">
            <h2>Class Students</h2>
            <?php if ($data['userClassroom']->isCreator()) : ?>
                <?php $form = core\form\Form::begin('', 'POST') ?>
                <button type="submit">Download CSV Catalogue</button>
                <?php core\form\Form::end() ?>
            <?php endif; ?>
        </div>
        <div class="section-content">
            <?php echo StudentTable::loadStudents() ?>
        </div>
    </section>

    <section class="class-documentation special-table">
        <div class="section-header">
            <h2>Join Requests</h2>
        </div>
        <div class="section-content">
            <?php echo StudentTable::loadPending() ?>
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