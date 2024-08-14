
<?php 

include "nav.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="doctors.css">

	<title>doctor's</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php
include 'db.php';

$specialties = "";

if (isset($_GET['specialties'])) {
  $specialties = $_GET['specialties'];
}

$check = "SELECT * FROM doctor_info WHERE specialties = '$specialties'";
$runquery = mysqli_query($database_connection, $check);

if ($runquery === false) {
  echo "Query execution error: " . mysqli_error($database_connection);
} else {
  while ($data = mysqli_fetch_array($runquery)) {
  

?>



<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo $data['image']; ?>" class="img-fluid rounded-start" alt="..." style="height: 100%;">
    </div>
    <div class="col-md-8">
      <div class="card-body">

        <h5 class="card-title">Doctor Detelis</h5>
         <h6>Name:<?php echo  $data['name'] ?></h6>
         <h6>Email:<?php echo  $data['email'] ?></h6>
         <h6>Clinic Address:<?php echo  $data['address'] ?></h6>
         <h6>Contac :<?php echo  $data['numbers'] ?></h6>
         <h6>Schedule:<?php echo  $data['schedule'] ?></h6>
         <h6>Specialties:<?php echo  $data['specialties'] ?></h6>

            <?php $id= $data['id'] ?>
            <a href="appoinment_set.php?id=<?php echo $id ?>">
         <button class="btn btn-success">Set Appoinment</button>
         </a>
     
       
      </div>
    </div>
  </div>
</div>

<?php }}?>
	</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>

<?php include "footer.html" ?>
