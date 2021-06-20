<!-- Dashboard Content  -->
<?php

use fields\DateTimeField;
use fields\TextareaField;
use fields\TextField;

$minDate = date('Y-m-d\TH:i', time());

?>

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
    <section class="create-classroom">
        <div class="section-header">
            <h2>Add Homework</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <fieldset>
                <legend><span class="number">1</span> Homework Information</legend>
                <?php echo new TextField($data['homework'], 'title', 'Homework Title*'); ?>
                <?php echo new DateTimeField($data['homework'], 'end_date', 'Homework Deadline*', "min=$minDate"); ?>
            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Homework Description</legend>
                <?php echo new TextareaField($data['homework'], 'description', 'Homework Description*', 'row="6"'); ?>
            </fieldset>

            <button type="submit">Add Homework</button>
            <?php core\form\Form::end() ?>
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