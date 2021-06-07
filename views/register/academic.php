
<body>
    <div class="loginbox register">
        <div class="avatar">
            <img src="<?=$data["relPath"]?>/assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Create Academic account</h1>
        <form action="/nothing.js" target="blank">
            
            <input type="text" name="FirstName" placeholder="First name" required>
            <input type="text" name="MidName" placeholder="Middle name ">
            <input type="text" name="LastName" placeholder="Last name" required>
            <input type="email" name="Email" placeholder="Email address" required>
            <input type="password" name="Password" placeholder="Enter password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
            <input type="password" name="Password2" placeholder="Enter password again" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
            <button type="submit">Register</button>
            <a href="../login">Already have an account?</a>
        </form>

    </div>

</body>


</html>