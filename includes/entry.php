<?php 

	// if (isset($_POST['username']) AND isset($_POST['password'])) {
		
	// 	$sql = 'SELECT *
	// 			FROM account 
	// 			WHERE name ='.$_POST['username'].' AND '.$_POST['password'];

	// 	$result = selectMultipleRows($db, $sql);

	// 	if ($result) {
	// 		echo "welcome".$result[0][0];
	// 	} else {
	// 		echo '<h2>Account not found. Would you like to sign up?</h2>';
	// 	}


	// } else {

	// 	echo "Please enter your username and password";

	// }

?>

<section class="container entry_background">
		<div class="row">
			<img src="assets/images/logo_2.svg" alt="Logo" class="entry_logo col-xs-offset-3 col-xs-6">
		</div>

		<div class="row">
			<h1 class="col-xs-12 entry_heading">TREK</h1>
		</div>



		<form action="" method="post" role="form">
			
			<button type="submit" class="col-xs-12 entry_btn entry_btn_bold" name="loginBtn" id="loginBtn">
				<h5>Login</h5>
			</button>		

			<button type="submit" class="col-xs-12 entry_btn_link" id="signUpBtn" name="signUpBtn">
				<div class="entry_btn">
					<h5>Sign Up</h5>
				</div>
			</button>

			<div class="form-group">
			
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control">

			</div>
				
			<div class="form-group"> 

				<label for="password">Password</label>
				<input type="text" name="password" id="password" class="form-control">

			</div>

		</form>
</section>