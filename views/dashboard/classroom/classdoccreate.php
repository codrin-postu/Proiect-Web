<!-- Dashboard Content  -->
<?php

use fields\TextField;
use fields\NumberField;
use fields\SelectField;
use fields\TextareaField;

?>

<div class="main-content">
    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Lesson Added succesfully</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>
    <section class="create-classroom">
        <div class="section-header">
            <h2>Add a Lesson</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <fieldset>
                <legend><span class="number">1</span> Lesson Information</legend>
                <?php echo new NumberField($data['lesson'], 'number', 'Lesson Number*', 'min=0 max=999'); ?>
                <?php echo new TextField($data['lesson'], 'title', 'Lesson Title*'); ?>
            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Lesson Content</legend>
                <?php echo new TextareaField($data['lesson'], 'content', 'Lesson Content*', 'row="6"'); ?>
            </fieldset>

            <button type="submit">Add Lesson</button>
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