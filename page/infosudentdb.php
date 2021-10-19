<?php 
    session_start();
    include('connect.php');
    $errors =array();

    if(isset($_POST['studentinfo'])){
        $idstudent = mysqli_real_escape_string($conn , $_POST['id_student']);
        $username = mysqli_real_escape_string($conn , $_POST['username_student']);
        $surname = mysqli_real_escape_string($conn , $_POST['surname_stent']);
        $password = mysqli_real_escape_string($conn , $_POST['password_stent']);
        $img = mysqli_real_escape_string($conn , $_POST['Image']);

        $sql = "INSERT INTO student(S_id,S_name,S_surname,S_pass,image) VALUES ('$idstudent','$username','$surname','$password','$img')";
        $result1 =mysqli_query($conn,$sql);
        header("location: insertroom.php");

    }

?>