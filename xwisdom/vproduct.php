<?php

include 'menus.php';
include 'connection.php';
?>
<a href="stock.php">ADD PRODUCT</a>
<table border="1" cellspacing="0" cellpadding="2">
	<tr>
		<th>#</th>
		<th>PRODUCT NAME</th>
		<th>ACTION</th>
	</tr>
<?php

$select = "SELECT * FROM product ORDER BY Product_Name ASC";
$sel=$con->query($select);
if ($sel->num_rows>0) {
	$i=1;
while ($row=$sel->fetch_assoc()) {

	$id=$row['ProductId'];
	$names=$row['Product_Name'];
	$bougth='<a href="stockin.php?p_id='.$id.'&p_name='.$names.'">Bougth</a>';
	$update='<a href="update.php?up_id='.$id.'&p_name='.$names.'">Update</a>';
	$delete='<a href="delete.php?d_id='.$id.'">Delete</a>';
	?>
	<tr>
		<td><?= $i++;?></td>
		<td><?= $names;?></td>
		<td><?= $bougth;?> <?= $update;?> <?= $delete;?></td>
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