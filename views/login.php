<!-- The head must be removed and replaced with custom data passed via router -->
<?php

use fields\EmailField;
use fields\PasswordField;

?>

<body>
    <div class="loginbox login">
        <div class="avatar">
            <img src="./assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Login</h1>
        <?php $form = core\form\Form::begin('', 'POST') ?>
        <?php echo new EmailField($data['model'], 'email', 'Email Address'); ?>
        <?php echo new PasswordField($data['model'], 'password', 'Password'); ?>

        <button type="submit">Login</button>
        <?php core\form\Form::end() ?>

        <a href="/recover">Forgot password</a>
        <a href="/">Don't have an account?</a>
    </div>
</body>

</html>