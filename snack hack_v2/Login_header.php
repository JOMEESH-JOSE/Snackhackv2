<?php
include 'db.php';
error_reporting(0);
session_start();
$uid = $_SESSION['UserID'];
if ($uid == "") {
  header('location:Login.php');
}

$DD = "SELECT * FROM `chef_book` join chef_reg_tb on chef_reg_tb.Lg_id=chef_book.chef_id JOIN user_registration_tb on `user_registration_tb`.`login-id`=chef_book.user_id WHERE  `user_registration_tb`.`login-id`='$uid'";
$a = mysqli_query($conn,$DD);
$count = mysqli_num_rows($a);
$cart = mysqli_query($conn,"SELECT foodid FROM `cart` where Lg_id='$uid'");
$count2=mysqli_num_rows($cart);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Site Metas -->
  <title>SNACK HACK</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Site CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <!-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->
    <style>
    .pageheader {
        background-color: white;
        height: 8%;
        box-shadow: 0px 0px 1px 0px;
        padding-bottom: 5%;
    }

    .navitems {
        margin: 1% 5% 0% 30%;
        float: right;
    }

    .navitems ul {
        text-align: center;
        text-decoration: none;
        list-style: none;
    }

    .navitems ul li {
        display: inline-block;
        padding-right: 20px;
        font-size: 18px;
    }

    li a,
    .dropbtn {
        display: inline-block;
        text-align: center;
        padding: 8px 13px;
        text-decoration: none;
        font-size: 17px;
        border-radius:5px;
        
    }

    li a:hover,
    .dropdown:hover .dropbtn {
        background-color: orangered;

    }

    li.dropdown {
        display: inline-block;

    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        z-index: 1;
        margin-top: 2%
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        font-size:16px;
    }


    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>

</head>

<body>
  <!-- Start header -->
  <header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="container">
        <div>
          <a class="navbar-brand" href="index.php">
            <img src="images/SNACK HACK.gif" alt="" width="120Px" height="90px" />
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars-rs-food">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="index2.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="OnlineBooking.php?pid=1">Food Booking</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn">BOOKING</a>
              <div class="dropdown-content">
                <a href="ChefBooking.php">Chef Booking</a>
                <a href="bookingdetails.php">Booking Details</a>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="cart3.php">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo $count2; ?></a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="Reservation.php">Table Reservation</a></li> -->
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn">RESERVATION</a>
              <div class="dropdown-content">
                <a href="Reservation.php">Table Reservation</a>
                <a href="reservationdetails.php">Reservation Details</a>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="contact2.php">Contact</a></li>
            <li class="nav-item "><a class="nav-link" href="Notifications.php"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $count; ?></a></li>
            <!-- <li class="nav-item "><a class="nav-link" href="Profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> -->
            </ul>
       
                    <div class="user-area dropdown float-right">
                    <?php 
                        $er = mysqli_query($conn,"SELECT * FROM `user_registration_tb` WHERE `login-id`='$uid'");
                        $rr=mysqli_fetch_assoc($er);

                    ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="./images/<?php echo $rr['image']; ?>" alt="User Avatar" width="40px" height="40px">
                        </a>

                      <div class="user-menu dropdown-menu">
                       <a class="nav-link" href="Profile.php">Profile</a>
                       <a class="nav-link" href="change_password.php">Change Password</a>
                       <a class="nav-link" href="Orderdetails.php">My Orders</a>
                       <a class="nav-link" href="logout.php">Logout</a>
                      </div>
                    </div>
            
        </div>
      </div>
    </nav>
  </header>
