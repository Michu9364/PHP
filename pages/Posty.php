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

			if (isset($_GET['user_id'])) {
				$requestedUser = $_GET['user_id'];
			}
			$string = file_get_contents("../login.json");
			$json = json_decode($string, true);
			$login = $json['login'];
			$pass = $json['pass'];
			$name = $json['name'];
			$base = $json['base'];
			$mysqli = new mysqli($base, $login, $pass, $name);
			if (isset($requestedUser)) {
				$result = $mysqli->query("SELECT * FROM posts WHERE author = $requestedUser");
			} else {
				$result = $mysqli->query("SELECT * FROM posts");
			}
			foreach ($result as $row) {
				echo " id: " . $row['id'] . ", title: " . $row['title'] . ", body: " . $row['body'] . "<br>";
			}
			
			
			?>
		</div>
	</div>	
    <?php include '../fragments/sidebar.php'; ?>
</div>
<?php include '../fragments/footer.php'; ?>
</body>
</html>
