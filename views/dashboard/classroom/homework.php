<!-- Dashboard Content  -->

<?php

use fields\FileField;

$timeLeftformat = '';

$timeLeft = strtotime($data['homework']->end_date) - (time() + 7200);


if ($timeLeft > 0 && $timeLeft < 86400) {
    $timeLeftFormat = date('H\H i\M ', strtotime($data['homework']->end_date) - (time() + 7200));
} elseif ($timeLeft >= 86400) {
    $timeLeftFormat = date('d \D\a\y\s H:i \H\o\u\r\s', strtotime($data['homework']->end_date) - (time() + 7200));
} else {
    $timeLeftFormat = 'Expired';
}

?>

<div class="main-content">

    <?php if (\core\Application::$application->session->getFlash('success')) : ?>
        <section>
            <div class="section-header">
                <h2>Homework Uploaded Succesfully</h2>
            </div>
            <div class="section-content">
                <?php echo '<p>' . \core\Application::$application->session->getFlash('success') . '</p>'; ?>
            </div>


        </section>
    <?php endif; ?>

    <section class="homework-detail">
        <div class="section-header">
            <h2><?php echo $data['homework']->title ?></h2>
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
                        <?php echo $timeLeftFormat ?>
                    </p>
                </div>
                <div class="upload-info">
                    <?php if ($data['userClassroom']->isCreator()) : ?>
                        <h3>Manage Homework</h3>
                        <?php $form = core\form\Form::begin('', 'POST') ?>
                        <button type="submit">Delete</button>
                        <?php core\form\Form::end() ?>
                        <h3>Homeworks Received</h3>
                        <p><a href="/dashboard/classroom/<?= $data['classroom']->id ?>/homework/<?= $data['homework']->id ?>/received">Click here to check</p>
                    <?php elseif ($data['userClassroom']->isStudent()) : ?>
                        <?php if ($data['userHomework']->id) : ?>
                            <h3>Uploaded Homework</h3>
                            <p style="max-width: 25ch; word-wrap: break-word;"><?php echo $data['userHomework']->uploaded_file ?></p>

                            <?php if ($data['userHomework']->gradeId !== 0) : ?>
                                <h3>Homework Status</h3>
                                <p>Sent</p>
                            <?php else : ?>
                                <h3>Homework Status</h3>
                                <p>Reviewed</p>
                                <p></p>
                            <?php endif; ?>

                        <?php else : ?>
                            <?php if ($timeLeftFormat !== 'Expired') : ?>
                                <?php $form = core\form\Form::begin('', 'POST', 'enctype="multipart/form-data"') ?>
                                <h3>Upload Homework</h3>
                                <?php echo new FileField($data['userHomework'], 'uploaded_file', 'Upload File', 'accept=".zip"'); ?>
                                <button type="submit">Upload</button>
                                <?php core\form\Form::end() ?>
                            <?php endif; ?>
                            <h3>Homework Status</h3>
                            <p>Not Uploaded</p>
                        <?php endif; ?>
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