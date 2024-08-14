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
    <button><a href="update_info_user.php">Update Patient's Information</a></button>
    <!-- 
 !-- search -->

    <div class="container mt-4">
        <label style="text-align: center; margin-left: 500px; font-weight: bold; font-size:25px; color: red;">Search For Patiant</label>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!-- Your PHP script will handle the form submission -->

                <div class="input-group">

                    <input type="text" class="form-control mt-4" id="searchInput" name="search" placeholder="Search..." onkeyup="searchFun()">

                </div>

            </div>
        </div>
    </div>




    <?php
    $password = $_SESSION['password'];
    $number = $_SESSION['numbers'];


    $check = "SELECT * FROM doctor_info WHERE numbers=$number AND password=$password";

    $result = mysqli_query($database_connection, $check);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $doctor_id = $data['id'];
        }
    }


    $check = "SELECT * FROM appointment_info WHERE doctor_id = $doctor_id";
    $result = mysqli_query($database_connection, $check);
    $row = mysqli_num_rows($result);
    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $dbDate = $row['date'];


        $count = 1;
        $formattedDate = date('Y-m-d');

        if ($formattedDate == $dbDate) {

    ?>
            <table class="table table-hover border border-info mt-4" id="myTable">

                <tr>
                    <th scope="col">SL-Number</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    <th scope="col">Stutas</th>
                </tr>


                <?php
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>

                        <td><?php echo $count;
                            $count++; ?></td>
                        <td name="name"><?php echo $row['name']; ?></td>
                        <td><?php echo $row['numbers']; ?></td>
                        <td><?php echo $row['date']; ?></td>


                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="patient_id" value="<?php echo $row['id']; ?>">
                                <input type="radio" name="status" value="Complete">
                                <label>Complete</label><br>
                                <input type="radio" name="status" value="Waiting">
                                <label>Waiting</label><br>

                                <input class="btn btn-info" name="submit" type="submit" value="Submit">
                            </form>
                        </td>
                    </tr>
                <?php
                }
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



    <?php


        }
    }


    ?>

    <!-- from sumition -->

    <?php


    if (isset($_POST['submit'])) {
        $status = $_POST['status'];
        $patient_id = $_POST['patient_id'];

    

        // Perform database connection (assuming you have already connected to the database)

        $insert = "INSERT INTO update_info (status,patient_id)VALUES ('$status',$patient_id)";

        $result = mysqli_query($database_connection, $insert);

        if ($result) {
    ?>
            <script>
                alert("Data inserted successfully!");
            </script>

    <?php

        } else {
            echo "Error: " . mysqli_error($database_connection);
        }

        // Close the database connection if needed
    }


    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>