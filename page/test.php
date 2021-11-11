<?php
    include('connect.php');
    if(isset($_POST['function']) && $_POST['function'] == 'showEditUser') {
    $R_room_no  = $_POST['roomNo'];
    $sql = "SELECT * FROM room WHERE R_room_no = '$R_room_no';";
    $objQuery = mysqli_query($conn, $sql) ;

    while($room = mysqli_fetch_array($objQuery)){
        echo'
        <form class="" method="post" action="editdatadb.php" enctype="multipart/form-data">
            <div class="container">
                <label><b>เลขที่ห้องเรียน</b></label>
                <input placeholder="เช่น 618/1 ให้ใส่ 6181" type="text" name="R_room_no" pattern="[0-9]{1,}"
                    value='.$room['R_room_no'].'>
                <label><b>เลขที่อาคาร/ตึก</b></label>
                <input type="text" name="R_building_no" value='.$room['R_building_no'].'>

                <label><b>ชั้น</b></label>
                <input type="text" name="R_floor" value='.$room['R_floor'].'>

                <label><b>ความกว้างของห้องเรียน(โดยประมาณ)</b></label>
                <input type="text" name="R_width" value='.$room['R_width'].'>

                <label><b>ความยาวของห้องเรียน(โดยประมาณ)</b></label>
                <input type="text" name="R_height" value='.$room['R_height'].'>
                <br>
                <button type="submit" value="save">บันทึก</button>
            </div>
        </form> ';
        }
    }   

?>