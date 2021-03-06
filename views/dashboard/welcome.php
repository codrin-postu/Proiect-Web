<!-- Dashboard Content  -->
<div class="main-content">

    <section class="welcome-message">
        <div class="section-header">
            <h2>Welcome to ClassMa</h2>
        </div>
        <div class="section-content">
            <?php if (\core\Application::$application->session->getFlash('success')) : ?>
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            <?php endif; ?>

            <?php if (!\core\Application::isGuest()) : ?>
                <p>Welcome <span class="emphasis"><?php echo \core\Application::$application->user->getDisplayName() ?></span>.</p>
                <p>Use the Sidebar menu to access all the features.
                </p>
            <?php endif; ?>
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