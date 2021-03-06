<?php
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
if($_SESSION['UserID']==""){
  header('location:page-login.php');
}
$sql = mysqli_query($conn,"SELECT * from registraion_tb where Lg_id='$uid'");
while($row = mysqli_fetch_array($sql)){
  $name = $row['name'];
  $img = $row['image'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Snack Hack is Reastarant Based Food Management System">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>SNACH HACK-managing User</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="man_dash.php">SNACK HACK</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
           
            <li><a class="dropdown-item" href="man_profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="manchangepass.php"><i class="fa fa-lock fa-lg"></i> Change Password</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="image/<?php echo $img; ?>" alt="User Image" width="54px" height="62px">
        <div>
          <p class="app-sidebar__user-name"><?php echo $name; ?></p>
          <p class="app-sidebar__user-designation">Receptionist</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="man_dash.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="assiging.php"><i class="app-menu__icon fa fa-user""></i><span class="app-menu__label">DeliveryBoy Assign Page</span></a>
        <li class="treeview"><a class="app-menu__item" href="viewpro.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">View Items</span></a>
        <li class="treeview"><a class="app-menu__item" href="online.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Online Order Details</span></a>
        <li class="treeview"><a class="app-menu__item" href="reception_payment_action.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Payment Action</span></a>
        <li class="treeview"><a class="app-menu__item" href="qr.php"><i class="app-menu__icon fa fa-qrcode"></i><span class="app-menu__label">QR Generating Page</span></a>
        <li class="treeview"><a class="app-menu__item" href="Blockuser.php"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Block User</span></a>
        <li class="treeview"><a class="app-menu__item" href="manReservation.php"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Reservation Details</span></a>
     
      </ul>
    </aside>