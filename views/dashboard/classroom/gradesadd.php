<!-- Dashboard Content  -->
<?php

use fields\TextField;
use fields\NumberField;
use fields\TextareaField;
use fields\SelectField;

?>

<div class="main-content">

    <section class="create-classroom">
        <div class="section-header">
            <h2>Add Grade</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <fieldset>
                <legend><span class="number">1</span> Student Information</legend>
                <?php $selectField = new SelectField($data['grade'], 'userId', 'Select Student*', 'disabled selected');
                $selectField->setOptions(
                    $data['usersIds'],
                    $data['usersNames'],
                    $data['usersAttributes']
                );
                echo $selectField ?>

            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Review</legend>
                <?php echo new NumberField($data['grade'], 'grade', 'Grade', 'min=0') ?>
                <?php $selectField = new SelectField($data['grade'], 'type', 'Grade Type*', 'disabled selected');
                $selectField->setOptions(
                    ['type', 'Assignment', 'Homework', 'PartProject', 'FinalProject', 'Test', 'Exam', 'Listening'],
                    ['Grade Type*', 'Assignment', 'Homework', 'Partial Project', 'Final Project', 'Test', 'Exam', 'Listening'],
                    ['disabled selected', '', '', '', '', '', '', '']
                );
                echo $selectField ?>
                <?php echo new TextareaField($data['grade'], 'detail', 'Grade Details*', 'rows="4"'); ?>
            </fieldset>
            <button type="submit">Give Grade</button>
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