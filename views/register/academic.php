
<body>
    <div class="loginbox register">
        <div class="avatar">
            <img src="<?=$data["relPath"]?>/assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Create Academic account</h1>
        <form action="" method="POST">
            
            <input type="text" name="firstName" placeholder="First name" required>
            <input type="text" name="midName" placeholder="Middle name ">
            <input type="text" name="lastName" placeholder="Last name" required>
            <input type="email" name="email" placeholder="Email address" required>
            <input type="password" name="password" placeholder="Enter password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
            <input type="password" name="confirmPassword" placeholder="Enter password again" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
            <button type="submit">Register</button>
            <a href="../login">Already have an account?</a>
        </form>

    </div>

</body>


</html>