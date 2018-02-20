<?php
/**********************************************************
* File: view_cars.php
* Author: Jeremy Taylor
* 
* Description: This file queries a
*   PostgreSQL database from PHP.
***********************************************************/
include "database.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car and Driver List</title>
</head>

<body>
<div>

<h1>Driver Information</h1>
    
<p>>This page demonstrates the successful creation of the cars database. See who the drivers are below.</p>

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
	echo '<strong>' . $row['first_name'] . ' ' . $row['last_name'] . ' ';
	echo $row['birthdate'] . '</strong>'  . ' ' . $row['license'];
	echo '</p>';
}
?>
    
    <p>To see the cars and their owners, please visit the <a href="owners.php">next page</a>.</p>


</div>

</body>
</html>