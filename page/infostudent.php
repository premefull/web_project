<?php
    session_start();
    include('connect.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login_admin.php');
    }
    if(isset($_GET['logout'])){
        unset($_SESSION['username']);
        header('location: login_admin.php');
        session_destroy();
    }
  

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            background-color: #04AA6D;
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
        
        div {
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            text-transform: uppercase;
            color: #76ff8d;
        }
        
        p {
            text-indent: 50px;
            text-align: justify;
            letter-spacing: 3px;
            padding-left: 250px;
            padding-right: 10px;
            color: #e0ee20;
            font-size: 20px;
        }
        
        a {
            text-decoration: none;
            color: #b91c1c;
        }
        
        img {}
        html {
        height: 100%;

    }

    body {
        margin: 0;
        background: linear-gradient(45deg, #49a09d, #5f2c82);
        font-family: sans-serif;
        font-weight: 100;
        font-family: 'Lobster', cursive;
        font-family: "Asap", sans-serif;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
        background-color: #f0177c;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }


    .container {
        padding: 16px;

    }

    .container1 {
        margin-top: auto;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: auto;


    }



    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 30%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    .add {
        margin-left: 45%;
        margin-top: 30px;
    }


    table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    th {
        text-align: left;
    }

    thead {
        th {
            background-color: #55608f;
        }
    }

    tbody {
        tr {
            &:hover {
                background-color: rgba(255, 255, 255, 0.3);
            }
        }

        td {
            position: relative;

            &:hover {
                &:before {
                    content: "";
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: -9999px;
                    bottom: -9999px;
                    background-color: rgba(255, 255, 255, 0.2);
                    z-index: -1;
                }
            }
        }
    }

    h3 {

        color: white;
    }

    .update {}
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
    
</head>

<body>

    <div class="sidebar">
        <a class="active" href="adminpage1.html">หน้าหลัก</a>
        <a href="dashboard.php">แดชบอร์ด</a>
        <a href="calssroompage.html">ห้องเรียน</a>
        <a href="insertroom.php">จัดการห้องเรียน</a>
        <a href="#about">พิกัดจุด</a>
        <a href="infostudent.php">ข้อมูลนักศึกษา</a>
        <a href="login_admin.php">ออกจากระบบ</a>
    </div>
    
    <?php  if(isset($_SESSION)):?>
    <div class="success">

<!-- 
        <center>
            <h3>Welcome <strong><?php echo $_SESSION['username'];?></strong></h3>
        </center> -->


        <?php endif ?>

        <div>

            <center>

                <?php  
                  
                    $check = $_SESSION['username'];
                    $sql = "SELECT * FROM admin WHERE A_name ='$check'";
                    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                
                ?>


                <table border="1" class="container1">
                <tr>
                        <th width="50">
                            <div align="center">รหัสนักศึกษา</div>
                        </th>
                        <th width="50">
                            <div align="center">ชื่อ</div>
                        </th>
                        <th width="100">
                            <div align="center">นามสกุล</div>
                        </th>
                        <th width="100">
                            <div align="center">รหัสผ่าน</div>
                        </th>
                        <th width="100">
                            <div align="center">รูปภาพ</div>
                        </th>

                    </tr>
                    <?php
                       
                        $sql = " SELECT *  FROM student";
                        $Query = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                    ?>
                    <?php foreach ($Query as $data){ ?>   
                    <tr>

                        <td><?php echo $data["S_id"]; ?></td>
                        <td><?php echo $data["S_name"]; ?></td>
                        <td><?php echo $data["S_surname"]; ?></td>
                        <td><?php echo $data["S_pass"]; ?></td>
                        <td><?php echo "<img src='facedata/".$data["S_image"]."'width=100 height=100/>'"; ?></td>
    
                        </td>

                      
                    </tr>
                    <?php }  ?>
                    
                
            </center>

            
        </div>
    </div>
</body>

</html>