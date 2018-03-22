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




<p>Directions: </p>
<!-- Record recipe info--> 

<?php
	session_start();
	//RECORD INGREDIENT INFORMATION//
	// Connecting, selecting database
	$link = mysqli_connect("127.0.0.1", "lbrenna4", "survival47", "characterlimit") or die('Could not connect: ' . mysql_error());
	mysqli_select_db($link, 'characterlimit') or die('Could not select database');

	for($x = 1; $x<3; $x++){
		/* create a prepared statement */
		if ($stmt = mysqli_prepare($link, "INSERT INTO ingredients (name, recipe_id, quantity)
			VALUES (?, ?, ?)")) {
			//Get Variables from HTML form
			$name		= isset($_GET['ing'.$x.'N']) ? $_GET['ing'.$x.'N'] : ''; 	//$_GET["name"];
			$quantity 	= 1; //isset($_GET['ing'.$x.'A']) ? $_GET['ing'.$x.'A'] : 0; 	//$_GET["name"];"";
			
			/* bind parameters for markers */
			mysqli_stmt_bind_param($stmt, "sii", $name, $_SESSION['recipe_id'], $quantity);
			/* execute query */
			mysqli_stmt_execute($stmt);
			
			/* close statement */
			mysqli_stmt_close($stmt);
		}	
		
	}
	
	

	/* close connection */
	mysqli_close($link);
?>

<form action="insert_endPage.php" method="get">
	Instruction 1:
	<br></br>
	<input type="text" name="instr1" id="instr1"></input>
	<br></br>
	Instruction 2:
	<br></br>
	<input type="text" name="instr2" id="instr2"></input>
	<br></br>
    Instruction 3:
	<br></br>
	<input type="text" name="instr3" id="instr3"></input>
	<br></br>
    Instruction 4:
	<br></br>
	<input type="text" name="instr4" id="instr4"></input>
	<br></br>
    Instruction 5:
	<br></br>
	<input type="text" name="instr5" id="instr5"></input>
	<br></br>
    Instruction 6:
	<br></br>
	<input type="text" name="instr6" id="instr6"></input>
	<br></br>
    Instruction 7:
	<br></br>
	<input type="text" name="instr7" id="instr7"></input>
	<br></br>
    Instruction 8:
	<br></br>
	<input type="text" name="instr8" id="instr8"></input>
	<br></br>
    Instruction 9:
	<br></br>
	<input type="text" name="instr9" id="instr9"></input>
	<br></br>
    Instruction 10:
	<br></br>
	<input type="text" name="instr10" id="instr10"></input>
	<br></br>
	
	<input type="submit" name="submit_directions" value="Next"></input>
</form>

</body>
</html>
