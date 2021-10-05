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
			<h3>Baza testowa</h3>
			<?php
			$requestedUser = $_GET['user_id'];
			$mysqli = new mysqli("localhost", "root", "", "blockphp");
			$result = $mysqli->query("SELECT * FROM posts WHERE author = $requestedUser");
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
