<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Post</title>
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
<?php include '../fragments/header.php'; ?>
<?php include '../fragments/navbar.php'; ?>
<div class="content">
		<div class="wrapper">
			<h1>Baza testowa</h1>
			<?php

			if (isset($_GET['posts_id'])) {
				$requestedUser = $_GET['posts_id'];
			}

			$string = file_get_contents("../login.json");
			$json = json_decode($string, true);

			$login = $json['login'];
			$pass = $json['pass'];
			$basename = $json['basename'];
			$host = $json['host'];

			$postid = $json['postid'];
			$posttitle = $json['posttitle'];
			$postbody = $json['postbody'];

			$mysqli = new mysqli($host, $login, $pass, $basename);
			
			if (isset($requestedUser)) {
				$result = $mysqli->query("SELECT * FROM posts WHERE id = $requestedUser");
				if (is_numeric($requestedUser)) {
					$rowcount = mysqli_num_rows($result);
					if ($rowcount != 0) {
						foreach ($result as $row) {
							echo " id: " . $row[$postid] . ", title: " . $row[$posttitle] . ", body: " . $row[$postbody] . "<br>";
						}
					} else {
						echo "W bazie danych nie ma takiego id";
					}
				} else {
					echo "<script type='text/javascript'>alert('Proszę używac tylko i wyłącznie liczb');</script>";
					echo "Podaj tylko i wyłącznie liczbę: ?posts_id=numer";
				}
			} else {
				$result = $mysqli->query("SELECT * FROM posts");
				foreach ($result as $row) {
					echo " id: " . $row[$postid] . ", title: " . $row[$posttitle] . ", body: " . $row[$postbody] . "<br>";
				}
			}
			?>
		</div>
	</div>	
    <?php include '../fragments/sidebar.php'; ?>
</div>
<?php include '../fragments/footer.php'; ?>
</body>
</html>
