<!-- Dashboard Content  -->
<?php

use fields\TextField;
?>

<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Classroom Created succesfully</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="join-classroom">
        <div class="section-header">
            <h2>Join a Classroom</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <form action="/nothing.js" target="blank">
                <?php echo new TextField($data['model'], 'classroomId', 'Enter the 6 digit Classroom code!'); ?>

                <button type="submit">Send Code</button>
                <?php core\form\Form::end() ?>
            </form>
        </div>
    </section>

</div>

<!-- JS Scripts -->
<script>
    document.body.classList.remove('stop-transition-load')
</script>
<script src="/assets/scripts/dashboard-sidemenu.js"></script>
<script src="/assets/scripts/dashboard-input.js"></script>
</body>

</html>