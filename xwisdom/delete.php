<?php
include 'connection.php';

$id=$_GET['d_id'];
$delete="DELETE FROM product WHERE ProductId='$id'";
$con->query($delete);
header("location:vproduct.php");
?>