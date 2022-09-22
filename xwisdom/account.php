<?php
include 'home.php';
include 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>St anne</title>
</head>
<body>
	<fieldset>
		<h2>CREATE ACCOUNT</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="username">
			<input type="password" name="pwd" placeholder="****">
			<input type="submit" name="go" value="Signup">

		</form>
	</fieldset>
</body>
</html>
<?php
if (isset($_POST['go'])) {
	$name=$_POST['user'];
	$pass=md5($_POST['pwd']);

$insert = "INSERT INTO manager VALUES('','$name','$pass')";
$con->query($insert);
header("location:login.php");
}

?>