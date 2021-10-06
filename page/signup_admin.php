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
        <h1>Signup Admin
            <Abbr></Abbr>
        </h1>
        <form method="post" action="signup_admindb.php">
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
                <input type="Employee_id" name = "id_admin" required>
                <span></span>
                <label>Employee_id</label>
            </div>
            <div class="txt_field">
                <input type="username" name = "username_admin" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="surname" name = "surname_admin" required>
                <span></span>
                <label>Surname</label>
            </div>
            <div class="txt_field">
                <input type="password" name ="password_admin" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="Email" name ="email_admin" required>
                <span></span>
                <label>Email</label>
            </div>
            <!--<div class="pass">Forgot Password?</div> -->
            <button type="submit" name="signup_admin" herf="login_admin.php">login</button>

            <div class="signup_link">
                <a href="login_admin.php">Back</a>
            </div>
        </form>
    </div>

</body>

</html>