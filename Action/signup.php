<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../Utils/Validation.php";
include "../Utils/Util.php";
include "../Database.php";
include "../Models/Student.php";

session_start();  // Start the session to manage user sessions

if ($_SERVER['REQUEST_METHOD'] == "POST") {

   // Clean inputs
   $username      = Validation::clean($_POST["username"]);
   $first_name    = Validation::clean($_POST["fname"]);
   $last_name     = Validation::clean($_POST["lname"]);
   $email         = Validation::clean($_POST["email"]);
   $date_of_birth = Validation::clean($_POST["date_of_birth"]);
   $password      = Validation::clean($_POST["password"]);
   $re_password   = Validation::clean($_POST["re_password"]);
    
   $data = "fname=".$first_name."&uname=".$username."&email=".$email."&bd=".$date_of_birth."&lname=".$last_name;

   // Perform validations
   if (!Validation::name($first_name)) {
      $em = "Invalid first name";
      Util::redirect("../signup.php", "error", $em, $data);
   } elseif (!Validation::name($last_name)) {
      $em = "Invalid last name";
      Util::redirect("../signup.php", "error", $em, $data);
   } elseif (!Validation::username($username)) {
      $em = "Invalid user name";
      Util::redirect("../signup.php", "error", $em, $data);
   } elseif (!Validation::email($email)) {
      $em = "Invalid email";
      Util::redirect("../signup.php", "error", $em, $data);
   } elseif (!Validation::password($password)) {
      $em = "Invalid password";
      Util::redirect("../signup.php", "error", $em, $data);
   } elseif (!Validation::match($password, $re_password)) {
      $em = "Passwords do not match";
      Util::redirect("../signup.php", "error", $em, $data);
   } else {
      // All validations passed, proceed to database interactions
      $db = new Database();
      $conn = $db->connect();
      $user = new Student($conn);

      if ($user->is_username_unique($username)) {
         // Password hashing
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

		 // Insert the user data into the database
         $user_data = [$username, $first_name, $last_name, $email, $date_of_birth, $hashed_password];
         $res = $user->insert($user_data);

         if ($res) {
			 // User registration successful
			 $Student = new Student($conn);
			 $student_data = $Student->getData();
			 $_SESSION['username'] = $student_data['username'];
			 $_SESSION['student_id'] = $student_data['student_id']; // Store the student ID
			 $_SESSION['role'] = "Student";  // Set the role in the session
            
            $sm = "Successfully registered!";
            Util::redirect("../Student/Course.php", "success", $sm);
         } else {
            $em = "An error occurred during registration";
            Util::redirect("../signup.php", "error", $em, $data);
         }
      } else {
         // Username already taken
         $em = "The username ($username) is already taken";
         Util::redirect("../signup.php", "error", $em, $data);
      }
      // Close the database connection
      $conn = null;
   }

} else {
   // If request method is not POST
   $em = "An error occurred";
   Util::redirect("../signup.php", "error", $em);
}
