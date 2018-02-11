<?php
/**********************************************************
* File: view_cars.php
* Author: Jeremy Taylor
* 
* Description: This file queries a
*   PostgreSQL database from PHP.
***********************************************************/
// It would be better to store these in a different file
$dbUser = 'postgres';
$dbPassword = 'student';
$dbName = 'carsdb';
$dbHost = 'localhost';
$dbPort = '5433';
try
{
	// Create the PDO connection
	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex)
{
	// If this were in production, you would not want to echo
	// the details of the exception.
	echo "Error connecting to DB. Details: $ex";
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car and Driver List</title>
</head>

<body>
<div>

<h1>Car and Driver Information</h1>

<?php
$statement = $db->prepare("SELECT first_name, last_name, birthdate, license FROM driver");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	echo '<p>';
	echo '<strong>' . $row['first_name'] . ' ' . $row['last_name'];
	echo $row['birthdate'] . '</strong>' . $row['license'];
	echo '</p>';
}
?>


</div>

</body>
</html>