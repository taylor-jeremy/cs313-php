<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Browse Items</title>
	<meta name="description" content="product browsing">
    <meta name="author" content="Jeremy Taylor">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Reset CSS Styles -->
    <link href="css/reset.css" rel="stylesheet">
    <!-- New CSS Styles -->
    <link href="css/phone-default.css" rel="stylesheet">
    <link href="css/tablet.css" rel="stylesheet">
    <link href="css/desktop.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
</head>
<body>
	<?php
	// define variables and set to empty values
	$vegetableErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["vegetable"])) {
			$vegetableERR = "You must choose a vegetable";
		} else {
			$vegetable = test_input($_POST["vegetable"]);
		}
	}
	$products=array("");
	$_SESSION['choices']=$products;
	?>
	<header id="page_header">
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/web/shopping/modules/header.php'; ?>
	</header>
	<nav>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/web/shopping/modules/nav.php'; ?>
    </nav>
	<main>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<p>Browse your favorite vegetables here:</p>

			Vegetables:<br />
			<input type="radio" name="vegetable" value="Carrot" id="vegetable-carrot"><label for="vegetable-carrot">Carrots</label><br />
			<input type="radio" name="vegetable" value="Celery" id="vegetable-celery"><label for="vegetable-celery">Celery</label><br />
			<input type="radio" name="vegetable" value="Cucumber" id="vegetable-cucumber"><label for="vegetable-cucumber">Cucumbers</label><br />
			<input type="radio" name="vegetable" value="Squash" id="vegetable-squash"><label for="vegetable-squash">Squash</label><span class="error">* <?php echo $vegetableErr;?></span><br />
			<br />

			<input type="submit" value="Add to Cart">
		</form>

		<?php
		echo '<script type="text/javascript">';
		echo 'alert("You have added " + $vegetable to your cart")';
		echo '</script>';
		?>
	</main>
	<footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/web/shopping/modules/footer.php'; ?>
    </footer>
</body>
</html>