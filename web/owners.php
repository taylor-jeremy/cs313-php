<?php
/**********************************************************
* File: owners.php
* Author: Jeremy Taylor
* 
* Description: This is the PHP file that the user starts with.
*   It has a form to enter a new scripture and topic.
*   It posts to the insertTopic.php page.
***********************************************************/
// The DB connection logic is in another file so it can be included
// in each of our different PHP files.
require("db-connect.php");
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

<form id="mainForm" action="insert-car.php" method="POST">

	<input type="text" id="txtYear" name="txtYear">
	<label for="txtYear">Year</label>
	<br /><br />

	<input type="text" id="txtMake" name="txtMake">
	<label for="txtMake">Make</label>
	<br /><br />

	<input type="text" id="txtModel" name="txtModel">
	<label for="txtModel">Model</label>
	<br /><br />
    
    <input type="text" id="txtColor" name="txtColor">
    <label for="txtColor">Color</label>
    <br /><br />
    
    <input type="text" id="txtVin" name="txtVin">
    <label for="txtVin">VIN</label>
    <br /><br />
    
    <input type="text" id="txtMileage" name="txtMileage">
    <label for="txtMileage">Mileage</label>
    <br /><br />
    
    <input type="hidden" id="txtDriverId" name="txtDriverId" value="">


	<br />

	<input type="submit" value="Add to Database" />

</form>


</div>


</body>
</html>