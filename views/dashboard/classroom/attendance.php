<!-- Dashboard Content  -->
<?php

use fields\TextField;
use fields\SelectField;
?>
<div class="main-content">

    <section class="check-attendance">
        <div class="section-header">
            <h2>Generate attendance code</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <fieldset>
                <div class="row">
                    <?php echo new TextField($data['model'], 'code', 'Generate Code', 'disabled', 'row-70'); ?>
                    <?php $selectField = new SelectField($data['model'], 'duration', 'Choose Code Duration', 'disabled selected', 'row-30');
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

    <section class="attendance-history">
        <div class="section-header">
            <h2>Your Attendance History</h2>
        </div>
        <div class="section-content">
            <div class="class-date">
                <p>04/03</p>
                <p class="attendance-status attended">Present</p>
            </div>
            <div class="class-date">
                <p>08/03</p>
                <p class="attendance-status attended">Present</p>
            </div>
            <div class="class-date">
                <p>12/03</p>
                <p class="attendance-status">Absent</p>
            </div>
            <div class="class-date">
                <p>16/03</p>
                <p class="attendance-status attended">Present</p>
            </div>
            <div class="class-date">
                <p>20/03</p>
                <p class="attendance-status attended">Present</p>
            </div>
            <div class="class-date">
                <p>24/03</p>
                <p class="attendance-status">Absent</p>
            </div>
            <div class="class-date">
                <p>28/03</p>
                <p class="attendance-status attended">Present</p>
            </div>
            <div class="class-date">
                <p>04/04</p>
                <p class="attendance-status">Absent</p>
            </div>
            <div class="class-date">
                <p>08/04</p>
                <p class="attendance-status attended">Present</p>
            </div>

        </div>
    </section>

    <section class="attendance-percentage width-half-L width-half-M">
        <div class="section-header">
            <h2>Attendance Percentage</h2>
        </div>
        <div class="section-content">

        </div>
    </section>

    <section class="attendance-information width-half-L width-half-M">
        <div class="section-header">
            <h2>Attendance Information</h2>
        </div>
        <div class="section-content">

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