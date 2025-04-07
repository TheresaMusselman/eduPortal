<?php
    error_reporting(E_ALL^E_NOTICE);
    if(session_status() == PHP_SESSION_NONE){
		ini_set('session.use_only_cookies', '1');
		session_start();
	}
    if (isset($_SESSION['username'])) {
        echo "Welcome: " . $_SESSION['username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
     <div class="jumbotron">
        <div class="container text-center">
            <h1 class="school-header">Infinite Academy</h1>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Infinite Academy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><span class="bi bi-house"></span> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php"><span class="bi bi-info-circle"></span> Courses</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<?php
					if (isset($_SESSION['username'])) {
						// Show navigation options for logged-in users
						echo '<li class="nav-item"><a class="nav-link" href="profile.php"><span class="bi bi-person-badge"></span> Profile</a></li>';
						echo '<li class="nav-item"><a class="nav-link" href="enrollment.php"><span class="bi bi-telephone"></span> Enrollment</a></li>';
						echo '<li class="nav-item">
								<a href="logout.php" class="nav-link" style="text-decoration:none; color:white;">
									<span class="bi bi-box-arrow-right"></span> Logout
								</a>
							  </li>';

					} else {
						// Show navigation options for guests
						echo '<li class="nav-item"><a class="nav-link" href="login.php"><span class="bi bi-person"></span> Login</a></li>';
						echo '<li class="nav-item"><a class="nav-link" href="registration.php"><span class="bi bi-pencil"></span> Registration</a></li>';
					}
					?>
				</ul>


            </div>
        </div>
    </nav>    

</body>
</html>

