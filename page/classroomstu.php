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
  <a href="profliestudent.php">ประวัติส่วนตัว</a>
  <a href="#everything">ภาพรวมการใช้ห้อง</a>
  <a class="active" href="#classroom">ห้องเรียน</a>
</div>

<div class="content">
    <h2>หน้าหาห้องดูจุด</h2>