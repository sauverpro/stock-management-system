<?php
include 'menus.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAINT ANNE</title>
</head>
<body>
    
<form action="" method="POST" style="width: 100%;">
	FROM:<input type="date" name="from"style="width: 50%;!important" >
	TO:<input type="date" name="to" style="width: 50%;">
<input type="submit" name="view" value="view">

</body>
</html>
<?php
if (isset($_POST['view'])) {
	$from=$_POST['from'];
	$to=$_POST['to'];
    ?>
   
<a href="stock.php">ADD PRODUCT</a>
<table border="1" cellspacing="0" cellpadding="3">
	<tr>
		<th rowspan="2">#</th>
		<th rowspan="2">PRODUCT NAME</th>
		<th colspan="4">STOCK IN</th>
		<th colspan="2">STOCK OUT</th>
		<th rowspan="2">LIVE STOCK</th>
	</tr>
		<tr>
			<th>DATE</th>
			<th>QUANTITY</th>
			<th>UNIT PRICE</th>
			<th>TOTAL PRICE</th>
			<th>QUANTITY</th>
			<th>DATE</th>


		</tr>
<?php

$select = "SELECT * FROM product ORDER BY Product_Name ASC";
$sel=$con->query($select);
if ($sel->num_rows>0) {
	$i=1;
while ($row=$sel->fetch_assoc()) {

	$id=$row['ProductId'];
	$names=$row['Product_Name'];
	// ghj
	$selec = "SELECT * FROM stock_in,product WHERE product.ProductId=stock_in.ProductId && product.ProductId='".$id."' 
	AND stock_in.date BETWEEN '".$from."' AND '".$to."'";
$seel=$con->query($selec);
if ($seel->num_rows>0) {
while ($rows=$seel->fetch_assoc()){
	$date=$rows['date'];
	$quat=$rows['quantity'];
	$price=$rows['unit_price'];
	$tprice=$rows['total_price'];
}
}
else{
	// echo "not";
	$quat=0;
	$date=0;
	$tprice=0;

}
// dfghjk
	$se = "SELECT * FROM stock_out,product WHERE product.ProductId=stock_out.ProductId && product.ProductId='".$id."'";
$el=$con->query($se);
if ($el->num_rows>0) {
while ($rowss=$el->fetch_assoc()){
	$datee=$rowss['date'];
	$quatt=$rowss['quantity'];

}
}
else{
	// echo "not";
	$quatt=0;
	$datee=0;

}

// fghjksd
	?>
	<tr>
		<td><?= $i++;?></td>
		<td><?= $names;?></td>
		<td><?= $date;?></td>
		<td><?= $quat;?></td>
		<td><?= $price;?></td>
		<td><?= $tprice;?></td>
		<td><?= $quatt;?></td>
		<td><?= $datee;?></td>
		<td><?= $quat-$quatt;?></td>

	</tr>
	<?php
}

}
else{
?>
<tr>
	<td colspan="3">no record in the table</td>
</tr>
<?php
}

?>
</table>
<button onclick="window.print()">PRINT REPORT</button>

<?php

}
?>

<style>
	form{
		width: 100%!important;
		/* display: inline; */
		margin-top: 1%;
		margin-left: 5%;


	}
	form input[type=date]{
		width: 10%!important;
	}
	form input[type=submit]{
		width: 5%!important;
		padding: 5px;
		color: #fff;
		background-color: #008899;
		border-radius: 10px;
		border-style: none;
	}
</style>