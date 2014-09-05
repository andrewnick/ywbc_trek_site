<?php 
	$tramp_id = $_GET['tramp_id'];
?>

<section class="container">
	
	<div class="header header_container row">
		<a href="?pages=home" class="header_btn">		
			<img src="assets/icons/arrow487_left.svg" alt="Left Arrow" class="header_arrowLeft col-xs-2">
		</a>

		<?php
			$sql = 'SELECT tramp_name  FROM tramp WHERE id ='.$tramp_id;	
			$trampArray = selectMultipleRows($db, $sql);

			// var_dump($trampArray);
	 	?>

		<h2 class="header_title-home col-xs-offset-2 col-xs-4">TRAMP</h2>
	</div>	

	<div class="row">
		<h2 class="header_title-home col-xs-12"><?php echo $trampArray[0]['tramp_name'] ?></h2>
	</div>

	<?php
		$sql = 'SELECT location_name, location_type  FROM location WHERE tramp_id ='.$tramp_id;	
		$trampArray = selectMultipleRows($db, $sql);
 	?>

	<article class="home_item_container home_item_container-first row">
			<a href="?pages=map">
				<h2 class="tramp_title col-xs-12">Track</h2>
				<h3 class="col-xs-12">Name: <?php echo $trampArray[0]['location_name'] ?></h3>
				<h4 class="col-xs-12">Type: <?php echo $trampArray[0]['location_type'] ?></h4>
			</a>	
	</article>


	<article class="home_item_container row">
			<a href="#">
				<h2 class="tramp_title col-xs-5">Gear List</h2>
				<?php
					$isAllChecked = false;

					$sql = 'SELECT t.`checked` 
					 		FROM gearTotramp t
					 		LEFT JOIN gear g ON t.`gear_id` = g.`id`
					 		WHERE t.`tramp_id` =1';//.$_GET['tramp_id'];

					$trampArray = selectMultipleRows($db, $sql);
					
					if (!empty($trampArray)) {
						$checkedArray = $trampArray[0];

						foreach ($trampArray as $key => $item) {
							if (in_array('0', $item)) {
								$isAllChecked = false;
								break;
							} else {
								$isAllChecked = true;
							}
						}
					}
				 	if ($isAllChecked) {?>
				 		<img src="assets/icons/checkmark2.svg" alt="checkmark" class="tramp_icon col-xs-offset-5 col-xs-2">						 	 
				 	<?php } else { ?>  
						<img src="assets/icons/cross5.svg" alt="cross" class="tramp_icon col-xs-offset-3 col-xs-2">
				 	<?php }
			 	?>

			</a>	
	</article>

</section>
