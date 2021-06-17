<!-- Dashboard Content  -->
<div class="main-content">

    <section class="edit-password">
        <div class="section-header">
            <h2>Edit your account details</h2>
        </div>
        <div class="section-content">
            <?php

            use fields\PasswordField;

            $form = core\form\Form::begin('', 'POST') ?>
            <?php echo new PasswordField($data['model'], 'oldPassword', 'Current password'); ?>
            <?php echo new PasswordField($data['model'], 'newPassword', 'New password'); ?>
            <?php echo new PasswordField($data['model'], 'confirmPassword', 'Confirm new password'); ?>

            <button type="submit">Change Password</button>
            <?php core\form\Form::end() ?>
        </div>
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