<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A class manager to help you stay connected and up to date with your classes!">
    <meta name="author" content="Created by Vlad Ghiorghita, Victor Rosca and Codrin Postu">

    

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/86fe649324.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="<?=ASSETS?>/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?=ASSETS?>/styles/register.css">

    <title>ClassMan | Login </title>
</head>

<body>
    <div class="loginbox login">
        <div class="avatar">
            <img src="<?=ASSETS?>/images/svg/304315.svg" alt="Mango, logo of application ClassMan">
        </div>

        <h1>Login</h1>
        <form action="dashboard-student/welcome.html" target="blank">
            <input type="email" name="Email" placeholder="Email address" required>
            <input type="password" name="Password" placeholder="Enter password" required>

            <button type="submit">Login</button>
        </form>

        <a href="login.html">Forgot password</a>
        <a href="index.html#top">Don't have an account?</a>
    </div>
</body>

</html>