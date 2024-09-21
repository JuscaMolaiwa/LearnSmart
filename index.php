<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="LearnSmart - an online learning platform for learners and instructors.">
      <meta name="keywords" content="online learning, education, courses, LearnSmart">
      <title>LearnSmart - Online Learning System</title>
      <link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
      <link rel="icon" type="image/x-icon" href="favicon.ico">
   </head>
   <body>
      <section class="section-1 home-p">
         <div class="overl">.</div>
         <header>
            <h2 class="logo">
               <img src="assets/img/Logo.png" alt="LearnSmart Logo">
               <span>LearnSmart</span>
            </h2>
            <nav role="navigation">
               <a href="index.php" class="active">Home</a>
               <a href="about.php">About</a>
               <a href="signup.php">Sign Up</a>
               <a href="login.php">Login</a>
            </nav>
         </header>
         <div class="video-slideshow">
            <video class="slide" src="Assets/vids/learn-online.mp4" autoplay muted loop></video>
            <video class="slide" src="Assets/vids/learn-online1.mp4" autoplay muted loop></video>
         </div>
         <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
         <button class="next" onclick="changeSlide(1)">&#10095;</button>
      </section>
      <main>
         <section class="section-2">
            <h1>Welcome to LearnSmart</h1>
            <p>
               Welcome to our Online Learning System, where knowledge meets accessibility. Our platform is crafted to empower learners, instructors, and administrators with the tools they need for a dynamic and enriching educational experience.
            </p>
            <h1>For Learners:</h1>
            <p>
               Embark on your learning journey with ease. Browse through a diverse range of courses, enroll effortlessly, and track your progress in real-time. Engage with fellow learners through discussion forums, share insights, and earn certificates as a testament to your accomplishments.
            </p>
            <h1>For Instructors:</h1>
            <p>
               Shape the future of education by creating captivating courses. Our instructor version provides an intuitive environment for content creation, quiz management, and grading. Stay connected with your students through forums, monitor their progress, and witness the impact of your expertise.
            </p>
            <p>
               At the heart of our platform is a commitment to fostering a collaborative and interactive learning experience. Join us on this educational adventure, where knowledge knows no bounds. Welcome to a world of learning at your fingertips.
            </p>
         </section>
      </main>
      <footer class="main-footer">
         <h4>RCD2013C - LearnSmart&copy;2024</h4>
      </footer>
      <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script>
         $(function() {
         	$(window).on('scroll', function() {
         		if ($(window).scrollTop()) {
                        $("header").addClass('bgc');
         		} else {
                        $("header").removeClass('bgc');
         		}
         	});
         });
         
         const slides = document.querySelectorAll('.slide');
         let currentSlide = 0;
         const totalSlides = slides.length;
         const homePage = document.querySelector('.home-p');
         let slideInterval;
         
         // Function to show the current slide
         function showSlide(index) {
         slides.forEach((slide, i) => {
         slide.classList.toggle('active', i === index);
         });
         updateButtons();
         }
         
         // Function to change slide with next/prev buttons
         function changeSlide(n) {
         currentSlide = (currentSlide + n + totalSlides) % totalSlides;
         showSlide(currentSlide);
         }
         
         // Update button visibility
         function updateButtons() {
         const prevButton = document.querySelector('.prev');
         const nextButton = document.querySelector('.next');
         
         prevButton.style.display = currentSlide === 0 ? 'none' : 'block';
         nextButton.style.display = currentSlide === totalSlides - 1 ? 'none' : 'block';
         }
         
         // Start the slideshow
         function startSlideshow() {
         slideInterval = setInterval(() => {
         currentSlide = (currentSlide + 1) % totalSlides;
         showSlide(currentSlide);
         
         // If the last slide is reached, reset to home
         if (currentSlide === 0) {
            stopSlideshow();
            resetToHomePage();
         }
         }, 15000);
         }
         
         // Stop the slideshow
         function stopSlideshow() {
         clearInterval(slideInterval);
         }
         
         // Function to reset to the home page with the background image
         function resetToHomePage() {
         // Hide all slides
         slides.forEach(slide => slide.classList.remove('active'));
         // Set the background image for the home page
         document.querySelector('.home-p') = 'url("../img/learn.jpg")';
         }
         
         // Initial setup
         showSlide(currentSlide);
         updateButtons();
         startSlideshow();
         
      </script>
   </body>
</html>