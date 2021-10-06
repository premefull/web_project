<?php
    session_start();
    include('connect.php');
    $errors = array();

    if(isset($_POST['signup_admin'])){
        $idmin = mysqli_real_escape_string($conn , $_POST['id_admin']);
        $username = mysqli_real_escape_string($conn , $_POST['username_admin']);
        $surname = mysqli_real_escape_string($conn , $_POST['surname_admin']);
        $password = mysqli_real_escape_string($conn , $_POST['password_admin']);
        $email = mysqli_real_escape_string($conn , $_POST['email_admin']);
       

    
        $user_check_query ="SELECT * FROM  admin  WhERE A_id = '$idmin' OR A_name= '$username' ";
        $query = mysqli_query($conn , $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['A_id'] == $idmin){
                array_push($errors,"ID already exists");
            }
            if($result['A_name'] == $username){
                array_push($errors,"Admin name already exists");
            }

        }
        if(count($errors)==0){
            
            $sql = "INSERT INTO admin(A_id,A_name,A_surname,A_password,A_email) VALUES ('$idmin','$username','$surname','$password','$email')";
            mysqli_query($conn,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['surname'] = $surname;
            $_SESSION['success'] = "You are now logged in";
            header('Location: login_admin.php');
        }
        else{
            array_push($errors,"Wrong username/password combination");
            $_SESSION['error'] = "Username or password is exits";
            header("location: signup_admindb.php");
        }
    }
?>