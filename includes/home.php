<?php 

	$sql = 'SELECT location_name, location_type  FROM tramp WHERE account_id ='.$_SESSION['user_id'];
	
	$trampArray = selectMultipleRows($db, $sql);

?>

<section class="container">
	
	<div class="header header_container row">
		<a href="#" class="header_btn">		
			<img src="assets/icons/arrow487_left.svg" alt="Left Arrow" class="header_arrowLeft col-xs-2">
		</a>

		<h2 class="header_title-home col-xs-offset-2 col-xs-4">TREK</h2>
		
		<a href="#" class="header_btn">
			<img src="assets/icons/add149.svg" alt="Add" class="header_add col-xs-offset-1 col-xs-3">	
		</a>
	</div>	

	<div class="row">
		<h2> Tramps </h2>
	</div>

	<section class="home_tramps_container">

		<?php foreach ($trampArray as $key => $value) : ?>

			<article class="home_item_container home_item_container-first row">
				<a href="?pages=tramp">
					<div class="col-xs-4">
							<img src="assets/images/SplitShire_IMG_6207.jpg" alt="" class="img-responsive">
					</div>
					<div class="col-xs-8">
							<h3 class=""><?php echo $value['location_name'] ?></h3>
							<h4 class=""><?php echo $value['location_type'] ?></h4>
					</div>	
				</a>	
			</article>

		<?php endforeach ?>

	</section>

</section>


<!-- background: -moz-linear-gradient(top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.7) 57%, rgba(0,0,0,0.5) 67%, rgba(255,255,255,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.7)), color-stop(57%,rgba(0,0,0,0.7)), color-stop(67%,rgba(0,0,0,0.5)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.7) 57%,rgba(0,0,0,0.5) 67%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.7) 57%,rgba(0,0,0,0.5) 67%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.7) 57%,rgba(0,0,0,0.5) 67%,rgba(255,255,255,0) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.7) 57%,rgba(0,0,0,0.5) 67%,rgba(255,255,255,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b3000000', endColorstr='#00ffffff',GradientType=0 ); /* IE6-9 */ -->
