<!-- Dashboard Content  -->
<?php

use controllers\generate\AttendedTable;
use core\Application;
use controllers\generate\LessonTable;
?>

<div class="main-content">

    <section class="class-documentation special-table">
        <div class="section-header">
            <h2>Attendance List - <?= $data['code']->code ?></h2>
        </div>
        <div class="section-content">
            <?php echo AttendedTable::load($data) ?>
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