<div class="innerWrapper">
	<div class="leftSidebar">
	<li><a href="..\index.php">Strona główna</a></li>
		<?php
		$catalog = scandir('C:xampp/htdocs/pages');
		foreach($catalog as $item){
			$cutted_item = str_replace(".php", "", $item);
			if ($item != '.' && $item != '..') {
				echo "<li><a href='/pages/$item'>$cutted_item</a></li>";
			}
		}
		?>
</div>
