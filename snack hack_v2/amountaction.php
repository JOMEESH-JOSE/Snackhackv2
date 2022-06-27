<?php
require_once "db.php";
$p = $_GET['eid'];
$d_id = $_POST["id"];
$result =$p*$d_id;
?>

<input type="text" class="form-control" id="amount" value="<?php echo $result; ?>" readonly>



