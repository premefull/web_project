<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    body {
        background: linear-gradient(120deg, #2980b9, #8e44ad);
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
        background-color: #173F5F;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
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

        .sidebar a {
            float: left;
        }

        div.content {
            margin-left: 0;
        }
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
        <a href="dachbord.php">ภาพรวมการใช้ห้อง</a>
        <a href="login_student.php">ออกจากระบบ</a>
    </div>

    <div class="content">
        <?php
    $check = $_SESSION['idname'];
    $sql = " SELECT *  FROM student WHERE S_id = '$check' ";
    $Query = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    ?>
        <?php foreach ($Query as $data) { ?>


        <!-- <center><br>
        <h2>ประวัติส่วนตัวนักศึกษา</h2><br>
        
      </center><br>

    <?php }  ?>
    <h3><br>ชื่อ:<?php echo $data["S_name"]; ?></h3>
    <h3><br>นามสกุล:<?php echo $data["S_surname"]; ?></h3>
    <h3><br>รหัสนักศึกษา:<?php echo $data["S_id"]; ?></h3>
    <h3><br>อีเมลนักศึกษา:<?php echo "s" . $data["S_id"] . "@email.kmutnb.ac.th"; ?></h3> -->
        <center>
            <br>
            <h1>ประวัติส่วนตัวนักศึกษา</h1>
            <br>
            <div class="card" style="width: 330px;">

                <center><?php echo "<img src='facedata/" . $data["S_image"] . "'width=300 height=300' >"; ?></center>
                <div class="card-body">
                    <h4>ชื่อ :<?php echo $data["S_name"]; ?></h4>
                    <br>
                    <h4>นามสกุล :<?php echo $data["S_surname"]; ?></h4>
                    <br>
                    <h4>รหัสนักศึกษา :<?php echo $data["S_id"]; ?></h4>
                </div>
                <br>
        </center>
    </div>
    </div>

</body>

</html>