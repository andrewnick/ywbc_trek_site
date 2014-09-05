<?php 

	$sql = 'SELECT t.tramp_name, l.location_name, l.tramp_id FROM tramp t LEFT JOIN location l ON t.id = l.tramp_id WHERE t.id = l.tramp_id && t.account_id ='.$_SESSION['user_id'];
	
	$trampArray = selectMultipleRows($db, $sql);
	//var_dump($trampArray);
?>

<section class="container">
	
	<div class="header header_container row">
		<a href="index.php" class="header_btn">		
			<img src="assets/icons/arrow487_left.svg" alt="Left Arrow" class="header_arrowLeft col-xs-2">
		</a>

		<h2 class="header_title-home col-xs-offset-2 col-xs-4">TREK</h2>
		
		<a href="#" class="header_btn" id="addTramp">
			<img src="assets/icons/add149.svg" alt="Add" class="header_add col-xs-offset-1 col-xs-3">	
		</a>
	</div>	

	<div class="row">
		<h2> Tramps </h2>
	</div>

	<div class="home_add_tramp">
		
		<h2>Add Tramp</h2>	

		<form action="" method="post" role="form">	
			<div class="form-group">
			
				<label for="trampName">Tramp Name</label>
				<input type="text" name="trampName" id="trampName" class="form-control">

			</div>

			<button type="submit" class="col-xs-12 entry_btn entry_btn_bold" name="loginBtn" id="loginBtn">
				<h5>Login</h5>
			</button>
		</form>
	</div>

	<section class="home_tramps_container">

		<?php foreach ($trampArray as $value) : ?>

			<article class="home_item_container row">
				<a href="?pages=tramp&tramp_id=<?php echo $value['tramp_id'] ?>">
					<div class="col-xs-4">
							<img src="assets/images/SplitShire_IMG_6207.jpg" alt="" class="img-responsive">
					</div>
					<div class="col-xs-8">
							<h3 class=""><?php echo $value['tramp_name'] ?></h3>
							<h4 class=""><?php echo $value['location_name'] ?></h4>
					</div>	
				</a>	
			</article>

		<?php endforeach ?>

	</section>

</section>