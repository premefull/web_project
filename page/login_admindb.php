<?php 
    session_start();
    include('connect.php');
    $errors =array();

    if(isset($_POST['login_admin'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        
        
    

        if(count($errors)==0){
            
            $query = "SELECT * FROM admin WHERE A_name  = '$username' AND A_password ='$password' ";
            $result = mysqli_query($conn , $query);

            if( mysqli_num_rows($result) == 1){
               
                    $_SESSION['username'] = $username ;
                    $_SESSION['success'] = "Your are now logged in";
                   
                   
                    header("location: adminpage1.html");

            }else{
                array_push($errors,"Wrong username/password combination");
                $_SESSION['error'] = "Wrong username or password or try again";
                header("location: login_admin.php");
            }
        }
    }

?>