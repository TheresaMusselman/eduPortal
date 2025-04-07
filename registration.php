<?php
    error_reporting(E_ALL^E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'master.php';?>
<div class="container text-center custom-container">
        <h1>Registration</h1>
	</div>
	<div class="container text-left ">
        <form action="process_registration.php" method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" name="lastName" required>
            </div>
			<div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
			<div class="form-group">
				<label for="role">I am a student:</label>
				<input type="checkbox" id="role" name="role" value="student" required>
			</div>
				<button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
<?php require 'footer.php';?>
</body>
</html>