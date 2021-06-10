<!-- The head must be removed and replaced with custom data passed via router -->

<body>
    <div class="loginbox login">
        <div class="avatar">
            <img src="./assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Login</h1>
        <?php $form = core\form\Form::begin('', 'POST') ?>
            <?php echo $form->field($data['model'], 'email', 'Email Address')->setField(core\form\Field::TYPE_EMAIL); ?>
            <?php echo $form->field($data['model'], 'password', 'Password')->setField(core\form\Field::TYPE_PASS); ?>
    
            <button type="submit">Login</button>
        <?php core\form\Form::end() ?>

        <a href="/recover">Forgot password</a>
        <a href="/">Don't have an account?</a>
    </div>
</body>

</html>