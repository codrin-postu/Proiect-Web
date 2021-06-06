<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A class manager to help you stay connected and up to date with your classes!">
    <meta name="author" content="Created by Vlad Ghiorghita, Victor Rosca and Codrin Postu">

    <link rel="shortcut icon" href="<?=ASSETS?>/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/86fe649324.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="<?=ASSETS?>/styles/register.css">

    <title>Register | Create an Academic account</title>
</head>

<body>
    <div class="loginbox register">
        <div class="avatar">
            <img src="<?=ASSETS?>/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
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
            <a href="login.html">Already have an account?</a>
        </form>

    </div>

</body>


</html>