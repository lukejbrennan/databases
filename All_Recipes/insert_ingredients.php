<html lang="en">

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
            background: url(spiration_light/spiration-light.png) repeat 0 0;
           font-family: 'Khula', sans-serif;
        }
    </style>


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>


<body style = "margin:0; padding:0">


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
				<li>
					<a href="search_recipe.html">Search</a>	
                </li>
				<li>
					<a href="categories.html">Categories</a>
				</li>
				<li class="active">
					<a href="insert_recipe.php">Add Recipe</a>
				</li>
				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</div>


<div class="container">

<div class="col-md-12">
	<div class="page-header">
		<h1>Nothing In the Fridge&trade;<h1>
	</div>
</div>


<!-- Record recipe info--> 
<?php
	session_start();
	// Connecting, selecting database
	$link = mysqli_connect("127.0.0.1", "lbrenna4", "survival47", "characterlimit") or die('Could not connect: ' . mysql_error());
	mysqli_select_db($link, 'characterlimit') or die('Could not select database');


	/* create a prepared statement */
	if ($stmt = mysqli_prepare($link, "INSERT INTO recipes (name, tot_calories, tot_price, prep_time, cook_time, tot_time, servings, tips ) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
		//Get Variables from HTML form
		 $name			= isset($_GET['name']) ? $_GET['name'] : ''; 					//$_GET["name"];
		 $tot_calories	= isset($_GET['tot_calories']) ? $_GET['tot_calories'] : 0;		//$_GET["tot_calories"];
		 $tot_price		= isset($_GET['tot_price']) ? $_GET['tot_price'] : 0;			//$_GET["tot_price"];
		 $prep_time		= isset($_GET['prep_time']) ? $_GET['prep_time'] : '';			//$_GET["prep_time"];
		 $cook_time		= isset($_GET['cook_time']) ? $_GET['cook_time'] : '';			//$_GET["cook_time"];
		 $tot_time		= 0;
		 $servings		= isset($_GET['servings']) ? $_GET['servings'] : 0;				//$_GET["servings"];
		 $tips			= isset($_GET['tips']) ? $_GET['tips'] : '';					//$_GET["tips"];
		
		
		/* bind parameters for markers */
		mysqli_stmt_bind_param($stmt, "siisssis", $name, $tot_calories, $tot_price, $prep_time, $cook_time, $tot_time, $servings, $tips);
		/* execute query */
		mysqli_stmt_execute($stmt);
		$_SESSION['recipe_id'] = mysqli_insert_id($link);
		
		/* close statement */
		mysqli_stmt_close($stmt);
	}

	/* close connection */
	mysqli_close($link);
?>


<div class="panel panel-default" style="width:25%; margin-left:37.5%">

        <div class="panel-body">


		<p> <b>Your Ingredients: </b></p>
		<form action="insert_directions.php" method="get">
			Ingredient 1 :
			<br></br>
			<input type="text" name="ing1N" id="ing1N"></input>
			<br></br>
			Ingredient 2 :
			<br></br>
			<input type="text" name="ing2N" id="ing2N"></input>
			<br></br>
			Ingredient 3 :
			<br></br>
			<input type="text" name="ing3N" id="ing3N"></input>
			<br></br>
			Ingredient 4 :
			<br></br>
			<input type="text" name="ing4N" id="ing4N"></input>
			<br></br>
			Ingredient 5 :
			<br></br>
			<input type="text" name="ing5N" id="ing5N"></input>
			<br></br>
			Ingredient 6 :
			<br></br>
			<input type="text" name="ing6N" id="ing6N"></input>
			<br></br>
			Ingredient 7 :
			<br></br>
			<input type="text" name="ing7N" id="ing7N"></input>
			<br></br>
			Ingredient 8 :
			<br></br>
			<input type="text" name="ing8N" id="ing8N"></input>
			<br></br>
			Ingredient 9 :
			<br></br>
			<input type="text" name="ing9N" id="ing9N"></input>
			<br></br>
			Ingredient 10:
			<br></br>
			<input type="text" name="ing10N" id="ing10N"></input>
			<br></br>

			
			<input type="submit" name="submit_ingredients" value="Next"></input>
		</form>
	</div>
</div>

</body>
</html>
