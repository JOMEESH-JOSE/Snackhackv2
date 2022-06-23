<?php
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
if ($_SESSION['UserID'] == "") {
  header('location:page-login.php');
}
$sql = mysqli_query($conn, "SELECT * from chef_reg_tb where Lg_id='$uid'");
while ($row = mysqli_fetch_array($sql)) {
  $name = $row['name'];
  $img = $row['image'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" >
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
  <title>SNACk HACK-chef</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header"><a class="app-header__logo" href="chef_dash.php">SNACK HACK</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      
      <!--Notification Menu-->

      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
        <ul class="app-notification dropdown-menu dropdown-menu-right">
          <li class="app-notification__title">You have new notifications.</li>
          <div class="app-notification__content">
            <?php $review = mysqli_query($conn, "SELECT * FROM `chef_book` join user_registration_tb on user_registration_tb.`login-id`= chef_book.user_id WHERE chef_id='$uid' AND status='NO'");
            while ($ri = mysqli_fetch_array($review)) {
            ?>
              <li><a class="app-notification__item" href="notification.php?rid=<?php echo $ri['ch_id']; ?>"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>


                  <div>
                    <p class="app-notification__message"><?php echo $ri['name']; ?> sent you a Message</p>
                  </div>
                </a></li>
            <?php } ?>
          </div>
          </div>
          <li class="app-notification__footer"><a href="chef_viewnotification.php">See all notifications.</a></li>
        </ul>
      </li>

      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">

          <li><a class="dropdown-item" href="chef_profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../image/<?php echo $img; ?>" alt="User Image" width="54px" height="62px">
      <div>
        <p class="app-sidebar__user-name"><?php echo $name; ?></p>
        <p class="app-sidebar__user-designation">chef</p>
      </div>
    </div>
    <ul class="app-menu">
      <li><a class="app-menu__item active" href="chef_dash.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="chef_viewproduct.php"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">View Items</span></a>
      <li class="treeview"><a class="app-menu__item" href="chef_viewnotification.php"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">View Notification</span></a>
    </ul>
  </aside>