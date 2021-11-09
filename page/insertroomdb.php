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
        

 
            $A = $R_width * $R_height;
            $T = ($A * 30)/100;
            $R_max = $A - $T;

        $sql = "INSERT INTO room(R_room_no,R_building_no,R_floor,R_width,R_height,R_max_int) VALUES ('$R_room','$R_building','$R_floor','$R_width','$R_height','$R_max')";
        $result1 =mysqli_query($conn,$sql);
        
        header("location: insertroom.php");

               
        
    
    }

?>