<?php
     include 'db.php';
        $apiKey="rzp_test_vMmkRel63CDnSH";

        $id = $_GET['id'];
        // $sql = mysqli_query($conn,"SELECT P_Amount FROM `tbl_payment` where payment_id='$id'");
        // $row = mysqli_fetch_assoc($sql);
        // $amt = $row['P_Amount'];
       
?>
<form action="Success.php?id=<?php echo $id; ?>" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="10000" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-order_id="<?php rand(100000, 999999);?>"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay"
    data-name="SNACK HACK"
    data-description="Fill your stomach with our love."
    data-image=""
    data-prefill.name=""
    data-prefill.email=""
    data-theme.color="#F37254"
></script>

</form>

<!--style>
.razorpay-payment-button { display:none; }
</style>


<script type="text/javascript">
  $(document).ready(function(){
    $('.razorpay-payment-button').click();

});
</script-->