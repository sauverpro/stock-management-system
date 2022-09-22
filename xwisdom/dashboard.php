<?php
include 'connection.php';
include 'menus.php';
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
	<h1>Welcome 	<?= $_SESSION['username'];?> To your dashboard</h1>
	<div class="sum">
		<div class="one">
			<H2>TOTAL PRODUCTS</H2>
			<?php
			$select="SELECT COUNT(ProductId) FROM product";
			$se=$con->query($select);
			if ($se->num_rows>0) {
				while ($a=$se->fetch_assoc()) {
					$p=$a['COUNT(ProductId)'];
				}				
			}
			else {
				$p=0;
			}
			?>
						<h4><?= $p;?></h4>
		</div>
		<div class="two">
		<H2>TOTAL STOCK IN</H2>

		<?php
			$sel="SELECT COUNT(ProductId) FROM stock_in";
			$see=$con->query($sel);
			if ($see->num_rows>0) {
				while ($sa=$see->fetch_assoc()) {
					$si=$sa['COUNT(ProductId)'];
				}				
			}
			else {
				$si=0;
			}
			?>
						<h4><?= $si;?></h4>
		</div>
		<div class="three">
		<H2>TOTAL STOCK OUT</H2>

<?php
	$sele="SELECT COUNT(ProductId) FROM stock_out";
	$seel=$con->query($sele);
	if ($seel->num_rows>0) {
		while ($saa=$seel->fetch_assoc()) {
			$sii=$saa['COUNT(ProductId)'];
		}				
	}
	else {
		$sii=0;
	}
	?>
				<h4><?= $sii;?></h4>
		</div>
	</div>
	</body>
	</html>