
    <!-- Dashboard Content  -->
    <div class="main-content">

        <section class="welcome-message">
            <div class="section-header">
                <h2>Welcome to ClassMa</h2>
            </div>
            <div class="section-content">
                <?php if (\core\Application::$application->session->getFlash('success')): ?>
                    <?php echo '<p>'.\core\Application::$application->session->getFlash('success').'</p>'; ?>
                <?php endif; ?>  

                <?php if (\core\Application::isGuest()): ?>
                    <p>Hey you are not logged into your account! Please log in at <a href="/login"></a></p>
                <?php else: ?>
                    <p>Welcome <span class="emphasis"><?php echo \core\Application::$application->user->getDisplayName() ?></span></p>
                <p>Use the Sidebar menu to join a Classroom using the
                    <span class="emphasis">Unique Code</span> provided by your Professor or Administrator
                </p>
                <?php endif; ?>
            </div>
        </section>

    </div>

    <!-- JS Scripts -->
    <script>document.body.classList.remove('stop-transition-load')</script>
    <script src="/assets/scripts/dashboard-sidemenu.js"></script>
</body>

</html>