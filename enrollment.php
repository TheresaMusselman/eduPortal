<?php
    error_reporting(E_ALL^E_NOTICE);
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: login.php");
		exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enrollment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'master.php';?>

<div class="container text-center custom-container">
        <h1>Course Enrollment</h1>
	</div>
	<div class="container text-left ">
        <form action="enrollmentBackend.php" method="POST">
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
                <label for="courseID">Course Number:</label>
                <input type="text" class="form-control" name="courseID" required>
            </div>
			<div class="form-group">
				<label for="status">If the course is full, select this option to be added to the waitlist:</label>
				<input type="checkbox" id="role" name="role" value="student">
			</div>
			<div>
			<button type="submit" class="submit-btn">Submit</button>
			</div>
			
			<footer>
			<?php require 'footer.php';?>
			</footer>
</body>

</html>