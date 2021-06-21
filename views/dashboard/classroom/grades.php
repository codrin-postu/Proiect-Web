<!-- Dashboard Content  -->
<?php

use controllers\generate\GradesTable;
use fields\TextField;
use fields\NumberField;
use models\GradeModel;

?>

<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Grades Update</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="grade-history special-table">
        <div class="section-header">
            <h2>Grades Information</h2>
            <?php if ($data['userClassroom']->isCreator()) : ?>
                <p><a href="/dashboard/classroom/<?php echo $data['classroom']->id ?>/grades/add">Add new grade</a></p>
            <?php endif; ?>
        </div>
        <div class="section-content">
            <?php if ($data['userClassroom']->isStudent()) : ?>
                <?php echo GradesTable::loadStudent() ?>
            <?php else : ?>
                <?php echo GradesTable::loadAcademic() ?>
            <?php endif; ?>
        </div>
    </section>


    <?php if ($data['userClassroom']->isStudent()) : ?>
        <section class="final-grade ">
            <div class="section-header">
                <h2>Final Grade</h2>
            </div>
            <div class="section-content">
                <p class="success">
                    <?php
                    $finalGrade = (new GradeModel())->findOne([
                        'classroomId' => $data['classroom']->id,
                        'userId' => $data['userClassroom']->userId,
                        'type' => 'FinalGrade'
                    ]);
                    if ($finalGrade) {
                        echo $finalGrade->grade;
                    } else {
                        echo "Not yet calculated!";
                    }
                    ?>
                </p>
            </div>
        </section>
    <?php else : ?>
        <section class="final-grade ">
            <div class="section-header">
                <h2>Final Grade Equation</h2>
            </div>
            <div class="section-content">
                <?php $form = core\form\Form::begin('', 'POST') ?>
                <fieldset>
                    <legend><span class="number">1</span> Number of Grades all Students have</legend>
                    <?php echo new NumberField($data['equation'], 'gradeCount', 'Grades Number'); ?>
                </fieldset>
                <fieldset>
                    <legend><span class="number">2</span>Final Grade Equation</legend>
                    <?php echo new TextField($data['equation'], 'equation', 'Equation (Eg: : (grade1 + grade2) / 2'); ?>

                </fieldset>
                <button type="submit">Add Classroom</button>
                <?php core\form\Form::end() ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<!-- JS Scripts -->
<script>
    document.body.classList.remove('stop-transition-load')
</script>
<script src="/assets/scripts/dashboard-sidemenu.js"></script>
</body>

</html>