<?php
    include('connect.php');
    if(isset($_POST['function']) && $_POST['function'] == 'showEditUser') {
        $R_room_no  = $_POST['roomNo'];
        $sql = "SELECT * FROM room WHERE R_room_no = '$R_room_no';";
        $objQuery = mysqli_query($conn, $sql) ;

        while($room = mysqli_fetch_array($objQuery)){
            echo'
                <form action="" method="POST">
                    <div class="container">
                        <label><b>เลขที่ห้องเรียน</b></label>
                        <input disabled placeholder="เช่น 618/1 ให้ใส่ 6181" type="text" id="R_room_no"  name="R_room_no" pattern="[0-9]{1,}"
                            value='.$room['R_room_no'].'>
                        <label><b>เลขที่อาคาร/ตึก</b></label>
                        <input type="text" name="R_building_no" id="R_building_no" value='.$room['R_building_no'].'>

                        <label><b>ชั้น</b></label>
                        <input type="text" name="R_floor" id="R_floor" value='.$room['R_floor'].'>

                        <label><b>ความกว้างของห้องเรียน(โดยประมาณ)</b></label>
                        <input type="text" name="R_width" id="R_width" value='.$room['R_width'].'>

                        <label><b>ความยาวของห้องเรียน(โดยประมาณ)</b></label>
                        <input type="text" name="R_height"id="R_height" value='.$room['R_height'].'>
                        <br>
                    </div>
                </form> 
                <button  onclick="submitEditUser()" >บันทึก</button>
            ';
        }
    }

    if(isset($_POST['function']) && $_POST['function'] == 'submitEditUser') {
        $errors = [];
        $data = [];
        if (empty($_POST['roomNo'])) {
            $errors['roomNo'] = 'roomNo is required.';
        }
        if (empty($_POST['buildingNo'])) {
            $errors['buildingNo'] = 'buildingNo is required.';
        }
        if (empty($_POST['floor'])) {
            $errors['floor'] = 'floor is required.';
        }
        if (empty($_POST['width'])) {
            $errors['width'] = 'width is required.';
        }
        if (empty($_POST['height'])) {
            $errors['height'] = 'height is required.';
        }
        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $roomNo     = $_POST['roomNo'];
            $buildingNo = $_POST['buildingNo'];
            $floor	    = $_POST['floor'];
            $width      = $_POST['width'];
            $height     = $_POST['height'];

            $A = $width * $height;
            $T = ($A * 30)/100;
            $R_max = $A - $T;


            $sql = "UPDATE room SET R_building_no='$buildingNo', R_floor= $floor ,R_width= $width, R_height=$height,R_max_int= $R_max  WHERE R_room_no= $roomNo"; 
            if(mysqli_query($conn, $sql)) {
                $data['success'] = true;
                $data['message'] = 'Success!';
            }else{
                $data['success'] = false;
                $data['errors'] = mysqli_error($conn);
            }
        }
        echo json_encode($data);

    }
?>