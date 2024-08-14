
<?php 
  session_start();
 include 'db.php';
include "nav.php";


?>
<!DOCTYPE html>
<html>
<head>
	<title>CurrentDay</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
	<?php 

$date = '';

$format = "Y-m-d l"; 
$formattedDate = date($format);
?>

<h1 style="text-align: center;"><?php echo "Today Is: " . $formattedDate; ?></h1>

	<h5></h5>
	<marquee direction="right">Update information</marquee>

<!--      !-- search --> 
  
    <div class="container mt-4">
            <label style="text-align: center; margin-left: 500px; font-weight: bold; font-size:25px; color: red;">Search For Patiant</label>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                 <!-- Your PHP script will handle the form submission -->
             
                    <div class="input-group">

                        <input type="text" class="form-control mt-4" id="searchInput"  name="search" placeholder="Search..." onkeyup="searchFun()">
                        
</div>
              
            </div>
        </div>
    </div>


	<?php 




 $password= $_SESSION['password'];
 $number= $_SESSION['numbers'];


    $check = "SELECT * FROM doctor_info WHERE numbers=$number AND password=$password";

    $result = mysqli_query($database_connection, $check);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
             $doctor_id= $data['id'];
        }
    }
 
   
$check = "SELECT * FROM appointment_info
          JOIN update_info ON appointment_info.id = update_info.patient_id
          WHERE doctor_id = $doctor_id";

$result = mysqli_query($database_connection, $check);

if ($result) {
    
              
    ?>
    <table class="table table-hover" id="myTable">
    
            <tr>
                <th scope="col">SL-Number</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Number</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
       
       
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
            if (isset($rows['date'])) {
                $dbDate = $rows['date'];
              
    
                // Get the current date in the same format as your database date
                $currentDate = date('Y-m-d'); // You can adjust the format as needed
    
                 if ($currentDate == $dbDate) {
                   

            ?>
            <tr>
                 
                <td name="name"><?php echo $rows['id']; ?></td>
               
                <td name="name"><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['numbers']; ?></td>
                <td><?php echo $rows['date']; ?></td>
                <td><?php echo $rows['status']; ?></td>


            </tr>
            <?php
        }}}}
        ?>
     
    </table>



   
        
   





 <script>
    const searchFun = () => {
        let filter = document.getElementById('searchInput').value.toUpperCase();
        let myTable = document.getElementById('myTable');
        let tr = myTable.getElementsByTagName('tr');

        for (let i = 0; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td')[1]; // Index 1 for the 'Patient Name' column

            if (td) {
                let textValue = td.textContent || td.innerText;

                if (textValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>

