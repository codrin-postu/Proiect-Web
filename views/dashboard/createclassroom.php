
    <!-- Dashboard Content  -->
    <div class="main-content">

        <section class="join-classroom create-classroom">
            <div class="section-header">
                <h2>Create a Classroom</h2>
            </div>
            <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST') ?>
            <?php echo $form->field($data['model'], 'name', 'Class Name'); ?>
            <?php echo $form->field($data['model'], 'description', 'Class Description'); ?>
            <?php echo $form->field($data['model'], 'subject', 'Class Subject'); ?>
            <?php echo $form->field($data['model'], 'duration', 'Duration'); ?>
            <?php echo $form->field($data['model'], 'commitment', 'Weekly student commitment'); ?>
            <?php echo $form->field($data['model'], 'classCount', 'How many classes/Period(Week/Month)'); ?>
            <?php echo $form->field($data['model'], 'evaluation', 'Evaluation'); ?>
            <?php echo $form->field($data['model'], 'difficulty', 'Class Difficulty'); ?>
            <?php echo $form->field($data['model'], 'prerequisites', 'Prerequisites'); ?>
            <?php echo $form->field($data['model'], 'credits', 'University Credits'); ?>
            <?php echo $form->field($data['model'], 'topics', 'Topics to be discussed'); ?>

            <button type="submit">Create Classroom</button>
            <?php core\form\Form::end() ?>
            </div>
        </section>

    </div>

    <!-- JS Scripts -->
    <script>document.body.classList.remove('stop-transition-load')</script>
    <script src="/assets/scripts/dashboard-sidemenu.js"></script>
    <script src="/assets/scripts/dashboard-input.js"></script>
</body>

</html>