<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassMan | <?php echo $data['exception']->getCode() ?> </title>
</head>
<body>
    <section>
        <h1><?php echo $data['exception']->getCode() ?> </h1>
        <p><?php echo $data['exception']->getMessage() ?></p>
        <a href="/">Go back</a>
    </section>
</body>
</html>