<?php
require_once "db.php";
$d_id = $_POST["d_id"];
$result = mysqli_query($conn,"SELECT * FROM city where d_id = $d_id");
?>
<option value="">Select City</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["c_name"];?></option>
<?php
}
?>
