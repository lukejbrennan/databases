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



<center> <h1>  Add a new recipe! </h1>  </center>

<br> <br>

<div class="panel panel-default" style="width:25%; margin-left:37.5%">
	
	<div class="panel-body">


<h3> Your Recipe: </h3>

<form action="insert_ingredients.php" method="get">
	Recipe name:
	<br></br>
	<input type="text" name="name" id="name"></input>
	<br></br>
	Calories:
	<br></br>
	<input type="text" name="tot_calories" id="tot_calories"></input>
	<br></br>
	Estimated Price:
	<br></br>
	<input type="text" name="tot_price" id="tot_price"></input>
	<br></br>
	Prepatation Time:
	<br></br>
	<input type="text" name="prep_time" id="prep_time"></input>
	<br></br>
	Cooking Time:
	<br></br>
	<input type="text" name="cook_time" id="cook_time"></input>
	<br></br>
	Servings:
	<br></br>
	<input type="text" name="servings" id="servings"></input>
	<br></br>
	Any Tips?
	<br></br>
	<input type="text" name="tips" id="tips"></input>
	<br></br>
	<input type="submit" name="submit_recipes" value="Next"></input>
</form>

	</div>
</div>

</body>
</html>
