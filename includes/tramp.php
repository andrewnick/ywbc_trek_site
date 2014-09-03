<?php 

	$sql = 'SELECT name, location_type  FROM tramp WHERE account_id ='.$_SESSION['user_id'];
	
	$trampArray = selectMultipleRows($db, $sql);

?>

<h1> TRAMP </h1>