<body>
    <div class="loginbox register">
        <div class="avatar">
            <img src="<?=$data["relPath"]?>/assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Create Academic account</h1>
        <?php $form = core\form\Form::begin('', 'POST') ?>
            <?php echo $form->field($data['model'], 'firstName', 'First Name'); ?>
            <?php echo $form->field($data['model'], 'middleName', 'Middle Name'); ?>
            <?php echo $form->field($data['model'], 'lastName', 'Last Name'); ?>
            <?php echo $form->field($data['model'], 'email', 'Email Address')->setField(core\form\Field::TYPE_EMAIL); ?>
            <?php echo $form->field($data['model'], 'password', 'Password')->setField(core\form\Field::TYPE_PASS); ?>
            <?php echo $form->field($data['model'], 'confirmPassword','Confirm Password')->setField(core\form\Field::TYPE_PASS); ?>
            <?php echo $form->field($data['model'], 'agreeTOS', 'Agree to Terms of Service')->setField(\core\form\Field::TYPE_CHECKBOX); ?>
    
            <?php echo $form->field($data['model'], 'accountType', 'academic')->setField(\core\form\Field::TYPE_HIDDEN); ?>
            
            <button type="submit">Register</button>
            <a href="../login">Already have an account?</a>
            <p><a href="./student">Create Student account?</a></p>
        <?php core\form\Form::end() ?>

    </div>

</body>


</html>