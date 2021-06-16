<!-- Dashboard Content  -->
<div class="main-content">

    <section class="create-classroom">
        <div class="section-header">
            <h2>Create a Classroom</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <fieldset>
                <legend><span class="number">1</span> Basic Class Information</legend>
                <?php echo $form->field($data['model'], 'name', 'Class Name*'); ?>
                <?php echo $form->field($data['model'], 'subject', 'Class Subject*'); ?>
                <?php echo $form->field($data['model'], 'duration', 'Duration (eg. 16 Weeks)*'); ?>
            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Class Description</legend>
                <?php echo $form->field($data['model'], 'description', 'Class Description*')->setField('textarea'); ?>
            </fieldset>
            <fieldset>
                <legend><span class="number">3</span> Class Details</legend>
                <?php echo $form->field($data['model'], 'commitment', 'Weekly student commitment*'); ?>
                <div class="row">
                    <?php echo $form->field($data['model'], 'classCount', 'No. Classes*', 'class="row-50" min="0" max="21"')->setField('number'); ?>
                    <?php echo $form->field($data['model'], 'disabled', '/ Week', 'class="row-50" readonly'); ?>
                </div>
                <?php echo $form->field($data['model'], 'evaluation', 'Evaluation*'); ?>
                <?php echo $form->field($data['model'], 'difficulty', 'Class Difficulty*'); ?>
                <?php echo $form->field($data['model'], 'prerequisites', 'Prerequisites*'); ?>
                <?php echo $form->field($data['model'], 'credits', 'University Credits'); ?>
                <?php echo $form->field($data['model'], 'topics', 'Topics to be discussed*'); ?>
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