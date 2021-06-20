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
                <h2>Classroom Created succesfully</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>
    <section class="create-classroom">
        <div class="section-header">
            <h2>Create a Classroom</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <fieldset>
                <legend><span class="number">1</span> Basic Class Information</legend>
                <?php echo new TextField($data['model'], 'name', 'Class Name*'); ?>
                <?php echo new TextField($data['model'], 'subtitle', 'Class Subtitle*') ?>
                <?php echo new TextField($data['model'], 'subject', 'Class Subject*'); ?>
                <?php echo new TextField($data['model'], 'duration', 'Duration (eg. 16 Weeks)*'); ?>
            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Class Description</legend>
                <?php echo new TextareaField($data['model'], 'description', 'Class Description*', 'rows="12"'); ?>
            </fieldset>
            <fieldset>
                <legend><span class="number">3</span> Class Details</legend>
                <?php echo new TextField($data['model'], 'commitment', 'Weekly student commitment*'); ?>
                <div class="row">
                    <?php echo new NumberField($data['model'], 'classCount', 'No. Classes*', 'min="0" max="21"', 'row-30'); ?>
                    <?php echo new TextField($data['model'], 'disabled', '/ Week', 'readonly', 'row-70'); ?>
                </div>
                <?php echo new TextField($data['model'], 'evaluation', 'Evaluation*'); ?>

                <?php $selectField = new SelectField($data['model'], 'difficulty', 'Class Difficulty*', 'disabled selected');
                $selectField->setOptions(
                    ['difficulty', 'Easy', 'Intermediate', 'Difficult'],
                    ['Class Difficulty*', 'Easy', 'Intermediate', 'Difficult'],
                    ['disabled selected', '', '', '']
                );
                echo $selectField ?>

                <?php echo new TextField($data['model'], 'prerequisites', 'Prerequisites*'); ?>
                <?php echo new TextField($data['model'], 'credits', 'University Credits'); ?>
                <?php echo new TextField($data['model'], 'topics', 'Topics to be discussed*'); ?>
            </fieldset>
            <button type="submit">Create Classroom</button>
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