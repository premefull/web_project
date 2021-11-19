<?php
        session_start();
        include('connectest.php');
        header('Content-Type: application/json');

        $sql = "SELECT * FROM `testcamera2`";
        $_REQUEST = mysqli_query($conn,$sql);

        $data = array();

        foreach($_REQUEST as $row){
            $data[]= $row;
        }

        mysqli_close($conn);
        echo json_encode($data);
?>