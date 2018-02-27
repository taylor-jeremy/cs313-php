<?php
/**********************************************************
* File: insert-car.php
* Author: Jeremy Taylor
* 
* Description: Takes input posted from owners.php
*   This file enters a new car into the database
*   along with its associated topics.
*
*   This file does NOT do any rendering at all,
*   instead it redirects the user to owners.php to see
*   the resulting list.
***********************************************************/
// get the data from the POST
$year = $_POST['txtYear'];
$make = $_POST['txtMake'];
$model = $_POST['txtModel'];
$color = $_POST['txtColor'];
$vin = $_POST['txtVin'];
$mileage = $_POST['txtMileage'];
$driverId = $_POST['txtDriverId'];
//$carIds = $_POST['chkCars'];
// For debugging purposes, you might include some echo statements like this
// and then not automatically redirect until you have everything working.
// echo "year=$year\n";
// echo "make=$make\n";
// echo "model=$model\n";
// echo "color=$color\n";
// echo "vin=$vin\n";
// echo "mileage=$mileage\n";
// echo "driverId=$driverId\n";
// we could (and should!) put additional checks here to verify that all this data is actually provided
require("dbConnect.php");
$db = get_db();
try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO car(year, make, model, color, vin, mileage, driverId) VALUES(:year, :make, :model, :color, :vin, :mileage, :(SELECT id FROM driver WHERE license = 987568))';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':year', $year);
	$statement->bindValue(':make', $make);
	$statement->bindValue(':model', $model);
	$statement->bindValue(':color', $color);
    $statement->bindValue(':vin', $vin);
    $statement->bindValue(':mileage', $mileage);
    $statement->bindValue(':driverId', $color);
	$statement->execute();
	/*// get the new id
	$scriptureId = $db->lastInsertId("card_id_sequence");
	// Now go through each topic id in the list from the user's checkboxes
	foreach ($carIds as $carId)
	{
		echo "CarId: $carId, driverId: $driverId";
		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');
		// Then, bind the values
		$statement->bindValue(':scriptureId', $scriptureId);
		$statement->bindValue(':topicId', $topicId);
		$statement->execute();
	}*/
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
// finally, redirect them to a new page to actually show the topics
header("Location: showTopics.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>