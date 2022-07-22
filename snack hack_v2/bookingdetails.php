<?php
include 'db.php';
include 'Login_header.php';
session_start();
$uid = $_SESSION['UserID'];
$det = mysqli_query($conn,"SELECT chef_book.*,chef_reg_tb.name,chef_reg_tb.expert,chef_reg_tb.phno,tbl_event.eventname,chef_reg_tb.image FROM `chef_book` join chef_reg_tb on chef_reg_tb.Lg_id=chef_book.chef_id join tbl_event on tbl_event.ev_id = chef_book.event WHERE chef_book.user_id='$uid'");
?>
<style>
.res-cont {

    padding: 20% 0 0 10%;
    margin-bottom: 30px;
    margin-right: 30%;
}

.res-sub {
        position: absolute;
        background-color: lavender;
        width: 500px;
        height: 280px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .res-sub-menu {
        display: flex;

    }

    .res-sub-menu img {
        width: 150px;
        height: 150px;
        border-radius: 10px;
    }

    .res-dtls {
        margin-top: 20px;
        margin-left: 20px;
    }

    /* .res-dtls h4{

    } */
</style>

<body>
    <div class="row">
<?php while ($row = mysqli_fetch_array($det)){?>
    <div class="res-cont">

        <div class="res-sub">
            <div class="res-sub-menu">
                <img src="../employee/docs/image/<?php echo $row['image'] ?>">
                <div class="res-dtls">
                    <h4>Chef Name:<?php echo $row['name'] ?></h4>
                    <h4>Expert In:<?php echo $row['expert'] ?></h4>
                    <h4>Event Type:<?php echo $row['eventname'] ?></h4>
                    <h4>Peoples:<?php echo $row['peoples'] ?></h4>
                    <h4>PhNo:<?php echo $row['phno'] ?></h4>
                    <h4>Date:<?php echo $row['bookdate'] ?></h4>
                    <h4>TIme:<?php echo $row['time'] ?></h4>
                    <h4>Status:<?php echo $row['status'] ?></h4>

                </div>
            </div>
        </div>
       
    </div>
    <?php } ?>
    </div>
</body>