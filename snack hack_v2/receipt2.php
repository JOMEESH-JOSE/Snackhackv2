
<?php
include 'db.php';
$oid = $_GET['id'];
$sts = $_GET['sts'];
$main_tb = mysqli_query($conn,"SELECT payment_id,Lg_id,P_Amount,P_status,DATE(order_time)as date,TIME(order_time)as time,landmark FROM `tbl_payment` WHERE payment_id='$oid'");
$sub_detail = mysqli_query($conn,"SELECT order_tb.foodquantity,order_tb.Payment_id,order_tb.price,order_tb.totalprice,`food_tb`.`food name` FROM `order_tb` JOIN food_tb ON food_tb.fd_id=order_tb.food_id WHERE Payment_id='$oid'");
$totalqty = mysqli_query($conn,"SELECT SUM(foodquantity) as tot FROM order_tb WHERE Payment_id='$oid'");
$row = mysqli_fetch_array($main_tb);
$lid = $row['Lg_id'];
$add = mysqli_query($conn,"SELECT * FROM `tbl_payment` join `user_registration_tb` ON `user_registration_tb`.`login-id` = tbl_payment.Lg_id join district on district.id = user_registration_tb.District join city on city.id = user_registration_tb.city WHERE Lg_id = '$lid' AND payment_id='$oid'");
$addres = mysqli_fetch_assoc($add);
$row1 = mysqli_fetch_array($totalqty);
if($sts == 'success'){
    echo "<script>alert('Your food item will be placed with in 2 hours.');</script>"; 
}
if(isset($_POST['finish'])){
    header("location:index2.php");
}

?>
<html>
    <head>
        <title>Invoice</title>
        <style>
        .ord-inv-cont{
            margin-left: 25%;
            
}
.inv-body{
    margin-top: 30px;
 background-color: whitesmoke;
 box-shadow: 1px 1px 1px 1px;
 width: 55%;

}
.inv-dtls{
    text-align: center;
}
.inv-dtls h2{
    padding-top:4%;
    font-style: bold;
    color:black;
}
.inv-dtls p{
    font-size: 12px;
    font-style: italic;
    margin-top:-5px;
}
.inv-conts{
    margin: 50px;
}

.inv-head h5{
    margin-bottom: 20px;
}
.inv-addr{
    margin-left: 8%;
    margin-bottom: 10%;
}
.inv-tbl table{
   width: 100%;
}
.inv-tbl table tr{
    width: 100%;
}.inv-tbl table th{
    width: 10%;

}.inv-tbl table td{
    width: 10%;
    margin-left: 100px;
}
.inv-tot{
    margin-top: 20px;
}
.inv-tot text{
    float: left;
    text-align: inline;
}

.pay-stat{
    margin-top: 40px;
    width: 70%;
    background-color: #5cf78d;
    height: 30px;
    margin-left: 60px;
    color: black;
    text-align: center;
    margin-bottom: 10px;
}
.ord-stat{
    width: 70%;
    background-color: #2cf56c;
    height: 30px;
    margin-left: 60px;
    color: black;
    text-align: center;
    margin-bottom: 30px;
}
.inv-footer{
    margin-top:15px;
    padding-bottom: 10px;
    text-align: center;
}
.inv-btn{
    border: none;
    width: 150px;
    height:30px;
    border-radius:6px;
    background-color:#57d7fa;
    color: black;
    margin-left: 25%;
}
.inv-btn:hover{
    border: none;
    border-radius:6px;
    background-color:#51ad89;
    color: black;
}
.inv-btn1{
    border: none;
    width: 150px;
    height:30px;
    border-radius:6px;
    background-color:orange;
    color: black;
}
.inv-btn1:hover{
    border: none;
    border-radius:6px;
    background-color:lawngreen;
    color: black;
}


    </style>
    </head>
    <body>
<div class="ord-inv-cont" >
            <div class="inv-body" id="invoice">
                <div class="inv-dtls">
                    
                    <h2>SNACK HACK</h2>
                    <p>Good Food, Good Life</p>
                </div>
                <form method="post">
                <div class="inv-conts">
                    <div class="inv-head">
                    <h5>Order id:&nbsp; <?php echo $row['payment_id']; ?></h5>
                    <h5>User ID:&nbsp; <?php echo $row['Lg_id']; ?></h5>
                    <h5>Date:&nbsp; <?php echo $row['date']; ?></h5>
                    <h5>Time:&nbsp; <?php echo $row['time']; ?></h5>
                    </div>
                    <h6>Delivery Address:</h6>
                    <div class="inv-addr">
                        <text><?php echo $addres['name'] ?></text><br>
                        <text><?php echo $addres['address'] ?></text>,&nbsp;<text><?php echo $addres['d_name'] ?></text>,&nbsp;<text><?php echo $addres['c_name'] ?></text><br>
                        <text><?php echo $row['landmark'] ?></text><br>
                        <number><?php echo $addres['pin'] ?></number>
                    </div>
                    <div class="inv-tbl">
                       
                        <table>
                            <tr>
                                <th>Items</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            <?php
                        while($fetch=mysqli_fetch_array($sub_detail)){
                        ?><tr>
                                <td><?php echo $fetch['food name']?></td>
                                <td><?php echo $fetch['foodquantity']?></td>
                                <td><?php echo $fetch['price']?></td>
                        </tr>
                            <?php }?>
                        </table>
                    </div>
                    <div class="inv-tot">
                        <text>Total amount: <?php echo $row['P_Amount']?></text><br>
                        <text>Total Quantity:<?php echo $row1['tot']?></text>
                    </div>
                    <div class="inv-pay-stat">
                        <div class="pay-stat">
                            <text><?php echo $row['P_status']?></text>
                        </div>
                    </div>
                    <div class="inv-footer">
                        <text>Thank you for purchasing with Snack Hack</text>
                    </div>
                </div>
                
            </div>
            <p>

            <button class="inv-btn" onclick="printDiv('invoice')">Download Invoice</button>
            <button class="inv-btn1" type="submit" name="finish">Finish</button></p>
            
     </div>
</form>
<!-- print screen -->
<script type="text/javascript">
      function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
    </body></html>

