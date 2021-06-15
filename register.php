<?php
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style3.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container-login">
        <div class="header-login">
            <div class="header-login-box">
                <span class="header-text-position">
                    <a href="login.php">&nbsp;<i class="fa fa-user-plus"></i>&nbsp;&nbsp;Login</a>
                </span>
                <a href="forgotpassword.php"><i class="fa fa-question"></i>&nbsp;&nbsp;Forgot Password?</a>
            </div>
        </div>
        <form method="POST" action="login.php" class="mt-5">

            <div class="login-box mt-5">
                <div class="login">
                    <h1>PROPERTY MANAGEMENT - REGISTER</h1>
                    <input id="username" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" />
                    <label for="username" class="login-input-icon">
                        <i class="fa fa-user"></i>
                    </label>

                    <input id="email" type="text" placeholder="Email" name="email" value="<?php echo $email; ?>"/>
                    <label for="email" class="login-input-icon">
                        <i class="fa fa-envelope"></i>
                    </label>
                    <input id="password" type="password" placeholder="Password" name="password_1" />
                    <label for="password" class="login-input-icon">
                        <i class="fa fa-lock"></i>
                    </label>
                    <input id="password" type="password" placeholder="Confirm Password" name="password_2" />
                    <label for="password" class="login-input-icon">
                        <i class="fa fa-lock"></i>
                    </label>
                    <label class="login-checkbox">
                        <input type="checkbox">
                        <span class="checkmark"></span>&nbsp;&nbsp;I Agree terms and condition
                    </label>
                    <button type="submit" name="reg_user">Register</button>
                    <span class="login-separator"></span>
                </div>
            </div>
        </form>
    </div>
</body>

<script>
    function login() {
        document.getElementById('new').id = 'vbv';
        document.getElementById('form').style.display = 'flex';
        document.getElementById('jjjj').id = 'bbb';
    }
</script>

</html>




<?php




?>