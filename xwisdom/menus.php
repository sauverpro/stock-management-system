	<link rel="stylesheet" type="text/css" href="main.css">

<?php
session_start();
include 'connection.php';

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
	?>
	<header>
		<div class="links">
<a href="dashboard.php">Dashboard</a>
<a href="vproduct.php">Stock</a>
<a href="vstockin.php">Stock In</a>
<a href="vstockout.php">Stock Out</a>
<a href="report.php">Report</a>
<a href="search.php">Search</a>
<a href="logout.php">logout</a>
</div>
</header>
	<?php
}
else{
	header("location:login.php");
}
?>