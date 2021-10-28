<?php
    session_start();
    include('connect.php');
    $errors = array();

    if(isset($_POST['signup_student'])){
        $idstudent = mysqli_real_escape_string($conn , $_POST['id_student']);
        $username = mysqli_real_escape_string($conn , $_POST['username_student']);
        $surname = mysqli_real_escape_string($conn , $_POST['surname_stent']);
        $password = mysqli_real_escape_string($conn , $_POST['password_stent']);
       
        //อัพโหลดรูปเข้าไปในไฟล์ฟรอม
        $ext = strrchr($_FILES['S_image']['name'],".");     
        $new_image_name = $username."_".$idstudent.$ext ;
        $image_path = "facedata/";
        $upload_path = $image_path.$new_image_name;
        
        //อัพจากไฟล์ฟรอมขึ้นเว็บ
        move_uploaded_file($_FILES['S_image']['tmp_name'],$upload_path);

       
        //ชื่อภาพใหม่ไปใส่ดาต้าเบสอีกครั้ง
        $S_image = $new_image_name;

        $user_check_query ="SELECT * FROM  student  WhERE S_name = '$username' OR S_id = '$idstudent' ";
        $query = mysqli_query($conn , $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['S_name'] == $username){
                array_push($errors,"User already exists");
            }
            if($result['S_id'] == $idstudent){
                array_push($errors,"id student already exists");
            }

        }
        if(count($errors)==0){
            
            $sql = "INSERT INTO student(S_id,S_name,S_surname,S_image,S_pass) VALUES ('$idstudent','$username','$surname','$S_image','$password')";
            mysqli_query($conn,$sql);

            $_SESSION['name'] = $username;
            $_SESSION['surname'] = $surname;
            $_SESSION['success'] = "You are now logged in";
            header('Location: login_student.php');
        }
        else{
            array_push($errors,"Wrong username/password combination");
            $_SESSION['error'] = "Username or password is exits";
            header("location: signup_student.php");
        }
    }
?>