<?php
session_start();
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
		<h2>login</h2>
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

$select = "SELECT * FROM manager ORDER BY username ASC";
$sel=$con->query($select);
if ($sel->num_rows>0) {
while ($row=$sel->fetch_assoc()) {
	$id=$row['id'];
	$names=$row['username'];
	$password=$row['password'];
	$_SESSION['id']=$id;
	$_SESSION['username']=$names;
}
if ($name==$names && $pass==$password) {
	header("location:dashboard.php");

}
else{
	echo "not loged in";
}
}
else{
	echo "no manager in the table";
}
}

?>