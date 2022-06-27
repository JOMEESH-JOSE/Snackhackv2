<?php
include 'Login_header.php';
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
$qq = "SELECT chef_book.*,`user_registration_tb`.`login-id`,chef_reg_tb.* FROM `chef_book` join chef_reg_tb on chef_reg_tb.Lg_id=chef_book.chef_id JOIN user_registration_tb on `user_registration_tb`.`login-id`=chef_book.user_id where `user_registration_tb`.`login-id`='$uid'";
$as = mysqli_query($conn,$qq);
?>

<html><head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
	
<link rel="stylesheet" href="css/notcss.css">
</head><body>
    <br><br><br><br><br><br>
<div class="container">
    <div class="row">
     
        <div class="col-lg-9 right">
            <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="m-0">Notifications</h6>
                </div>
                <div class="box-body p-0">
                <?php 
                        while($a = mysqli_fetch_array($as)){
                            $cname = $a['name'];
                            $img = $a['image'];
                            $status = $a['status'];
                            if($status =='REJECT'){
                                $text = "Your booking has been cancelled due to a lack of availability";
                            }else if($status =='YES'){
                                $text = "Your booking has been Approved";
                            }
                            else{
                                $text = "Your booking has been Waiting for the Chef approval";
                            }
                        ?>
                    <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                     
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="../employee/docs/image/<?php echo $img; ?>" alt=""  />
                        </div>
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">Chef Name:<?php echo $cname; ?></div>
                            <div class="small"><?php  echo $text; ?></div>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <!-- <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                </div> -->
                            </div>
                            <br />
                            <!-- <div class="text-right text-muted pt-1">3d</div> -->
                        </span>
                       
                    </div>
                    <?php }?>
                    <!-- <div class="p-3 d-flex align-items-center osahan-post-header">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                        </div>
                        <div class="font-weight-bold mr-3">
                            <div class="mb-2">We found a job at askbootstrap Ltd that you may be interested in Vivamus imperdiet venenatis est...</div>
                            <button type="button" class="btn btn-outline-success btn-sm">View Jobs</button>
                        </div>
                        <span class="ml-auto mb-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                    <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                </div>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">4d</div>
                        </span>
                    </div> -->
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
</div>
</body></html>