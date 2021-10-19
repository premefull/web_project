<?php
    session_start();
    include('connect.php');
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>  
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #FFCC33;
  color: white; /*แถบเขียวด้านข้าง*/
}

.sidebar a:hover:not(.active) {
  background-color: #555	;
  color: white;   /*เลื่อนแล้วมีสีเทา */
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar">
  <a href="studentpage1.html">Home</a>
  <a class="active" href="#proflie">ประวัติส่วนตัว</a>
  <a href="#everything">ภาพรวมการใช้ห้อง</a>
  <a href="classroomstu.php">ห้องเรียน</a>
</div>

<div class="content">
<?php

    $sql = " SELECT *  FROM student";
    $Query = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
?>

      <?php foreach ($Query as $data){ ?>
      <tr>
          <center><br><h2>ประวัติส่วนตัวนักศึกษา</h2></center>
          <center><br><?php echo "<img src='facedata/".$data["S_image"]."' width='300' >"; ?></center>
          <h3><br>ชื่อ.<?php echo $data["S_name"];?></h3>
          <h3><br>นามสกุล.<?php echo $data["S_surname"];?></h3>
          <h3><br>รหัสนักศึกษา.<?php echo $data["S_id"];?></h3>
          <!-- <h3><br>อีเมลนักศึกษา.<?php echo "s".$data["S_id"]."@email.kmutnb.ac.th";?></h3> -->

      </tr>
      <?php } ?>
</div>

</body>

</html>