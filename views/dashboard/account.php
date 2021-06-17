<!-- Dashboard Content  -->
<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Account details updated</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="edit-account">
        <div class="section-header">
            <h2>Edit your account details</h2>
        </div>
        <div class="section-content">
            <?php $form = core\form\Form::begin('', 'POST');

            use fields\EmailField;
            use fields\TextField; ?>
            <fieldset>
                <legend><span class="number">1</span> General Account Information</legend>
                <?php echo new TextField($data['model'], 'firstName', 'First Name'); ?>
                <?php echo new TextField($data['model'], 'middleName', 'Middle Name'); ?>
                <?php echo new TextField($data['model'], 'lastName', 'Last Name'); ?>
                <?php echo new EmailField($data['model'], 'email', 'Email Address (Can not be changed)', 'disabled'); ?>
            </fieldset>
            <button type="submit">Save</button>
            <?php core\form\Form::end() ?>
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