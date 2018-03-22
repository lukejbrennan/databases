Database Design: 
-no anomalies
-avoid info loss
-preserve dependencies


create table recipes(
  name varchar(40),
  id int primary key AUTO_INCREMENT,
  tot_calories int,
  tot_price int, 
  prep_time varchar(40),
  cook_time varchar(40),
  tot_time varchar(40),
  servings int,
  tips varchar(1024),
  avg_rating int,
  is_deleted bool not null default false
);


make the doubles go to ints! easier...

create table ingredients(
  name varchar(40), 
  recipe_id int,
  quantity int,
  primary key(name, recipe_id),
  is_deleted bool not null default false
);

create table directions(
  step_num int,
  recipe_id int,
  instruction_text varchar(512),
  primary key(step_num, recipe_id),
  is_deleted bool not null default false
);


****netid_agedb.php****
<html>
<head>
<title>Age</title>
</head>
<body>
<p> Here is the age data: </p>
<?php
// Connecting, selecting database
$link = mysqli_connect('localhost', 'tsammons', 'cse30246')
 or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysqli_select_db($link, 'tsammons') or die('Could not select database');
// Performing SQL query
$query = 'SELECT * FROM user_age';
$result = mysqli_query($link, $query) or die('Query failed: ' . mysql_error());
// Printing results in HTML
echo "<table>\n";
while ($tuple = mysqli_fetch_array($result, MYSQL_ASSOC)) {
 echo "\t<tr>\n";
 foreach ($tuple as $col_value) {
 echo "\t\t<td>$col_value</td>\n";
 }
 echo "\t</tr>\n";
}
echo "</table>\n";
// Free resultset
mysqli_free_result($result);
// Closing connection
mysqli_close($link);
?>
</body>
</html>
****netid_agedbinsert.php****
<html>
<head>
<title>Age</title>
</head>
<body>
<p> Here is the age data: </p>
<?php
-1-
C:\Users\tweninge\Documents\courses\F17CSE30246\dbprogramming.txt Wednesday, September 6, 2017 11:58 AM
// Connecting, selecting database
$link = mysqli_connect('localhost', 'tweninge', 'pw')
 or die('Could not connect: ' . mysql_error());
mysqli_select_db($link, 'tweninge') or die('Could not select database');
echo 'Connected successfully';
/* create a prepared statement */
if ($stmt = mysqli_prepare($link, "INSERT INTO user_age (age) VALUES (?)")) {
 /* bind parameters for markers */
 mysqli_stmt_bind_param($stmt, "i", $_GET["age"]);
 /* execute query */
 mysqli_stmt_execute($stmt);
 /* close statement */
 mysqli_stmt_close($stmt);
}
/* create a prepared statement */
if ($stmt = mysqli_prepare($link, "SELECT age FROM user_age where age <= ?")) {
 /* bind parameters for markers */
 mysqli_stmt_bind_param($stmt, "i", $_GET["age"]);
 /* execute query */
 mysqli_stmt_execute($stmt);
/* bind result variables */
 mysqli_stmt_bind_result($stmt, $age);
echo "<table>\n";
 /* fetch values */
 while (mysqli_stmt_fetch($stmt)) {
echo "\t<tr>\n";
echo "\t\t<td>$age</td>\n";
echo "\t</tr>\n";
 }
echo "</table>\n";
 /* close statement */
 mysqli_stmt_close($stmt);
}
/* close connection */
mysqli_close($link);
?>
</body>
</html>


Using dsg1.crc.nd.edu
I am running Ubuntu 14.04 and Apache 2 and Mysql 5.6 and PHP 5
Log in -
cd /var/www/html/cse30246/tutorial
#go to dsg1.crc.nd.edu/cse30246/tutorial
#permission issues
#I have list directories on... this is typically not safe, but we'll allow it for just a little
while.
vim netid.php
***netid.php****
<html>
<head>
<title>You can haz Webpage too</title>
</head>
<body>
You can mix html with <?php echo '<b>PHP</b>' ?><br/>
Today's date is <?=date("m/d/Y")?>
</body>
</html>
****netid_js.html****
<html>
<head>
<script type="text/javascript">
document.write("Hello World!<br/><a href=\"http://nd.edu\">Test</a>")
</script>
</head>
<body>
</body>
</html>
****netid_age.php****
<html>
<body>
<form action="netid_ageaction.php" method="get">
Enter your age: <input type="textbox" name="age">
</form>
</body>
</html>
****netid_ageaction.php****
<?php
session_start();
if(isset($_SESSION['views']))
$_SESSION['views']=$_SESSION['views']+1;
else
$_SESSION['views']=1;
?>
<html>
 <head>
 <title>PHP Test</title>
 </head>
 <body>
<?php
$age = $_GET["age"];
?>
You are <?php echo $age; ?> years old.<br/>
-1-
C:\Users\tweninge\Documents\courses\F17CSE30246\webprogramming.txt Wednesday, September 6, 2017 11:58 AM
and you have visited this Web page <?php echo $_SESSION['views'];?> times.
 </body>
</html>