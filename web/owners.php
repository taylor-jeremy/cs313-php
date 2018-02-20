<?php
/**********************************************************
* File: owners.php
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
    
<p>Here are the cars. You can also insert data here.</p>

<?php
$statement = $db->prepare("SELECT year, make, model, (SELECT CONCAT(first_name, ' ', last_name) FROM driver WHERE driver.id = car.driver_id) AS driver FROM car ORDER BY make, model");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	echo '<p>';
	echo '<strong>' . $row['year'] . ' ' . $row['make'] . ' ' . $row['model'] . ' is owned by ';
    echo $row['driver'];
	echo '</p>';
}
?>
    
    <p>To see the drivers, go to the <a href="view_cars.php">previous page</a>.</p>


</div>
    
<div>

<h2>Enter New Cars</h2>

<form id="mainForm" action="insertCar.php" method="POST">

	<input type="text" id="txtYear" name="txtYear">
	<label for="txtYear">Year</label>
	<br /><br />

	<input type="text" id="txtMake" name="txtMake">
	<label for="txtMake">Make</label>
	<br /><br />

	<input type="text" id="txtModel" name="txtModel">
	<label for="txtModel">Model</label>
	<br /><br />

	<input type="text" id="txtFirstName" name="txtFirstName">
	<label for="txtModel">Model</label>
	<br /><br />
    
    <input type="text" id="txtLastName" name="txtLastName">
	<label for="txtModel">Model</label>
	<br /><br />

<!--<?php
// This section will now generate the available check boxes for topics
// based on what is in the database
// As before, it would be better to break this out into a separate function
// in a separate file, that handled the DB interaction, and returned
// a list of topics. But to keep things as clear as possible we can
// also query and loop through the results, right here.
try
{
	// Notice that we do not use "SELECT *" here. It is best practice
	// to only bring back the fields that you need.
	// prepare the statement
	$statement = $db->prepare('SELECT id, name FROM topic');
	$statement->execute();
	// Go through each result
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$id = $row['id'];
		$name = $row['name'];
		// Notice that we want the value of the checkbox to be the id of the label
		echo "<input type='checkbox' name='chkTopics[]' id='chkTopics$id' value='$id'>";
		// Also, so they can click on the label, and have it select the checkbox,
		// we need to use a label tag, and have it point to the id of the input element.
		// The trick here is that we need a unique id for each one. In this case,
		// we use "chkTopics" followed by the id, so that it becomes something like
		// "chkTopics1" and "chkTopics2", etc.
		echo "<label for='chkTopics$id'>$name</label><br />";
		// put a newline out there just to make our "view source" experience better
		echo "\n";
	}
}
catch (PDOException $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error connecting to DB. Details: $ex";
	die();
}
?>-->

	<br />

	<input type="submit" value="Add to Database" />

</form>


</div>


</body>
</html>