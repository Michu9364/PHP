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
			<h1>Nasze najpopularniejsze produkty:</h1>
			<ul>
				<?php
				$suma = 0;
				$string = file_get_contents("../login.json");
				$json = json_decode($string, true);

				$login = $json['login'];
				$pass = $json['pass'];
				$basename = $json['basename'];
				$host = $json['host'];

				$productname = $json['productname'];
				$productprice = $json['productprice'];

				$mysqli = new mysqli($host, $login, $pass, $basename);
				$result = $mysqli->query("SELECT * FROM products");
				foreach($result as $row){
					echo "<li>" . $row[$productname]. " -". " cena: " .$row[$productprice] . "zł</li>";
					$suma = $suma + $row[$productprice];
				}
				?>
			</ul>
			<h3>Suma: <?php echo $suma;?>zł</h3>
		</div>
	</div>
	<?php include '../fragments/sidebar.php'; ?>
</div>
<?php include '../fragments/footer.php'; ?>
</body>
</html>
