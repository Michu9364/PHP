<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Produkty</title>
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
<?php include '../fragments/header.php'; ?>
<?php include '../fragments/navbar.php'; ?>
<div class="content">
		<div class="wrapper">
			<h1>Nasze wspaniałe produkty:</h1>
			<ul>
				<?php
				$suma = 0;
				$mysqli = new mysqli("localhost", "root", "", "blockphp");
				$result = $mysqli->query("SELECT * FROM products");
				foreach($result as $row){
					echo "<li>" . $row["Name"]. " -". " cena: " .$row["Price"] . "zł</li>";
					$suma = $suma + $row["Price"];	
				}
				?>
			</ul>
			<h3>Suma: <?php echo $suma;?> zł</h3>
		</div>
	</div>
	<?php include '../fragments/sidebar.php'; ?>
</div>
<?php include '../fragments/footer.php'; ?>
</body>
</html>
