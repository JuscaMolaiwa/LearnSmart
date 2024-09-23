<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="About LearnSmart - an online learning platform for learners and instructors.">
	<meta name="keywords" content="LearnSmart, online learning, education, platform">
	<title>About - LearnSmart</title>
	<link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <section class="section-1 about-p">
    	<div class="overl">.</div>
    	<header>
    		<h2 class="logo">
    		  <img src="assets/img/Logo.png" alt="LearnSmart Logo">
    		  <span>LearnSmart</span>
        </h2>
	    	<nav>
	    		<a href="index.php">Home</a>
	    		<a href="about.php" class="active">About</a>
	    		<a href="signup.php">Sign Up</a>
	    		<a href="login.php">Login</a>
	    	</nav>
    	</header>
    </section>
    <main>
        <section class="section-2">
        	<h1 style="text-align: center;">
        		<img src="assets/img/Logo.png" alt="LearnSmart Logo"><br>
        		About LearnSmart 
        	</h1>
        	<p>
			Discover LearnSmart - your gateway to accessible and engaging online education. Our platform is designed to empower learners, instructors, and administrators with user-friendly tools for a dynamic learning experience. Join us to explore a wide variety of courses, connect with a vibrant educational community, and achieve your academic goals.
        	</p>
        	<h1>Empower Your Learning</h1>
        	<p>
        		- Enable users to easily navigate and explore available courses.<br>
        		- Streamline the course enrollment process for a hassle-free experience.<br>
        		- Provide an intuitive dashboard for tracking course progress, achievements, and certificates.<br>
        		- Implement responsive design for optimal user experience across devices.<br>
        		- Foster engagement through discussion forums, ratings, and reviews.<br>
        		- Offer instructors a straightforward interface for course creation and content management.<br>
        		- Provide tools for quiz and assignment creation, as well as grading functionalities.<br>
        		- Enable instructors to view and analyze user progress and quiz performance.<br>
        		- Facilitate the generation of certificates for course completion.<br>
        		- Support effective communication through discussion forums.<br>
        	</p>
        </section>
    </main>
    <footer class="main-footer">
      <h4>RCD2013C - LearnSmart&copy;2024</h4>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
    	$(document).ready(function() {
    		$(window).on('scroll', function() {
    			if ($(window).scrollTop()) {
                    $("header").addClass('bgc');
    			} else {
                    $("header").removeClass('bgc');
    			}
    		});
    	});
    </script>
</body>
</html>
