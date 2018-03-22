<html>
<head>


    <link href="https://fonts.googleapis.com/css?family=Khula" rel="stylesheet"> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Nothing In the Fridge&trade;</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style type="text/css">
	<!--
	.tab { margin-left: 40px; }
	-->
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
  <h2>Recipe Match</h2>
  

<?php
	session_start();	
	// Connecting, selecting database
	$link = mysqli_connect('localhost', 'dwilborn', 'emily310') or die('Could not connect: ' . mysql_error());
	// echo 'Connected successfully';
	mysqli_select_db($link, 'characterlimit') or die('Could not select database');

	$id= $_GET['id'];

	$recipequery = 'SELECT * FROM recipes where is_deleted = 0 AND id LIKE '.$id;
	$reciperesult = mysqli_query($link, $recipequery) or die('Query failed...: ' . mysql_error());

	$ingquery = 'SELECT * FROM ingredients where is_deleted = 0 AND recipe_id LIKE '.$id;
	$ingresult = mysqli_query($link, $ingquery) or die('Query failed...: ' . mysql_error());
	$dirquery = 'SELECT * FROM directions where is_deleted = 0 AND recipe_id LIKE '.$id;
	$dirresult = mysqli_query($link, $dirquery) or die('Query failed...: ' . mysql_error());

	$recipe = mysqli_fetch_array($reciperesult, MYSQL_ASSOC);
	// Performing SQL query. Returns Recipes that include Recipe name
	foreach ($recipe as $key => $value) {
                                //echo          "<p class=\"list-group-item-text\">$key: $value</p>";                         
                                if(empty($value)) {
                                        continue;
                                } else {    
                                        if($key == "name") {
                                                echo            "<p class=\"list-group-item-text\"><b>$value</b></p>";                
                                        } elseif($key == "id") {
                                                continue; 
                                        } elseif($key == "tot_calories") {
                                                echo            "<p class=\"list-group-item-text\">Calorie Count: $value</p>";                
                                        } elseif($key == "tot_price") {
                                                echo            "<p class=\"list-group-item-text\">Price: $value</p>";                        
                                        } elseif($key == "prep_time") {
                                                echo            "<p class=\"list-group-item-text\">Preparation Time: $value</p>";             
                                        } elseif($key == "cook_time") {
                                                echo            "<p class=\"list-group-item-text\">Cook Time: $value</p>";                    
                                        } elseif($key == "tot_time") {
                                                echo            "<p class=\"list-group-item-text\">Total Time: $value</p>";                   
                                        } elseif($key == "servings") {
                                                echo            "<p class=\"list-group-item-text\">Servings: $value</p>";                     
						echo "<p class=\"list-group-item-text\">Ingredients</p>";
					while ($ingredient = mysqli_fetch_array($ingresult, MYSQL_ASSOC)){
	foreach ($ingredient as $key => $value){
		if(empty($value)){
			continue;
		} else {
			if($key =="name"){
                                                echo            "<p class=\"tab\">$value</p>";                     
				
			}
		}
	}
}
						
						echo "<p class=\"list-group-item-text\">Directions</p>";
					while ($direction= mysqli_fetch_array($dirresult, MYSQL_ASSOC)){
	foreach ($direction as $key => $value){
		if(empty($value)){
			continue;
		} else {
			if($key =="instruction_text"){
                                                echo            "<p class=\"tab\">$value</p>";                     
				
			}
		}
	}
}
                                        } elseif($key == "tips") {
                                                echo            "<p class=\"list-group-item-text\">Tips: $value</p>";                         
                                        } elseif($key == "avg_rating") {
                                                echo            "<p class=\"list-group-item-text\">Rating: $value</p>";
                                        }
                                }
                }

?>


</div>




</body>
</html>
