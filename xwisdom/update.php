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

			<input type="text" name="p_id" readonly value="<?= $_GET['up_id'];?>">
			<input type="text" name="name" value="<?= $_GET['p_name'];?>">
			
			<input type="submit" name="go" value="UPDATE">

		</form>
	</fieldset>
</body>
</html>
<?php
if (isset($_POST['go'])) {
	$p_id=$_POST['p_id'];
	$name=$_POST['name'];

$update = "UPDATE product SET Product_Name='$name' WHERE ProductId='$p_id'";
$con->query($update);
header("location:vproduct.php");
}
?>