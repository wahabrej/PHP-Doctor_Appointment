<?php
session_start();
include 'db.php'; 
include "nav.php" ;
?>

<!DOCTYPE html>
<html>
<head>
    <title>notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>


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

 $number= $_SESSION['numbers'];

    $check = "SELECT * FROM doctor_info WHERE numbers=$number";

    $result = mysqli_query($database_connection, $check);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $doctor_id = $data['id'];
        }
    }
 
$notification = "SELECT COUNT(*) AS count FROM appointment_info WHERE doctor_id = ?";
$runquery = mysqli_prepare($database_connection, $notification);

if ($runquery) {
    mysqli_stmt_bind_param($runquery, "i", $doctor_id);
    mysqli_stmt_execute($runquery);
    $result_count = mysqli_stmt_get_result($runquery);

    if ($result_count) {
        $countData = mysqli_fetch_assoc($result_count);
        $counts = $countData['count'];
        echo "Total Appointments: " . $counts;
    }

 
    echo '<table class="table table-hover border border-info mt-4"" id="myTable">
     
            <tr>
                <th scope="col">SL-Number</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Number</th>
                <th scope="col">Date</th>
            </tr>';

    $query = "SELECT * FROM appointment_info WHERE doctor_id = ?";
    $runquery = mysqli_prepare($database_connection, $query);

    if ($runquery) {
        mysqli_stmt_bind_param($runquery, "i", $doctor_id);
        mysqli_stmt_execute($runquery);
        $result_appointments = mysqli_stmt_get_result($runquery);
        $count=1;
        while ($data = mysqli_fetch_assoc($result_appointments)) {

            echo '<tr>';
            echo '<td>' . $count;  $count++ ;'</td>';
            echo '<td>' . $data['name'] . '</td>';
            echo '<td>' . $data['numbers'] . '</td>';
            echo '<td>' . $data['date'] . '</td>';
            echo '</tr>';
          
        }

        echo '</table>';
    }
}
?>

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


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
