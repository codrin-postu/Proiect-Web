<!-- Dashboard Content  -->
<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Password updated</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="edit-password">
        <div class="section-header">
            <h2>Security & Privacy</h2>
        </div>
        <div class="section-content">
            <?php

            use fields\PasswordField;

            $form = core\form\Form::begin('', 'POST') ?>
            <fieldset>
                <legend><span class="number">1</span> Change Password</legend>

                <?php echo new PasswordField($data['model'], 'oldPassword', 'Current password'); ?>
                <?php echo new PasswordField($data['model'], 'newPassword', 'New password'); ?>
                <?php echo new PasswordField($data['model'], 'confirmPassword', 'Confirm new password'); ?>
            </fieldset>
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