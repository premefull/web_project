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
    <style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 137px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;

}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;

}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
</style>
    
</head>

<body>
   

    <div class="center">
        <h1>Login Admin
            <Abbr></Abbr>
        </h1>
        <form method="post" action="login_admindb.php">
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
                <label>Username</label>
                
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <!--<div class="pass">Forgot Password?</div><input type="submit" value="Login"> -->
           
            <button class="button button1" type="submit" name="login_admin" herf="page.html">login</button>
            <div class="signup_link">
                Not a member? <a href="signup_admin.php">Signup</a>
                <br>
                <a href="page1.html">Back</a>
            </div>
        </form>
    </div>

</body>

</html>