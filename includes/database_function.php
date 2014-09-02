<?php
 
/* 
 
DATABASE FUNCTIONS
 
This file contains various useful functions for connecting to
a MySQL DB.
 
Require it in your other files where you want to use it.
 
If you use it in a new project, remember to change the config variables
in the getDbConnection function.
 
*/
 
function getDbConnection(){
 
	// CONFIG VARIABLES
 
	$databaseHost = 'localhost';
	$username	  = 'root';
	$password	  = '';
	$databaseName = 'trek';
 
	// Create a variable called '$connection'
	// that will hold an instance of a mysqli connection.
 
	$connection = new mysqli( $databaseHost, $username, $password, $databaseName);
 
	// If there is an error, we can find out what it is using the built in
	// php error connection functions:
	if (mysqli_connect_errno()) 
	{
		echo "There was a connection error! Here is a var_dump of it:";
		var_dump(mysqli_connect_error());
 
	} else {
		// If there is no error, return the connection object:
		return $connection;
	}
}
 
/**
* SELECT MULTIPLE ROWS
* This function takes a db connection object and some sql
* as parameters and returns an array of arrays as a result.
* If there are no results, the array will be empty.
**/
function selectMultipleRows($dbConnection, $sql) {
 
	// This line uses the builtin function mysqli_query
	// to get whatever we've specified in the $sql variable.
 
	$selectedRows = mysqli_query($dbConnection, $sql);
 
	// This is in case we get an error instead of a result:
	if(mysqli_errno($dbConnection)) 
	{
		echo "There was an error in selectMultipleRows! Here is a var_dump of it:<br />";
		var_dump(mysqli_connect_error());
	}
 
	// We need to do a bit of processing to make a nice array out of
	// the results. So this next part creates an empty array, then populates
	// it with each row of our results
 
	$resultsArray = array();
 
	while ($row = mysqli_fetch_assoc($selectedRows)) {
		$resultsArray[] =  $row;	
	}
	
	// And then return the finished array:
	return $resultsArray;
}
 
 
/**
* INSERT
* Takes a string of sql that contains an insert statement ($sql)
* Returns the primary key (ID) of the inserted item.
**/
 
function insert ($dbConnection, $sql) {
 
	$resultOfInsert = mysqli_query($dbConnection, $sql);
 
	if(mysqli_errno($dbConnection)) {
		if (mysqli_errno($dbConnection) == 1062) {
			echo "Not saved - duplicate entry. <br>";	
		}
		echo "There was an error in insert! Here is a var_dump of it:<br>";
		var_dump(mysqli_connect_error());
	}	
	// We want to return the last insert id in case we want to use it:
	$insertID = mysqli_insert_id($dbConnection);
 
	return $insertID;
}