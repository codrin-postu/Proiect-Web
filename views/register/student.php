
<body>
    <div class="loginbox register">
        <div class="avatar">
            <img src="<?=$data["relPath"]?>/assets/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Create Student account</h1>
        <form action="" method="POST">
            
            <input type="text" name="firstName" placeholder="First name" >
            <input type="text" name="middleName" placeholder="Middle name (Optional)">
            <input type="text" name="lastName" placeholder="Last name" >
            <input type="email" name="email" placeholder="Email address" >
            <input type="password" name="password" placeholder="Enter password"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
            <input type="password" name="confirmPassword" placeholder="Enter password again"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
            <button type="submit">Register</button>
            <a href="../login">Already have an account?</a>
        </form>

    </div>

</body>


</html>