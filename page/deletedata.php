<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php

$delete_ID  = $_REQUEST['room'];

require('connect.php');

$sql = " DELETE FROM room WHERE R_room_no = '$delete_ID'";

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
     header("location: insertroom.php");
   
   
} else {
    echo "Error : Delete";
}


?>