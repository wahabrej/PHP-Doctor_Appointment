
<?php
session_start();
include 'db.php';

$err_name = "";
$err_email = "";
$err_number = "";
$err_image = "";
$err_address = "";
$err_schedule = "";
$err_specialties = "";
$err_password = "";
$alard = "";

 if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (empty($_POST['name'])) {
        $err_name = "Please enter your name!";
    } elseif (empty($_POST['email'])) {
        $err_email = "Please enter your Email!";
    } elseif (empty($_POST['number'])) {
        $err_number = "Please enter your Number!";
    } elseif (empty($_FILES['image']['name'])) {
        $err_image = "Please upload an image!";
    } elseif (empty($_POST['address'])) {
        $name = $_POST['name'];
        $err_address = "Please enter your Address!";
    } elseif (empty($_POST['schedule'])) {
        $err_schedule = "Please enter your Schedule!";
    } elseif (empty($_POST['specialties'])) {
        $err_specialties = "Please select your Specialties!";
    } elseif (empty($_POST['Password'])) {
        $err_password = "Please enter your Password!";
    } else {
      $name=$_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $schedule = $_POST['schedule'];
        $specialtie = $_POST['specialties'];
        $password = $_POST['Password'];

        $image = $_FILES['image']['name'];
        $temp_name2 = $_FILES['image']['tmp_name'];
        $upload_folder2 = "DoctorImage/";
        $uniq_image = uniqid();
        $image_path = $upload_folder2 . "$uniq_image.jpg";

      move_uploaded_file($temp_name2, $image_path);
       $role='doctor';

 $insart_query = "INSERT INTO doctor_info(name,email,numbers,image,address,schedule,specialties,password,role) VALUES ('$name','$email','$number','$image_path','$address','$schedule','$specialtie','$password','$role')";


if (mysqli_query($database_connection, $insart_query) == true) {
 ?>
<script>
        alert("successfully");
        window.location.replace("login.php");
      </script>/
      <?php
    } else {
        echo "Something went wrong with the database insert.";
    }



}}
?>
  


<?php include "nav.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>

    <style>
      .login-form{
  width: 350px;
 margin-left:450px;

color: white;
  margin-top: 100px;
}
  .login-form h1{
  font-size:30px;
  text-align: center;
  text-transform: uppercase;
  margin-top: 25px;
  color: white;
  border-bottom: solid white;
}

.login-form p{
  font-size: 20px;
  margin: 15px 0;


}
.login-form input{
  font-size: 16px;
  width: 100%;
  padding: 15px 10px;
  border: 0;
  outline: none;
  border-radius: 5px;
}


.login-form button{
  background-color: #f4511e;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
}

.login-form button:hover {opacity: 1}
}
    </style>
</head>
<div style="background-color: BEC0C7;"> 
<body >
  <div class="login-form" style="margin-top:50px; width: 600px; background-image: url(images/pexels-adrien-olichon-2387793.jpg);" class="container">

        <h1>Registration Form For Doctor</h1>
        <form action="" method="post" enctype="multipart/form-data">

  <div class="container text-center">
  <div class="row">
    <div class="col">
            <span style="color: red"><?php echo $alard; ?></span>
        <p>Enter Your FullName</p>
        <input type="text" name="name" placeholder="Enter your Name">
         <span style="color: red"><?php echo  $err_name; ?></span> 
       
        <p>Enter Your  Email</p>
        <input type="email" name="email" placeholder="Enter your Email">
        <span style="color: red"><?php echo  $err_email; ?></span> 

        <p>Enter Your Phone Number</p>
        <input type="text" name="number" placeholder="Enter your Phone Number">
         <span style="color: red"><?php echo  $err_number; ?></span>

          <p>Enter Your Image</p>
        <input type="file" name="image" placeholder="Enter your Image">
         <span style="color: red"><?php echo  $err_image; ?></span>

    </div>
    <div class="col">
              <p>Enter Clinic  Address</p>
        <input type="text" name="address" placeholder="Enter your Address">
         <span style="color: red"><?php echo  $err_address; ?></span>

          <p>Enter Schedule</p>
        <input type="text" name="schedule" placeholder="Enter your Address">
         <span style="color: red"><?php echo  $err_schedule; ?></span>

        <p>Select Your Specialties</p>
      
<select name="specialties">
  <option >Select your specialties</option>
    <option value="Pediatrician">Pediatrician</option>
    <option value="Gynaecologist">Gynaecologist</option>
    <option value="Oncologist">Oncologist</option>
    <option value="Psychiatrist">Psychiatrist</option>
    

    <option value="Endocrinologist">Endocrinologist</option>
    <option value="Pulmonologist">Pulmonologist</option>
    <option value="Radiologist">Radiologist</option>
    <option value="Surgeon">Surgeon</option>

     <option value="Neurologist">Neurologist</option>
    <option value="Ophthalmologist">Ophthalmologist</option>
    <option value="Otolaryngologist">Otolaryngologist</option>
    <option value="Cardiologists">Cardiologists</option>
    

    <option value="Dermatologist">Dermatologist</option>
    <option value="Anesthesiologist">Anesthesiologist</option>
    <option value="Dentist">Dentist</option>
    

    
    <option value="Emergency Medicine">Emergency Medicine</option>
    <option value="Gastroenterologist">GastroenterologistPodiatrist</option>
     <option value="Podiatrist">Podiatrist</option>
    <option value="Allergist">Allergist</option>
    <option value="Epidemiologist">Epidemiologist</option>
    
     <option value="Nephrologist">Nephrologist</option>
    <option value="Pathologists">Pathologists</option>
    <option value="Rheumatologist">Rheumatologist</option>
     <option value="Urologist">Urologist</option>
    
    
</select><br>

      <span style="color: red"><?php echo  $err_specialties; ?></span>


   

        <p>Password</p>
        <input type="Password" name="Password" placeholder="Enter your Password">
        <span style="color: red"><?php echo  $err_password; ?></span>
          <span style="color: red ;"><?php echo  $err_password; ?></span>
    </div>
     </div>

     <div class="col" style="margin-top: 10px;">
    
        <button type="submit" name="submit">Registration</button>
         <button type="reset">Clear</button>
    </div>
  
 
</div>

        </form>
     </div>


  
</div>
</body>
  <?php include "footer.html" ?>
</html>
