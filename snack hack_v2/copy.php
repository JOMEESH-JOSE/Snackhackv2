<?php 
include 'db.php';
$sq = "SELECT payment_id,id,P_Amount,P_status,DATE(order_time) as date,TIME(order_time) as time FROM `tbl_payment` WHERE P_status='PAID' OR p_status='DELIVERED' ";
$q2=mysqli_query($conn,$sq);

?>
<!DOCTYPE html>
<html>

<head>
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
	<script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js">
	</script>
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
	<link rel="stylesheet"
		type="text/css" href=
"https://use.fontawesome.com/releases/v5.6.3/css/all.css">

	<script type="text/javascript">
		function showHideRow(row) {
			$("#" + row).toggle();
		}
	</script>

	<style>
		body {
			margin: 0 auto;
			padding: 0px;
			text-align: center;
			width: 100%;
			font-family: "Myriad Pro",
				"Helvetica Neue", Helvetica,
				Arial, Sans-Serif;
		}

		#wrapper {
			margin: 0 auto;
			padding: 0px;
			text-align: center;
			width: 995px;
		}

		#wrapper h1 {
			margin-top: 50px;
			font-size: 45px;
			color: #585858;
		}

		#wrapper h1 p {
			font-size: 20px;
		}

		#table_detail {
			width: 500px;
			text-align: left;
			border-collapse: collapse;
			color: #2E2E2E;
			border: #A4A4A4;
		}

		#table_detail tr:hover {
			background-color: #F2F2F2;
		}

		#table_detail .hidden_row {
			display: none;
		}
	</style>
</head>

<body>
	<div id="wrapper">

		<table border=1 id="table_detail"
			align=center cellpadding=10>

			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Salary</th>
				<th>Job</th>
			</tr>
			<?php while($row = mysqli_fetch_array($q2)){?>
			<tr onclick="showHideRow('<?php echo $row['payment_id']; ?>');">
			<td><?php echo $row['id']; ?></td>
      <td><?php echo $row['payment_id']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['time']; ?></td>
      <!-- <td><?php echo $row['P_Amount']; ?></td>
      <td><span class="badge badge-danger"><?php echo $row['P_status']; ?></span></td>	 -->
			</tr><?php } ?>
			<tr id="<?php echo $row['payment_id']; ?>" class="hidden_row">
				<td colspan=4>
					<p>hghghhghghghg</p>
				</td>
			</tr>

			
		</table>
	</div>
</body>

</html>
