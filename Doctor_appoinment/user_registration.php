<?php
session_start();
 include 'db.php';

     $err_name="";
     $err_email="";
     $err_number="";
     $err_address="";
      $err_image="";
     $err_password ="";
     $alard="";
     

     if ($_SERVER['REQUEST_METHOD']=='POST') {
         if(empty($_POST['name'])){
          $err_name="please enter your name !";
         }
         elseif (empty($_POST['email'])) {
           $err_email ="please enter your Email !";
         }
         elseif(empty($_POST['number'])){
          $err_number="please enter your Number !";
        }
         elseif(empty($_POST['address'])){
          $err_address ="please enter your Address !";
      }
            elseif(empty($_POST['address'])){
          $err_image ="please submit your Image !";
      }
      elseif(empty($_POST['Password'])){
          $err_password ="please enter your Password !";
      }
       else{

     $name=$_POST['name'];
     $email=$_POST['email'];
     $number=$_POST['number'];
     $address=$_POST['address'];
 
     $password=$_POST['Password'];
     $role='user';

       $image = $_FILES['image']['name'];
        $temp_name2 = $_FILES['image']['tmp_name'];
        $upload_folder2 = "UserImage/";
        $uniq_image = uniqid();
        $image_path = $upload_folder2 . "$uniq_image.jpg";

      move_uploaded_file($temp_name2, $image_path);


      $insart_query ="INSERT INTO user_info( name,email,numbers,address,image, password,role) VALUES (
      '$name','$email','$number','$address','$image_path','$password','$role')";
        
       if(mysqli_query( $database_connection, $insart_query)) { 
      ?>
      <script>
        alert("successfully");
        window.location.replace("login.php");
      </script>
      <?php   
   }
        
     
     else{
        $alard="Email Already Exist !";


     }

     
}
}
     
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
  margin-top: 50px;
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
<body>

<div class="login-form" style=" background-image: url(images/pexels-adrien-olichon-2387793.jpg); width: 600px;"class="container">

        <h1> User Registration Form</h1>

  <div class="container text-center">
  <div class="row">
    <div class="col">
        <form action="" method="post" enctype="multipart/form-data">
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
        
        <p>Image</p>
        <input type="file" name="image">
         <span style="color: red"><?php echo  $err_image; ?></span>
      
          <p>Enter Your Address</p>
         <input type="text" name="address" placeholder="Enter your Address">
         <span style="color: red"><?php echo  $err_address; ?></span>

        <p>Password</p>
        <input type="Password" name="Password" placeholder="Enter your Password">
        <span style="color: red"><?php echo  $err_password; ?></span>
          <span style="color: red ;"><?php echo  $err_password; ?></span>
       
        <button type="submit">Registration</button>
         <button type="reset">Clear</button>
        </form>
     </div>
</div>
</div>
</div>
  

</body>
</html>

<?php include "footer.html" ?>