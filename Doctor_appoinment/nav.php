
<!DOCTYPE html>
<html>
<head>
  <title></title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    *{
   padding: 0;
   margin: 0;
   text-decoration: none;
   list-style: none ;
   box-sizing: border-box ;
}
.nav{
   background: skyblue;
   height: 80px;
   width: 100%;
}

label.logo{
   color: white;
   font-size:25px;
   line-height: 80px;
   padding: 0 100px;
   font-weight: bold;
}
.nav ul{
   float: right;
   margin-right: 20px;

}

.nav ul li{
   display: inline-block;
   line-height:1px;
   margin: 0 5px;
}
.nav ul li{
   color: white;
   font-size: 17px;
   padding: 7px 13px;
   border-radius: 3px;

}

a.active,a:hover{
   background: orange;
   transition: 0.5s;
}

@media(max-width: 52px){
   label.logo{
      font-size: 30px;
      padding-left: 5px;

   }
   .nav ul li a{
      font-size: 16px;
   }
}


    .dropdown-menu li:hover {
        background-color: #e0e0e0; 
        color: #333; 
    }



  </style>


</head>
<body>

       <div class="nav">
        <label class="logo">Doctor's Appointment System</label>
        

 <ul>
   

    <li><a class="btn btn-secondary" href="home_page.php">Home</a></li>
    <li><a class="btn btn-secondary" href="About.html">About</a></li>
    <li> 
      <?php if (isset($_SESSION['password'])) { ?>
      <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                Doctor's Category
            </button>
              <ul class="dropdown-menu" style="width:450px;">
            <div class="container text-center">
                    <div class="row">
                    <div class="col-6">
                <li><a class="dropdown-item" href="doctor_list.php?specialties=Pediatrician">Pediatrician</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=Gynaecologist">Gynaecologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=Oncologist">Oncologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Psychiatrist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Endocrinologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Pulmonologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Radiologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Surgeon</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Neurologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Ophthalmologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Otolaryngologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Cardiologists</a></li>
                <li><a class="dropdown-item" href="doctor_list.php?specialties=">Dermatologist</a></li>
                   </div>
                   <div class="col-6">
                        
                <li><a class="dropdown-item" href="doctor_list.php">Anesthesiologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Dentist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Psychiatrist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Emergency Medicine</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Gastroenterologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Podiatrist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Allergist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Epidemiologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Nephrologist</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Pathologists</a></li>
                <li><a class="dropdown-item" href="doctor_list.php">Rheumatologist</a></li>
               <li><a class="dropdown-item" href="doctor_list.php">Urologist</a></li>
                  </div>
  
                  </div>
                   </div>
          
          
                

            </ul>

        </div></li>
    <li>
      <?php } ?>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                Registration
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="user_registration.php">User</a></li>
                <li><a class="dropdown-item" href="doctor_registration.php">Doctor</a></li>
            </ul>
        </div>
    </li>

   <?php if (isset($_SESSION['name'])) { ?>
    <li>
   <li style="margin-left:80px;">
 
    <div class="dropdown">
            <button  class="no-border-radius" data-bs-toggle="dropdown" >
                
        <img src="<?php echo $_SESSION['image']; ?>" style="width:50px;height: 50px; border-radius: 20px;"><br>
      
    

        </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="DoctorProfile.php">Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li></li>
                <li><a class="dropdown-item" href="doctor_edit.php">Edit Information</a></li>
            </ul>
        </div>
</li>


 <?php  }else { ?>
<li><a class="btn btn-secondary" href="login.php">Login</a></li>
  <?php } ?>

</ul>

     </ul>
       </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
