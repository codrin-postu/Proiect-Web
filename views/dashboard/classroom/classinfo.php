<!-- Dashboard Content  -->
<div class="main-content">

    <section class="class-banner">
        <h2><?php echo $data['model']->name ?></h2>
        <p><?php echo $data['model']->subtitle ?></p>
    </section>
    <section class="class-desc width-half-L">
        <div class="section-header">
            <h2>Class Description</h2>
            <!-- <i class="fas fa-pencil-ruler prof-edit"><span class="tooltiptext">Edit this section</span></i> -->
        </div>
        <div class="section-content">
            <p><?php echo $data['model']->description ?> </p>
        </div>
    </section>

    <section class="class-information width-third-L ">
        <div class="section-header">
            <h2>Class Information</h2>
            <!-- <i class="fas fa-pencil-ruler prof-edit"><span class="tooltiptext">Edit this section</span></i> -->
        </div>
        <div class="section-content">
            <table>
                <tr>
                    <td>
                        <p><i class="far fa-calendar-check"></i> Duration</p>
                    </td>
                    <td><?php echo $data['model']->duration ?></td>
                </tr>
                <tr>
                    <td>
                        <p><i class="far fa-clock"></i> Time Commitment</p>
                    </td>
                    <td><?php echo $data['model']->commitment ?></td>
                </tr>
                <tr>
                    <td>
                        <p><i class="far fa-bell"></i> Classes</p>
                    </td>
                    <td><?php echo $data['model']->classCount ?></td>
                </tr>
                <tr>
                    <td>
                        <p><i class="fas fa-book"></i> Subject</p>
                    </td>
                    <td><?php echo $data['model']->subject ?></td>
                </tr>
                <tr>
                    <td>
                        <p><i class="fas fa-tasks"></i> Evaluation</p>
                    </td>
                    <td><?php echo $data['model']->evaluation ?></td>
                </tr>
                <tr>
                    <td>
                        <p><i class="fas fa-signal"></i> Difficulty</p>
                    </td>
                    <td><?php echo $data['model']->difficulty ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><i class="fas fa-pencil-alt"></i> Prerequisites</p>
                    </td>
                    <td><?php echo $data['model']->prerequisites ?></td>
                </tr>
                <tr>
                    <td>
                        <p><i class="fas fa-university"></i> Credits</p>
                    </td>
                    <td><?php echo ($data['model']->credits ?? "None") ?></td>
                <tr>
                    <td>
                        <p><i class="fas fa-list-ul"></i> Topics</p>
                    </td>
                    <td><?php echo $data['model']->topics ?></td>
                </tr>
                </tr>
            </table>

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