<?php 
    session_start();
    include('connect.php');
    $errors =array();

    if(isset($_POST['addclassroom'])){
        $R_room = mysqli_real_escape_string($conn,$_POST['numberroom']);
        $R_building = mysqli_real_escape_string($conn,$_POST['numberbuilding']);
        $R_floor = mysqli_real_escape_string($conn,$_POST['numberfloor']);
        $R_width = mysqli_real_escape_string($conn,$_POST['width']);
        $R_height = mysqli_real_escape_string($conn,$_POST['height']);
        
            
        $sql = "INSERT INTO room(R_room_no,R_building_no,R_floor,R_width,R_height) VALUES ('$R_room','$R_building','$R_floor','$R_width','$R_height')";
        $result1 =mysqli_query($conn,$sql);
        header("location: insertroom.php");

    }

?>