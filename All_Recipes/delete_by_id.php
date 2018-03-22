<html>
<head>
<title>Delete Recipe</title>
</head>
<body>
<p> The selected recipe has been deleted.</p>

<?php
	
	// Connecting, selecting database
	$link = mysqli_connect('localhost', 'dwilborn', 'emily310') or die('Could not connect: ' . mysql_error());
	// echo 'Connected successfully';
	mysqli_select_db($link, 'characterlimit') or die('Could not select database');
	
	//Get Recipe id
	$rip= '\''.$_GET["recipe_id"].'\'';
	
	
	//Set is_deleted to "1" for Recipes
	// Performing SQL query
	$query = 'UPDATE recipes SET is_deleted = 1 where id = '.$rip;
	$result = mysqli_query($link, $query) or die('Query failed...: ' . mysql_error());
	// Free resultset
	//mysqli_free_result($result);
	
	// Ingredients
	$query = 'UPDATE ingredients SET is_deleted = 1 where recipe_id = '.$rip;
	$result = mysqli_query($link, $query) or die('Query failed...: ' . mysql_error());
	// Free resultset
	//mysqli_free_result($result);
	
	//	Directions
	$query = 'UPDATE directions SET is_deleted = 1 where recipe_id = '.$rip;
	$result = mysqli_query($link, $query) or die('Query failed...: ' . mysql_error());
	
	// Free resultset
	//mysqli_free_result($result);
	// Closing connection
	mysqli_close($link);
?>




</body>
</html>
