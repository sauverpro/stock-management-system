<?php

include 'menus.php';
include 'connection.php';
?>
<a href="vproduct.php">ADD Stock in</a>

<table border="1" cellspacing="0" cellpadding="2">
	<tr>
		<th>#</th>
		<th>PRODUCT NAME</th>
		<th>DATE</th>
		<th>QUANTITY</th>
		<th>PRICE</th>
		<th>TOTAL PRICE</th>
		<th>USERD PRODUCT</th>
	</tr>
<?php

$select = "SELECT * FROM product,stock_in WHERE product.ProductId=stock_in.ProductId ORDER BY Product_Name ASC";
$sel=$con->query($select);
if ($sel->num_rows>0) {
	$i=1;
while ($row=$sel->fetch_assoc()) {

	$id=$row['ProductId'];
	$names=$row['Product_Name'];
	$date=$row['date'];
	$quat=$row['quantity'];
	$price=$row['unit_price'];
	$tprice=$row['total_price'];
	$stockout='<a href="stockout.php?p_id='.$id.'&p_name='.$names.'&quantity='.$quat.'">Add to used product</a>';
	?>
	<tr>
		<td><?= $i++;?></td>
		<td><?= $names;?></td>
		<td><?= $date;?></td>
		<td><?= $quat?></td>
		<td><?= $price;?></td>
		<td><?= $tprice;?></td>
		<td><?= $stockout;?></td>
	</tr>
	<?php
}

}
else{
?>
<tr>
	<td colspan="6">no record in the table</td>
</tr>
<?php
}

?>
</table>