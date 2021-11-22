<?php
session_start();
include('connect.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login_admin.php');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    header('location: login_admin.php');
    session_destroy();
}
$strKeyword = null;
if (isset($_POST["S_id"])) {
    $strKeyword = $_POST["S_id"];
}
mysqli_query($conn, "SET NAMES 'utf8' ");
//query
$query = mysqli_query($conn, "SELECT COUNT(S_id) FROM `student`");
$row = mysqli_fetch_row($query);

$rows = $row[0];

$page_rows = 5; //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า ตย. 5 record / หน้า

$last = ceil($rows / $page_rows);

if ($last < 1) {
    $last = 1;
}
$pagenum = 1;
if (isset($_GET['pn'])) {
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) {
    $pagenum = 1;
} else if ($pagenum > $last) {
    $pagenum = $last;
}

$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;

$nquery = mysqli_query($conn, "SELECT * from student $limit");

$paginationCtrls = '';


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ข้อมูลนักศึกษา</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
        }

        .searchbar {
            margin-bottom: auto;
            margin-top: auto;
            height: 60px;
            background-color: #353b48;
            border-radius: 30px;
            padding: 10px;
        }

        .search_input {
            color: white;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            caret-color: transparent;
            line-height: 40px;
            transition: width 10000s linear;
        }

        .searchbar:hover>.search_input {
            padding: 0 10px;
            width: 200px;
            caret-color: red;
            transition: width 0.4s linear;
        }

        .searchbar:hover>.search_icon {
            background: white;
            color: #e74c3c;
        }

        .search_icon {
            height: 40px;
            width: 40px;
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color: white;
            text-decoration: none;
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
            color: black;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 100px;
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

        /* @media screen and (max-width: 400px) {
            .sidebar a 50 text-align: center;
            float: none;
        }

        } */

        .loading {
            background-image: url("ajax-loader.gif");
            background-repeat: no-repeat;
            display: none;
            height: 100px;
            width: 100px;
        }

        .form-control {
            width: 150px;
        }
    </style>

</head>

<body>

    <div class="sidebar">
        <a href="adminpage1.html">หน้าหลัก</a>
        <a href="dashboard.php">แดชบอร์ด</a>
        <a href="calssroompage.html">ห้องเรียน</a>
        <a href="insertroom.php">จัดการห้องเรียน</a>
        <a href="#about">พิกัดจุด</a>
        <a class="active" href="infostudent.php">ข้อมูลนักศึกษา</a>
        <a href="login_admin.php">ออกจากระบบ</a>
    </div>
    <div class="content">
        <?php
        ini_set('display_errors', 1);
        error_reporting(~0);

        $strKeyword = null;

        if (isset($_POST["txtKeyword"])) {
            $strKeyword = $_POST["txtKeyword"];
        }
        ?>
        <center>
            <br>
            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                <div class=" form-group">
                    <input class="form-control" placeholder="รหัสนักศึกษา" name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword; ?>">
                    <input type="submit" value="ค้นหา">

                </div>
            </form>

        </center>
        <?php
        $sql = "SELECT * FROM student WHERE S_id LIKE '%" . $strKeyword . "%' ";
        $query = mysqli_query($conn, $sql);
        ?>

        <div" rel="nofollow">

            <div style="height: 20px;"></div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-6">
                    <center>
                        <font color="white">
                            <h4>ข้อมูลนักศึกษา</h4>
                        </font>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr class="info">
                                    <th>
                                        <font color="white">ชื่อจริง</text>
                                    </th>
                                    <th>
                                        <font color="white">นามสกุล</font>
                                    </th>
                                    <th>
                                        <font color="white">รหัสนักศึกษา</font>
                                    </th>
                                    <th>
                                        <font color="white">รหัสผ่าน</font>
                                    </th>
                                </tr>

                            </thead>
                            <?php
                            while ($crow = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <font color="white"><?php echo $crow['S_name']; ?></font>
                                        </td>
                                        <td>
                                            <font color="white"><?php echo $crow['S_surname']; ?></font>
                                        <td>
                                            <font color="white"><?php echo $crow['S_id']; ?></font>
                                        </td>
                                        <td>
                                            <font color="white"><?php echo $crow['S_pass']; ?></font>
                                        </td>
                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                        </table>
                    </center>
                    <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
                </div>

            </div>

    </div>

    <script type="text/javascript" src="jquery-1.11.2.min.js"></script>

    <?php
    mysqli_close($conn);
    ?>
    </div>
</body>

</html>