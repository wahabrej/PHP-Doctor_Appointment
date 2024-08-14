
<?php
include 'db.php';

     $err_name="";
     $err_date="";
     $err_number="";
    
     $alard="";
     

     if ($_SERVER['REQUEST_METHOD']=='POST') {
         if(empty($_POST['name'])){
          $err_name="please enter your name !";
         }
         elseif (empty($_POST['date'])) {
           $err_email ="please enter date !";
         }
         elseif(empty($_POST['number'])){
          $err_number="please enter your Number !";
        }
         
       else{

     $name=$_POST['name'];
     $date=$_POST['date'];
     $number=$_POST['number'];
    

$doctor_id= "";


if (isset($_GET['id'])) {
  $doctor_id = intval($_GET['id']);
}



    

        $insart_query ="INSERT INTO appointment_info( name,date,numbers,doctor_id) VALUES ('$name',' $date','$number','$doctor_id')";
        
       if(mysqli_query( $database_connection, $insart_query)){  
      ?>
      <script>
        alert("successfully");
        window.location.replace("home_page.php");
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
  <title>Appoinment_set</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="appoinment.css">

  
</head>
<body> 
      
    
  <div>


  <div class="container">
    <div class="contact-box">
      <div class="left"></div>
      <div class="right">
        <h2>Set Appoinment</h2>
        <form action="" method="post">
        <input type="text" name="name" class="field" placeholder="Patient Name">
         <span style="color: red"><?php echo  $err_name; ?></span> 
       
        <input type="date"name="date" class="field" placeholder="Appoinment Date">
         <span style="color: red"><?php echo  $err_date; ?></span> 
       
        <input type="text" name="number" class="field" placeholder="Phone Number">
         <span style="color: red"><?php echo  $err_number; ?></span> 
       
        
        
        <button class="btn btn-primary" type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>
<?php include "footer.html" ?>