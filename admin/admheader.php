<?php
include_once '../config.php';
if($_SESSION['user']['u_type']==NULL)
{
    header('location: ../../login.php');
}
if(!in_array($_SESSION['user']['u_type'], ["Admin"])){
    header('location: ../../index.php');
}
include 'adminfunc.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Uniview | Admin Panel</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/font-awesome.min.css">

    <link rel="stylesheet" href="../../css/style.css">

    <link rel="stylesheet" href="../../css/admin.css">


</head>

<body>
<header>
    <div class="logo">
        <h1 class="logo-text">UniView</h1>
    </div>

    <ul class="">
        <li>
            <a href="#"><?php echo $_SESSION['user']['first_name'];?></a>
            <ul>
                <li><a href="../../logout.php" class="logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</header>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper">

    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <ul>
            <li><a href="../posts/index.php">Manage Posts</a></li>
            <li><a href="../users/index.php">Manage Users</a></li>
        </ul>
    </div>
    <!-- // Left Sidebar -->


