<!-- Dashboard Content  -->
<div class="main-content">

    <section class="homework-detail">
        <div class="section-header">
            <h2><?php

                use fields\FileField;

                echo $data['homework']->title ?></h2>
        </div>
        <div class="section-content">
            <div class="homework-text">
                <?php echo $data['homework']->description ?>
            </div>
            <div class="homework-status">
                <div class="status-info">
                    <h3>Homework Deadline </h3>
                    <p><?php echo date('M d, Y H:i', strtotime($data['homework']->end_date)) ?></p>
                    <h3>Time Left</h3>
                    <p>
                        <?php echo date('d \D\a\y\s H:i \H\o\u\r\s', strtotime($data['homework']->end_date) - time()) ?>
                    </p>
                </div>
                <div class="upload-info">
                    <?php if ($data['userClassroom']->isCreator()) : ?>
                        <h3>Manage Homework</h3>
                        <?php $form = core\form\Form::begin('', 'POST') ?>
                        <button type="submit">Delete</button>
                        <?php core\form\Form::end() ?>
                        <h3>Homeworks Received</h3>
                        <p><a href="/dashboard/classroom/<?= $data['classroom']->id ?>/homework/<?= $data['homework']->id ?>/list">Click here to check</p>
                    <?php elseif ($data['userClassroom']->isStudent()) : ?>
                        <?php $form = core\form\Form::begin('', 'POST') ?>
                        <h3>Upload Homework</h3>
                        <?php echo new FileField($data['userHomework'], 'uploaded_file', 'Upload File', 'accept=".zip"'); ?>
                        <button type="submit">Upload</button>
                        <?php core\form\Form::end() ?>
                        <h3>Homework Status</h3>
                        <p>TODO</p>
                    <?php endif; ?>
                </div>



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