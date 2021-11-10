<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
    <div>
        <h1>DASHBOARD ............</h1>
        
    </div>
</body>

</html>