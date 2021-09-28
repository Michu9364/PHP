<?php
$products = [
    ["name" => 'koszulka', "price" => 20],
    ["name" => 'koszulka2', "price" => 30],
    ["name" => 'koszulka3', "price" => 40]
];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
<?php include '../fragments/header.php'; ?>
<?php include '../fragments/navbar.php'; ?>
<div class="content">
		<div class="wrapper">
			<h3>Nasze wspaniałe produkty:</h3>
			<ul>
				<?php
				$suma = 0;
				foreach($products as $product){
					$suma = $suma + $product["price"];
					echo "<li>Przedmiot: " . $product["name"]. " cena: " .$product["price"] . "</li>";
				}
				?>
			</ul>
			<p>Suma: <?php echo $suma;?> zł</p>
		</div>
	</div>
	<?php include '../fragments/sidebar.php'; ?>
</div>
<?php include '../fragments/footer.php'; ?>
</body>
</html>
