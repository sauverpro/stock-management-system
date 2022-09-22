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
		<h2>RECORD PRODUCT</h2>
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Product Name">
			<input type="submit" name="go" value="ADD">

		</form>
	</fieldset>
</body>
</html>
<?php
if (isset($_POST['go'])) {
	$name=$_POST['name'];

$insert = "INSERT INTO product VALUES('','$name')";
$con->query($insert);
header("location:vproduct.php");
}

?>