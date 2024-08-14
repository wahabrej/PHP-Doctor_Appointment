<?php
 session_start();
 include "nav.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Dhaka's Doctors</title>
   
   <link rel="stylesheet" type="text/css" href="home_page.css">
</head>
<body>
   <!-- Marquee Section -->
   <div style="background-color: #343a40; color: white; text-align: center; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
      <marquee direction="right">All Doctors in Dhaka City</marquee>
   </div>

   <!-- Slider Section -->
   <div class="slider"></div>

   <!-- Welcome Section -->
   <div class="myDiv" style="margin-top: 50px;">
      <h2 style="font-size: 36px; font-weight: bold;">Welcome to Doctor's Appointment System</h2>
      <p><a href="doctor.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px;">FIND DOCTORS</a></p>
   </div>

   <!-- Footer -->
   <?php include "footer.html"; ?>
</body>
</html>
