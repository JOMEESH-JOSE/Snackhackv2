<?php
require_once "db.php";
$d_id = $_POST["d_id"];
$result = mysqli_query($conn,"SELECT `res_id`, `reserve_table` FROM `tbl_restable` WHERE p_id  = '$d_id'");
?>
<option value="">Select Table</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["res_id"];?>"><?php echo $row["reserve_table"];?></option>
<?php
}
?>
