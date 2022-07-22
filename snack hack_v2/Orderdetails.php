<?php
include 'Login_header.php';
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
// $cust_select = "SELECT uid FROM `user_registration_tb` WHERE `login-id`='$uid'";
// $cust_result = mysqli_query($con, $cust_select);
// $cust_fetch = mysqli_fetch_array($cust_result);
// $custid = $cust_fetch['uid'];
?>

<!-- Start All Pages -->
<div class="menu-box">
    <div class="container text-center">
        <div class="row">
            <!-- <div class="col-lg-12">
					<h1 style="margin-top: 100px;">Order </h1>
				</div> -->
        </div>
    </div>
</div>
<!-- End All Pages -->

<head>
    <title>Order Details</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/men.css" rel="stylesheet">
    <style>
        .cartimg img {
            height: 100px;
            width: 100px;
        }

        .carttbl {

            box-sizing: border-box;
            border-color: black;
            background-color: beige;
            width: 100%;
            height: 100%;
            padding: 10px 10px 10px 10px;
            margin-bottom: 5px;
            margin-right: 20px;
        }

        .cards {
            position: relative;
            width: 100%;
            padding: 1rem 3rem;
            display: grid;
            grid-template-columns: repeat(2, 0.5fr);
            grid-gap: -10px;
        }

        .carttext {
            margin-left: 2%;
            width: 100%;

        }

        .cartdiv {
            box-shadow: 2px;
            border: 1px solid black;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

    <div class="container px-5 py-4" id="cart-body">
        <div class="row my-4">
            <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back
            </a>
            <h2 class="py-3 display-6 border-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg> My Orders
            </h2>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active px-4" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#nav-ongoing" type="button" role="tab" aria-controls="nav-ongoing" aria-selected="true">&nbsp;Ongoing&nbsp;</button>
                <a href="ComplOrderdetails.php"><button class="nav-link px-4" id="completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false">Completed</button></a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <!-- ONGOING ORDERS TAB -->
            <div class="tab-pane fade show active p-3" id="nav-ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                <?php
                $ongoing_orders_select = "SELECT * FROM tbl_payment WHERE Lg_id = '$uid' AND delivery_status !='Delivered'";
                $ongoing_result = mysqli_query($conn, $ongoing_orders_select);
                $ongoing_num = mysqli_num_rows($ongoing_result);
               
                // $chefid=$result['chef_id'];
                if ($ongoing_num > 0) {
                ?>
                    <div class="row row-cols-1 row-cols-md-3">
                        <!-- order detail starts -->
                        <?php while ( $og_row = mysqli_fetch_array($ongoing_result)) { ?>
                            <div class="col">

                                <class="text-dark text-decoration-none">
                                    <div class="card mb-3">
                                        <?php if ($og_row["delivery_status"] == "ship") { ?>
                                            <div class="card-header bg-info text-dark justify-content-between">
                                                <small class="me-auto d-flex" style="font-weight: 500;">Order Shiped</small>
                                            </div>
                                        <?php } else { ?>
                                            <div class="card-header bg-warning justify-content-between">
                                                <small class="me-auto d-flex" style="font-weight: 500;">Preparing order</small>
                                            </div>
                                        <?php } ?>
                                        <div class="card-body">
                                            <div class="card-text row row-cols-1 small">
                                                <div class="col">Order Id#<?php echo $og_row["payment_id"]; ?></div>
                                                <?php
                                                $ord_query = "SELECT * FROM tbl_payment WHERE payment_id = '{$og_row['payment_id']}'";
                                                $ord_arr = mysqli_query($conn, $ord_query)->fetch_array();
                                                ?>
                                                <div class="col pt-2 border-top">Status:<?php echo $ord_arr["P_status"] ?></div>
                                                <div class="col pt-2 border-top">Delivery Status:<?php echo $ord_arr["delivery_status"] ?></div>
                                                <div class="col mt-1 mb-2"><strong class="h5">Rs.<?php echo $ord_arr["P_Amount"] ?>
                                                        </strong></div>
                                                <div class="col text-end">
                                                    <a href="receipt2.php?id=<?php echo $og_row["payment_id"] ?>" class="text-dark text-decoration-none" target="_blank">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                                        </svg> More Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                            </div>


                            <!-- IN CASE NO ORDER -->

              
                    <!-- END CASE NO ORDERS -->
                <?php }
                } ?>
            </div>


          
        <!-- END CASE NO ORDER -->
    
    </div>
    </div>

</body>
<!-- Start Contact info -->

<br><br><br><br><br><br><br><br><br>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">Snack Hack</a> </p>
            </div>
        </div>
    </div>
</div>

</footer>
<!-- End Footer -->



<!-- ALL JS FILES -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="js/jquery.superslides.min.js"></script>
<script src="js/images-loded.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/baguetteBox.min.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/custom.js"></script>
</body>

</html>