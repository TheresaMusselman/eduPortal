<?php
    error_reporting(E_ALL^E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Catalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'master.php';?>
<div class="container text-center mt-5 custom-container">
	<h1><em>🌟 Innovate, Analyze, Discover 🌟</em></h1>
</div>
	
<div class="container custom-container checkbox-container">
	<h4>Search Courses:</h4>  
	<form action="courseSearchBackend.php" method="GET">
		<div class="multiselect">
			<div class="multiselect-container">
				<button type="button" class="multiselect-btn" onclick="toggleDropdown('semesterDropdown')">Select Semester</button>
				<div id="semesterDropdown" class="dropdown-content">
					
					<label><input type="checkbox" name="items[]" value="Spring"> Spring</label>
					<label><input type="checkbox" name="items[]" value="Summer"> Summer</label>
					<label><input type="checkbox" name="items[]" value="Fall"> Fall</label>
				</div>
			</div>
			<div class="multiselect-container">
				<button type="button" class="multiselect-btn" onclick="toggleDropdown('departmentDropdown')">Select Department</button>
				<div id="departmentDropdown" class="dropdown-content">
					
					<label><input type="checkbox" name="items[]" value="Art"> Art</label>
					<label><input type="checkbox" name="items[]" value="Biology"> Biology</label>
					<label><input type="checkbox" name="items[]" value="Business"> Business</label>
					<label><input type="checkbox" name="items[]" value="Chemistry"> Chemistry</label>
					<label><input type="checkbox" name="items[]" value="Computer Science"> Computer Science</label>
					<label><input type="checkbox" name="items[]" value="English"> English</label>
					<label><input type="checkbox" name="items[]" value="Environmental Studies"> Environmental Studies</label>
					<label><input type="checkbox" name="items[]" value="Finance"> Finance</label>
					<label><input type="checkbox" name="items[]" value="Health"> Health</label>
					<label><input type="checkbox" name="items[]" value="Math"> Math</label>
					<label><input type="checkbox" name="items[]" value="Physics"> Physics</label>
					<label><input type="checkbox" name="items[]" value="Psychology"> Psychology</label>
					<label><input type="checkbox" name="items[]" value="Sociology"> Sociology</label>
				</div>	
			</div>
			<button type="submit" class="submit-btn">Submit</button>
		</div>
		<script>
			function toggleDropdown(dropdownId) {
				const dropdown = document.getElementById(dropdownId);
				dropdown.classList.toggle('show');
			}

			// Close dropdown if clicked outside
			window.addEventListener('click', function(event) {
				const dropdowns = document.querySelectorAll('.dropdown-content');
				dropdowns.forEach(dropdown => {
					if (!dropdown.contains(event.target) && !event.target.matches('.multiselect-btn')) {
						dropdown.classList.remove('show');
					}
				});
			});
		</script>
	</form>
</div>


<div class="container custom-container">
    <?php
    if (isset($_SESSION['searchResults'])) {
        $results = $_SESSION['searchResults'];
        unset($_SESSION['searchResults']); // Clear session variable

        if (!empty($results)) {
            echo "<table>";
            echo "<thead><tr><th>Course Name</th><th>Course Number</th><th>Semester</th><th>Description</th></tr></thead>";
            echo "<tbody>";
            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['courseName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['courseID']) . "</td>";
				echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
                echo "<td>" . htmlspecialchars($row['courseDescription']) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No courses found matching your criteria.</p>";
        }
    }

    if (isset($_SESSION['error'])){
        echo "<p>". $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }

    ?>
</div>
	<div class="container mt-5 custom-container">
		<div class="row">
			<div class="col-12">
			<h2 style="text-align:center;">Research Highlights (With Relevant Courses - Finalized)</h2>
			<h5 style="text-align:center;"><em>Prepare to expand your horizons—mathematically speaking!</em></h5>
			</div>
		</div>
			
		<div class="row mt-4">
			<div class="col-12">
			<h6>The College of Math isn’t just about equations; it’s where bold ideas converge, 
			groundbreaking discoveries unfold, and students prepare to make an exponential impact. 
			Here’s a look at our research focus areas and the courses that can help you chart your path to innovation:</h6>
				<div class="card mb-3">
					<div class="card-body">
						<h5 class="card-title">🌐 Topology and Geometry</h5>
						<p class="card-text">We’re delving into higher dimensions, exploring the nature 
						of shapes, spaces, and structures in ways that even Euclid couldn’t imagine. 
						From the mysteries of topological surfaces to applications in robotics and 
						physics, this field is endlessly intriguing.</p>
						<p>Relevant Courses:</p>
						<p>🔷 MATH401: Topology</p>
						<p>📐 MATH402: Combinatorics</p>
						<p>🔢 MATH403: Complex Analysis</p>
					</div>
				</div>
				
				<div class="card mb-3">
					<div class="card-body">
						<h5 class="card-title">🤖 Artificial Intelligence and Machine Learning</h5>
						<p class="card-text">From training algorithms to designing neural networks, 
						we’re using mathematics to drive the future of technology. 
						Whether it’s solving real-world problems or revolutionizing industries, 
						our work ensures AI’s foundation is functionally sound.</p>
						<p>Relevant Courses:</p>
						<p>💡 CSC201: Artificial Intelligence</p>
						<p>🔍 MATH302: Numerical Methods</p>
						<p>🧠 MATH103: Probability and Statistics</p>
					</div>
				</div>
				
				<div class="card mb-3">
					<div class="card-body">
						<h5 class="card-title">⚛️ Quantum Computing</h5>
						<p class="card-text">Harnessing the power of quantum mechanics, 
						we’re unlocking computation on a scale that could solve problems otherwise impossible 
						for classical machines. This research merges the abstract and applied to redefine 
						the limits of computational math.</p>
						<p>Relevant Courses:</p>
						<p>📊 PHY202: Quantum Mechanics</p>
						<p>🧮 MATH303: Real Analysis</p>
						<p>🖥️ CSC301: Scientific Computing</p>
					</div>
				</div>

				<div class="card mb-3">
					<div class="card-body">
						<h5 class="card-title">📈 Data Modeling and Prediction</h5>
						<p class="card-text">Turning chaos into order—this field applies statistics and mathematical 
						modeling to analyze patterns, predict outcomes, and deliver actionable insights in industries 
						ranging from finance to environmental science.</p>
						<p>Relevant Courses:</p>
						<p>💼 FIN201: Risk Analysis and Probability</p>
						<p>🌎 ENV102: Environmental Modeling</p>
						<p>📊 BUS201: Business Statistics</p>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require 'footer.php';?>
</body>
</html>