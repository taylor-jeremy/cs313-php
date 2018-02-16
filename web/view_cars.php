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