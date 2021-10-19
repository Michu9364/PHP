<div class="innerWrapper">
	<div class="leftSidebar">
		<li class="navbartext"><a href="..\index.php">Strona główna</a></li>
		<?php
		$catalog = scandir( __DIR__ . '/../pages');
		foreach($catalog as $item){
			$cutted_item = str_replace(".php", "", $item);
			if ($item != '.' && $item != '..') {
				echo "<li class='navbartext'><a href='/pages/$item'>$cutted_item</a></li>";
			}
		}
		?>
</div>
