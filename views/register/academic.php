<?php

use fields\EmailField;
use fields\PasswordField;
use fields\TextField;
use fields\CheckboxField;
use fields\HiddenField;

?>

<body>
    <div class="loginbox register">
        <div class="avatar">
            <img src="<?= $data["relPath"] ?>/assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Create Academic account</h1>
        <?php $form = core\form\Form::begin('', 'POST') ?>
        <?php echo new TextField($data['model'], 'firstName', 'First Name'); ?>
        <?php echo new TextField($data['model'], 'middleName', 'Middle Name'); ?>
        <?php echo new TextField($data['model'], 'lastName', 'Last Name'); ?>
        <?php echo new EmailField($data['model'], 'email', 'Email Address'); ?>
        <?php echo new PasswordField($data['model'], 'password', 'Password'); ?>
        <?php echo new PasswordField($data['model'], 'confirmPassword', 'Confirm Password'); ?>
        <?php echo new CheckboxField($data['model'], 'agreeTOS', 'Agree to Terms of Service'); ?>

        <?php echo new HiddenField($data['model'], 'accountType', 'academic'); ?>

        <button type="submit">Register</button>
        <a href="../login">Already have an account?</a>
        <p><a href="./student">Create Student account?</a></p>
        <?php core\form\Form::end() ?>

    </div>

</body>


</html>