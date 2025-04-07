<?php
    error_reporting(E_ALL^E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infinite Academy Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'master.php';?>
<div class="container text-center custom-container">
		<h2>Education Portal Login</h2> <br><br>
		<h4>Please enter your unique student ID and Password:</h4> <br> <br>
		<form action="processLogin.php" method="POST">
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required><br><br>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required><br><br>
			<input type="submit" value="Login">
		</form>
	</div>
<?php require 'footer.php';?>	
</body>
</html>