<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

$Roomno   = $_REQUEST['R_room_no'];
$R_build   = $_REQUEST['R_building_no'];
$R_foor	  = $_REQUEST['R_floor'];
$R_width = $_REQUEST['R_width'];
$R_height = $_REQUEST['R_height'];

$sql = "
UPDATE room
SET R_building_no = '" . $R_build . "',   
R_floor = '" . $R_foor . "', 
R_width = '" . $R_width . "', 
R_height = '" . $R_height . "'
WHERE R_room_no = ".$Roomno.";"; 
	
$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "Record " . $Roomno . " was Updated.";
} else {
	echo "Error : Update";
}
mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>