<?php
include 'Login_header.php';
session_start();
$uid = $_SESSION['UserID'];
$det = mysqli_query($conn,"SELECT `reservation`.`rid`,`reservation`.`Lg_id`,`reservation`.`b_date`, `reservation`.`b_time`, `reservation`.`advance`, `reservation`.`P_status`,tbl_persontype.p_type,tbl_restable.reserve_table FROM `reservation` join tbl_persontype on tbl_persontype.p_id = reservation.type join tbl_restable on tbl_restable.res_id = reservation.Table_no WHERE P_status='Paid' AND reservation.Lg_id='$uid'");

?>
<style>
    .res-cont {

        padding: 20%;
    }

    .res-sub {
        
        position: absolute;
        background-color:teal;
        width: 500px;
        height: 180px;
        border-radius: 10px;
    }

    .res-sub-menu {
        margin-top:5px;
        display: flex;

    }

    .res-sub-menu img {
        width: 150px;
        height: 150px;
        border-radius: 10px;
        margin: 5px  0 0 5px;
    }

    .res-dtls {
        margin-left: 20px;
    }
    .button{
        width:90px;
        height:35px;
        border-radius: 10px;
        margin: 135px 0 0 15px;
        background-color:orange;
    }

    /* .res-dtls h4{

    } */
</style>

<body>
  
<div class="row">
    <div class="res-cont">
    <?php while ($row = mysqli_fetch_array($det)){?>
        <div class="res-sub">
            <div class="res-sub-menu">
                <img src="https://www.ulcdn.net/images/products/297118/original/Arabia_XL_Storage_Martha_6_Seater_Dining_Table_Set_TK_WB_LP.jpg?1591680592">
                <div class="res-dtls">
                    <h4>Type:<?php echo $row['p_type']; ?></h4>
                    <h4>Table:<?php echo $row['reserve_table']; ?></h4>
                    <h4>Date:<?php echo $row['b_date']; ?></h4>
                    <h4>TIme:<?php echo $row['b_time']; ?></h4>
                    <h4>Advance:<?php echo $row['advance']; ?></h4>
                    <h4>Advance:<?php echo $row['P_status']; ?></h4>
                   
                </div>
                <a href="remove.php?id=<?php echo $row['rid']; ?>"><button class="button" type="submit" name="remove">Remove</button></a>
            </div>

        </div>
    </div>
    <?php } ?>
    </div>

</body>
