
    <!-- Dashboard Content  -->
    <div class="main-content">

        <section class="check-attendance">
            <div class="section-header">
                <h2>Insert code given by your professor/teacher</h2>
            </div>
            <div class="section-content">
                <form action="/nothing.js" target="blank">
                    <label for="">
                        <p>Attendance Code</p>
                        <input type="text" name="ClassCode" placeholder="###-###" required>

                    </label>

                    <button type="submit">Send code</button>
                </form>
            </div>
        </section>

        <section class="attendance-history">
            <div class="section-header">
                <h2>Your Attendance History</h2>
            </div>
            <div class="section-content">
                <div class="class-date">
                    <p>04/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>08/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>12/03</p>
                    <p class="attendance-status">Absent</p>
                </div>
                <div class="class-date">
                    <p>16/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>20/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>24/03</p>
                    <p class="attendance-status">Absent</p>
                </div>
                <div class="class-date">
                    <p>28/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>04/04</p>
                    <p class="attendance-status">Absent</p>
                </div>
                <div class="class-date">
                    <p>08/04</p>
                    <p class="attendance-status attended">Present</p>
                </div>

            </div>
        </section>

        <section class="attendance-percentage width-half-L width-half-M">
            <div class="section-header">
                <h2>Attendance Percentage</h2>
            </div>
            <div class="section-content">

            </div>
        </section>

        <section class="attendance-information width-half-L width-half-M">
            <div class="section-header">
                <h2>Attendance Information</h2>
            </div>
            <div class="section-content">

            </div>
        </section>
    </div>

    <!-- JS Scripts -->
    <script>document.body.classList.remove('stop-transition-load')</script>
    <script src="../../scripts/dashboard-sidemenu.js"></script>
</body>

</html>