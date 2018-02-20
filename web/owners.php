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
	<title>Car List: View, Insert, Update, Delete</title>
</head>

<body>
<div>

<h1>Driver Information</h1>
    
<p>Here are the drivers along with their cars. You can also insert, update, and delete data.</p>

<?php
$statement = $db->prepare("SELECT first_name, last_name FROM driver; SELECT year, make, model FROM car WHERE car.driver_id = driver.id;");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	echo '<p>';
	echo '<strong>' . $row['first_name'] . ' ' . $row['last_name'] . ' drives a ' . $row['year'];
	echo ' ' . $row['make'] . $row['model'];
	echo '</p>';
}
?>
    
    <p>To see the cars and their owners and update/delete/insert data, please visit the <a href="owners.php">next page</a>.</p>


</div>

</body>
</html>