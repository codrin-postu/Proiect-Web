<!-- Dashboard Content  -->
<?php

use generate\UserAttendanceInformation;
use generate\GeneratedCodesTable;
use fields\TextField;
use fields\SelectField;

?>
<div class="main-content">
    <?php if ($data['userClassroom']->isCreator()) : ?>

        <section class="check-attendance">
            <div class="section-header">
                <h2>Generate attendance code</h2>
            </div>
            <div class="section-content">
                <?php $form = core\form\Form::begin('', 'POST') ?>
                <fieldset>
                    <div class="row">
                        <?php echo new TextField($data['code'], 'code', 'Code', 'disabled', 'row-70'); ?>
                        <?php $selectField = new SelectField($data['code'], 'duration', 'Choose Code Duration', 'disabled selected', 'row-30');
                        $selectField->setOptions(
                            ['5', '10', '15', '30'],
                            ['5 Minutes', '10 Minutes', '15 Minutes', '30 Minutes'],
                            ['', '', '', '']
                        );
                        echo $selectField ?>
                    </div>
                </fieldset>

                <button type="submit">Generate code</button>
                <?php core\form\Form::end() ?>
            </div>
        </section>

        <section class="codes-generated special-table">
            <div class="section-header">
                <h2>Codes Generated</h2>
            </div>

            <!-- TODO: Generate horizontal table -->
            <div class="section-content">
                <?php echo GeneratedCodesTable::load() ?>

            </div>
        </section>

    <?php elseif ($data['userClassroom']->isStudent()) : ?>

        <section class="check-attendance">
            <div class="section-header">
                <h2>Insert attendance code</h2>
            </div>
            <div class="section-content">
                <?php $form = core\form\Form::begin('', 'POST') ?>
                <fieldset>

                    <?php echo new TextField($data['userAttendance'], 'code', 'Code'); ?>

                </fieldset>

                <button type="submit">Send Code</button>
                <?php core\form\Form::end() ?>
            </div>
        </section>

        <section class="attendance-history">
            <div class="section-header">
                <h2>Your Attendance History</h2>
            </div>
            <div class="section-content">
                <?php echo UserAttendanceInformation::loadTable() ?>
            </div>
        </section>

        <section class="attendance-percentage ">
            <div class="section-header">
                <h2>Attendance Percentage</h2>
            </div>
            <div class="section-content">
                <?php echo UserAttendanceInformation::loadDonut() ?>
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