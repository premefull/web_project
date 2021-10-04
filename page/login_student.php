<?php
        session_start();
        include('connect.php');
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
   

    <div class="center">
        <h1>Login Admin
            <Abbr></Abbr>
        </h1>
        <form method="post" action="login_studentdb.php">
        <?php include('errors.php');?>
        <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <h3>
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </h3>
        </div>
        <?php endif ?>
            <div class="txt_field">
                <input type="username" name="username" required>
                <span></span>
                <label>ID Student</label>
                
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <!--<div class="pass">Forgot Password?</div><input type="submit" value="Login"> -->
            <button type="submit" name="login_student" herf="page.html">login</button>
            <div class="signup_link">
                Not a member? <a href="signup_admin.html">Signup</a>
                <br>
                <a href="#">Back</a>
            </div>
        </form>
    </div>

</body>

</html>