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

	// Connecting, selecting database
	$link = mysqli_connect('localhost', 'tweninge', 'pw') or die('Could not connect: ' . mysql_error());
	mysqli_select_db($link, 'tweninge') or die('Could not select database');
	echo 'Connected successfully';

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