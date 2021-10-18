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
        <h1>Signup Student
            <Abbr></Abbr>
        </h1>
        <form method="post" action="signup_studentdb.php" enctype="multipart/form-data">
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
                <input type="Student_id" name = "id_student" required>
                <span></span>
                <label>Student_id</label>
            </div>
            <div class="txt_field">
                <input type="Username" name = "username_student" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="Surname" name = "surname_stent" required>
                <span></span>
                <label>Surname</label>
            </div>
            <div class="txt_field">
                <input type="password" name = "password_stent" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
            <input type="file" name="S_image" />
    
                <span></span>
                <!--label>Image</label-->
            </div>
           
            <!--<div class="pass">Forgot Password?</div> -->
            <button class="button button1" type="submit" name="signup_student" herf="login_student.php">signup</button>

            <div class="signup_link">
                <a href="login_student.php">Back</a>
            </div>
        </form>
    </div>

</body>

</html>