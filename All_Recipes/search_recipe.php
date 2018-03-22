<html>
<head>


    <link href="https://fonts.googleapis.com/css?family=Khula" rel="stylesheet"> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Nothing In the Fridge&trade;</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style>
        body {
           font-family: 'Khula', sans-serif;
	    background: url(spiration_light/spiration-light.png) repeat 0 0;
        }
    </style>


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>



<body>



<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://dsg1.crc.nd.edu/cse30246/characterlimit/">Home</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="http://dsg1.crc.nd.edu/cse30246/characterlimit/projectdetails/index.html">About</a>
                </li>
                <li>
                    <a href="recipes.php">Recipes</a>
                </li>
				<li class="active">
					<a href="search_recipe.html">Search</a>	
                </li>
				<li>
					<a href="categories.html">Categories</a>
				</li>
				<li>
					<a href="insert_recipe.php">Add Recipe</a>
				</li>
                <li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="page-header">
		 <h1>Nothing In the Fridge&trade;</h1>
	</div>
</div>

</div>



<div class="container">
  <h2>Recipe Matches</h2>
  

<?php

	session_start();
	error_reporting(E_ERROR | E_WARNING);
	
	// Connecting, selecting database
	$link = mysqli_connect('localhost', 'dwilborn', 'emily310') or die('Could not connect: ' . mysql_error());
	// echo 'Connected successfully';
	mysqli_select_db($link, 'characterlimit') or die('Could not select database');
	
	// Performing SQL query. Returns Recipes that include Recipe name
	$name = '\'%'.$_GET["name"].'%\'';
	$query = 'SELECT * FROM recipes where is_deleted = 0 AND name LIKE '.$name;
	$result = mysqli_query($link, $query) or die('Query failed...: ' . mysql_error());
	
	// Printing results in HTML
	echo "<table>\n";
	while ($tuple = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		echo "\t<tr>\n";
		$test = $tuple[id];
		$_SESSION['tuple'] = $test;
				echo "<div class=\"list-group\">";
				echo	"<a href=\"click_recipe.php?id=$test\" class=\"list-group-item active\">";
				echo		"<h4 class=\"list-group-item-heading\">";
				echo			reset($tuple); 
				echo 		"</h4>";
					
		foreach ($tuple as $key => $value) {
				//echo		"<p class=\"list-group-item-text\">$key: $value</p>";
				if(empty($value)) {
					continue;
				} else {
					if($key == "name") {
						continue;
					} elseif($key == "id") {
						continue;
					} elseif($key == "tot_calories") {
						echo		"<p class=\"list-group-item-text\">Calorie Count: $value</p>";
					} elseif($key == "tot_price") {
						echo		"<p class=\"list-group-item-text\">Price: $value</p>";
					} elseif($key == "prep_time") {
						echo		"<p class=\"list-group-item-text\">Preparation Time: $value</p>";
					} elseif($key == "cook_time") {
						echo		"<p class=\"list-group-item-text\">Cook Time: $value</p>";
					} elseif($key == "tot_time") {
						echo		"<p class=\"list-group-item-text\">Total Time: $value</p>";
					} elseif($key == "servings") {
						echo		"<p class=\"list-group-item-text\">Servings: $value</p>";
					} elseif($key == "tips") {
						echo		"<p class=\"list-group-item-text\">Tips: $value</p>";
					} elseif($key == "avg_rating") {
						echo		"<p class=\"list-group-item-text\">Rating: $value</p>";
					} 	
				}
		}
				echo	"</a>";
				echo "</div>";

		echo "\t</tr>\n";
	}
				
	echo "</table>\n";
	
	// Free resultset
	mysqli_free_result($result);
	// Closing connection
	mysqli_close($link);
?>


</div>




</body>
</html>
