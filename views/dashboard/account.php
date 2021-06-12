
    <!-- Dashboard Content  -->
    <div class="main-content">

        <section class="edit-account">
            <div class="section-header">
                <h2>Edit your account details</h2>
            </div>
            <div class="section-content">
                <div class="information-change">
                    <h3>General Information</h3>
                    <form action="/nothing.js" target="_blank">

                        <input type="text" name="FirstName" placeholder="First Name" value="John" required>
                        <input type="text" name="MidName" placeholder="Middle Name (If applicable)">
                        <input type="text" name="LastName" placeholder="Last Name" value="Doe" required>
                        <input type="email" name="Email" placeholder="Email address" value="johndoe@email.com" required>
                        <input type="telephone" name="Phone" placeholder="Phone Number" value="">
                        <input type="text" name="Passions" placeholder="Your Passions" value="">
                    </form>
                    <button type="submit">Save</button>
                </div>

                <div class="image-change">
                    <h3>Profile Picture</h3>
                    <img src="../images/png/codrin-img.png" alt="Profile Image">
                    <button type="submit">Upload Image</button>
                </div>


            </div>
        </section>

    </div>

    <!-- JS Scripts -->
    <script>document.body.classList.remove('stop-transition-load')</script>
    <script src="/assets/scripts/dashboard-sidemenu.js"></script>
</body>

</html>