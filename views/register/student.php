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

        <h1>Create Student account</h1>
        <?php $form = core\form\Form::begin('', 'POST') ?>
        <?php echo new TextField($data['model'], 'firstName', 'First Name'); ?>
        <?php echo new TextField($data['model'], 'middleName', 'Middle Name'); ?>
        <?php echo new TextField($data['model'], 'lastName', 'Last Name'); ?>
        <?php echo new EmailField($data['model'], 'email', 'Email Address'); ?>
        <?php echo new PasswordField($data['model'], 'password', 'Password'); ?>
        <?php echo new PasswordField($data['model'], 'confirmPassword', 'Confirm Password'); ?>
        <?php echo new CheckboxField($data['model'], 'agreeTOS', 'Agree to Terms of Service'); ?>

        <?php echo new HiddenField($data['model'], 'accountType', 'student'); ?>

        <button type="submit">Register</button>
        <a href="../login">Already have an account?</a>
        <p><a href="./academic">Create Academic account?</a></p>
        <?php core\form\Form::end() ?>

        <!-- <form action="" method="POST">
            <div class="form-group">
            <input type="text" name="firstName" placeholder="First name" >
            <div class="invalid-feedback"> 
            <!-- <p>There was an error</p> 
            </div>
            </div>
            <div class="form-group">
            <input type="text" name="middleName" placeholder="Middle name (Optional)">
            <div class="invalid-feedback"> 
            <p>There was an error</p>
            </div>
            </div>
            <div class="form-group">
            <input type="text" name="lastName" placeholder="Last name" >
            <div class="invalid-feedback"> 
            <p>There was an error</p>
            </div>
            </div>
            <div class="form-group">
            <input type="email" name="email" placeholder="Email address" >
            <div class="invalid-feedback"> 
            <p>There was an error</p>
            </div>
            </div>
            <div class="form-group">
            <input type="password" name="password" placeholder="Enter password" test patterns="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"  >
            <div class="invalid-feedback"> 
            <!-- <p>There was an error</p> 
            </div>
            </div>
            <div class="form-group">
            <input type="password" name="confirmPassword" placeholder="Enter password again"  patterns="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$">
            <div class="invalid-feedback"> 
            <!-- <p>There was an error</p> 
            </div>
            <div class="form-group">

            </div>
            </div>
            <button type="submit">Register</button>
            <a href="../login">Already have an account?</a>
        </form> -->

    </div>

</body>


</html>