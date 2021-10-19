<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php


require('connect.php');

$idstudent =$_REQUEST['S_id'];
$username   = $_REQUEST['S_name'];
$surname    = $_REQUEST['S_surname'];
$S_image    = $_REQUEST['S_image'];

$sql = "UPDATE student SET S_id = ' $idstuden', S_name = '$username' ,S_surname='$surname' ,S_image ='$S_image' ";

$qyuer = mysqli_query($conn, $sql);

if ( $qyuer) {
	
	header("location: store.php");
} else {
	echo "Error : Update";
}

?>