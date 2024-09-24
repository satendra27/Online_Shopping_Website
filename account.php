<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./login.php">
</head>
<body class="body">
    <form action="./login.php" method="post" class="login_form">
        <h3>Login Here</h3>

        <label for="username">E-mail:</label>
        <input class="input" type="email" placeholder="Email or Phone" id="username" name="user_email">

        <label for="password">Password</label>
        <input class="input" type="password" placeholder="Password" id="password" name="user_password">
        <a href="#" class="fp">Forgot Password?</a>
        <a href="registration_form.html" class="user">New User?</a>

        <button class="button" name="user_login">Log In</button>
        <div class="social">
          <div class="go"><img src="./google.svg" alt="" class="fglogo"> Google</div>
          <div class="fb"><img src="./facebook.svg" alt=""class="fglogo"> Facebook</div>
        </div>
    </form>
</body>
</html>

