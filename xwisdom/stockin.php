<?php
include 'menus.php';
include 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>St anne</title>
</head>
<body>
	<fieldset>
		<h2>RECORD STOCK IN</h2>
		<form action="" method="POST">

			<input type="hidden" name="p_id" value="<?= $_GET['p_id'];?>">
			<input type="text" name="name" readonly value="<?= $_GET['p_name'];?>">
			<input type="date" name="date" placeholder="date">
			<input type="text" name="quantity" placeholder="Quantity">
			<input type="text" name="price" placeholder="unit price">
			<input type="submit" name="go" value="ADD">

		</form>
	</fieldset>
</body>
</html>
<?php
if (isset($_POST['go'])) {
	$p_id=$_POST['p_id'];
	$date=$_POST['date'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
	$total=$quantity*$price;

$insert = "INSERT INTO stock_in VALUES('$p_id','$date','$quantity','$price','$total')";
$con->query($insert);
header("location:vstockin.php");
}
?>