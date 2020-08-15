<?php include('user_controller.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Voody - Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" class="form col-md-6 col-sm-10" action="login.php">
        <?php  if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php  endif ?>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" >
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password">
        </div>
        <div class="input-group">
            <button class="btn btn-primary" type="submit" name="login_user">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
</div>

</body>
</html>