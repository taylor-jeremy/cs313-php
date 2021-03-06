<?php
//start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cart</title>
	<meta name="description" content="product cart">
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
	<header id="page_header">
		<figure><img src="img/logo.png" alt="logo"></figure> <!-- Logo made with Flower graphic by <a href="undefined">undefined</a> from <a href="https://logomakr.com/">Logomakr</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Check out the new logo that I created on <a href="http://logomakr.com" title="Logo Makr">LogoMakr.com</a> https://logomakr.com/6nuXey-->
		<h1>Cart</h1>
	</header>
	<nav>
        <ul id="mainmenu">
    	<li class="active"><a href="browse.php">Browse Products</a></li>
    	<li><a href="cart.php">View Cart</a></li>
		</ul>
    </nav>
	<main>
		<form action="" method="post">
			<p>Browse your favorite vegetables here:</p>

			Vegetables:<br />
			<input type="radio" name="vegetable" value="Carrot" id="vegetable-carrot"><label for="vegetable-carrot">Carrots</label><br />
			<input type="radio" name="vegetable" value="Celery" id="vegetable-celery"><label for="vegetable-celery">Celery</label><br />
			<input type="radio" name="vegetable" value="Cucumber" id="vegetable-cucumber"><label for="vegetable-cucumber">Cucumbers</label><br />
			<input type="radio" name="vegetable" value="Squash" id="vegetable-squash"><label for="vegetable-squash">Squash</label><br />
			<br />

			<input type="submit" name="Submit" value="Add to Cart">
		</form>
		<?php
			if (isset($_POST['Submit'])) {
				if(!array_key_exists("choices", $_SESSION)) {
					$_SESSION["choices"] = array();
				}
				array_push($_SESSION["choices"], $_POST["vegetable"]);
			}
			if(array_key_exists("choices", $_SESSION)) {
                    echo implode("+", $_SESSION["choices"]);
                }
            if(isset($_POST['Submit'])) {
                    if(array_key_exists("choices", $_SESSION)) {
                        $expression = implode("+", $_SESSION["choices"]);
                        eval( '$result = (' . $expression . ');' );
                        echo "You added" . $result . to your cart;
                    }
                }
		?>
	</main>
        <p>&copy; <?php echo date("Y"); ?> Jeremy Taylor. All rights reserved.</p>
    </footer>
</body>
</html>