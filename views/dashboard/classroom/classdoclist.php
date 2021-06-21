<!-- Dashboard Content  -->
<?php

use core\Application;
use controllers\generate\LessonTable;
?>

<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Lesson Update</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="class-documentation special-table">
        <div class="section-header">
            <h2>Class Documentation</h2>
            <?php if ($data['userClassroom']->isCreator()) : ?>
                <p><a href="/dashboard/classroom/<?php echo $data['classroom']->id ?>/documentation/create">Add new lesson</a></p>
            <?php endif; ?>
        </div>
        <div class="section-content">
            <?php echo LessonTable::load() ?>
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