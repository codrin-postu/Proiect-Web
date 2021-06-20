<!-- Dashboard Content  -->
<div class="main-content">

    <section class="homework-detail">
        <div class="section-header">
            <h2><?php echo $data['lesson']->title ?></h2>
        </div>
        <div class="section-content">
            <div class="homework-text">
                <?php echo $data['lesson']->content ?>
            </div>
            <div class="homework-status">
                <div class="status-info">
                    <h3>Lesson Posted </h3>
                    <p><?php echo date('M d, Y', strtotime($data['lesson']->created_at)) ?></p>
                </div>
                <?php if ($data['userClassroom']->isCreator()) : ?>
                    <div class="upload-info">
                        <h3>Manage Lesson</h3>
                        <?php $form = core\form\Form::begin('', 'POST') ?>
                        <button type="submit">Delete Lesson</button>
                        <?php core\form\Form::end() ?>
                    </div>
                <?php endif; ?>


            </div>
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