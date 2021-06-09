
<body>
    <div class="loginbox register">
        <div class="avatar">
            <img src="<?=$data["relPath"]?>/assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Create Student account</h1>
        <?php $form = core\form\Form::begin('', 'POST') ?>
            <?php echo $form->field($data['model'], 'firstName', 'First Name'); ?>
            <?php echo $form->field($data['model'], 'middleName', 'Middle Name'); ?>
            <?php echo $form->field($data['model'], 'lastName', 'Last Name'); ?>
            <?php echo $form->field($data['model'], 'email', 'Email Address')->setField(core\form\Field::TYPE_EMAIL); ?>
            <?php echo $form->field($data['model'], 'password', 'Password')->setField(core\form\Field::TYPE_PASS); ?>
            <?php echo $form->field($data['model'], 'confirmPassword','Confirm Password')->setField(core\form\Field::TYPE_PASS); ?>
            <?php echo $form->field($data['model'], 'agreeTOS', 'Agree to Terms of Service')->setField(\core\form\Field::TYPE_CHECKBOX); ?>
            <?php echo $form->field($data['model'], 'accountType', 'student')->setField(\core\form\Field::TYPE_HIDDEN); ?>
            
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