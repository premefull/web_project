<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php


require('connect.php');

$roomno =$_REQUEST['R_room_no'];
$width =$_REQUEST['width'];
$height =$_REQUEST['height'];

$sql = "UPDATE room SET  R_width ='$width', R_height ='$height' WHERE R_room_no= ' $roomno '";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
        header("location: insertroom.php");
} else {
        echo "Error : Update";
}


?>