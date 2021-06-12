<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassMan | <?php echo $data['exception']->getCode() ?> </title>
    <link rel="stylesheet" type="text/css" href='/assets/styles/error.css'/>
</head>
<body>
    <section>
        <img src="/assets/images/svg/<?php echo $data['exception']->getCode() ?>.svg" alt="">
        <h1><span class='emphasis'>Oh no!</span> <?php echo $data['exception']->getMessage() ?></h1>
        <p>You may find these links useful:</p>
        <a href="/">Homepage</a>
        <a href="/login">Login</a>
    </section>
</body>
</html>