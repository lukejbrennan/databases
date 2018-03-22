<html>
<head>

<html lang="en">


 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Nothing In the Fridge&trade;</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>



<body style = "margin:10; padding:0">

<br> <br>

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





<body>
<p><b>Thanks for adding a Recipe! </b></p>
<!-- Record recipe info--> 
<?php
	session_start();
	//RECORD DIRECTION INFORMATION//
	
	// Connecting, selecting database
	$link = mysqli_connect("127.0.0.1", "lbrenna4", "survival47", "characterlimit") or die('Could not connect: ' . mysql_error());
	mysqli_select_db($link, 'characterlimit') or die('Could not select database');
	for($x = 1; $x<3; $x++){
		/* create a prepared statement */
		if ($stmt = mysqli_prepare($link, "INSERT INTO directions (step_num, recipe_id, instruction_text)
			VALUES (?, ?, ?)")) {
			//Get Variables from HTML form
			$step_num= $x;
			$instruction_text= isset($_GET['instr'.$x]) ? $_GET['instr'.$x] : 'do nothing'; 	//$_GET["name"];"";
			/* bind parameters for markers */
			mysqli_stmt_bind_param($stmt, "iis", $step_num, $_SESSION['recipe_id'], $instruction_text);
			/* execute query */
			mysqli_stmt_execute($stmt);
			
			/* close statement */
			mysqli_stmt_close($stmt);
		}	
		
	}

	/* close connection */
	mysqli_close($link);
?>

</body>
</html>
