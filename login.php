<?php
   include "Utils/Validation.php";
   include "Config.php";
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login - <?=SITE_NAME?></title>
      <link rel="stylesheet" 
         type="text/css" 
         href="Assets/css/login-signup.css">
      <link rel="icon" type="image/x-icon" href="favicon.ico">
   </head>
   <body>
      <!-- Back Button with Image -->
      <a href="javascript:history.back()" class="back-btn">
      <img src="Assets/img/back-button-svgrepo-com.svg" alt="Back">Back
      </a>
      <!--  F444ff#f -->
      <div class="wrapper">
         <div class="form-holder">
            <div class="logo">
               <img src="assets/img/Logo.png">
               <h2>SIGN IN</h2>
            </div>
            <?php 
               if (isset($_GET['error'])) { ?>
            <p class="error"><?=Validation::clean($_GET['error'])?></p>
            <?php } ?>
            <form class="form"
               action="Action/login.php" 
               method="POST">
               <div class="form-group">
                  <label>Username</label>
                  <input type="text" 
                     name="username"
                     placeholder="User name"
                     value="elias17">
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" 
                     name="password"
                     placeholder="Password"
                     value="Test@pass1">
               </div>
               <div class="form-group">
                  <label>Role:</label><br />
                  <select name="role">
                     <option value="Admin">Admin</option>
                     <option value="Instructor">Instructor</option>
                     <option value="Student">Student</option>
                  </select>
               </div>
               <br />
               <div class="form-group">
                  <button type="submit">Login</button>
               </div>
               <div class="form-group">
                  <p class="links">
                     Don't have an account? <a href="signup.php">Sign Up</a>
                     <span class="separator">|</span>
                     <a href="index.php">Home</a>
                  </p>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>