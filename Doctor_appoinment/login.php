<?php 
  
 include 'db.php';

session_start();

$error = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['numbers']) && isset($_POST['Password'])) {
        $number = $_POST['numbers'];
        $password = $_POST['Password'];

        // Create a prepared statement for the UNION query
        $union_query = "SELECT name, email, numbers, image, password, role FROM doctor_info
                        UNION
                        SELECT name, email, numbers, image, password, role FROM user_info";

        $checking_query = "SELECT * FROM ($union_query) AS combined_data WHERE numbers = ? AND password = ?";

        $stmt = mysqli_prepare($database_connection, $checking_query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $number, $password);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);

                if ($data['role'] == 'doctor') {
                    $_SESSION['numbers'] = $data['numbers'];
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['image'] = $data['image'];

                    header("location: DoctorProfile.php");
                } elseif ($data['role'] == 'user') {
                    $_SESSION['numbers'] = $data['numbers'];
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['image'] = $data['image'];
                    $_SESSION['role']=$data['role'];

                    header("location: home_page.php");
                } else {
                    $error = "Invalid role detected.";
                }
            } else {
                $error = "Invalid phone number or password.";
            }
        } else {
            $error = "Failed to prepare the SQL statement.";
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
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	
</head>
<body>
	 
	 <div class="login-form">
	 	<h1>Login Form</h1>
	 	<form action="#" method="post">
    <p>User Phone Number</p>
    <input type="tel" name="numbers" placeholder="Enter your Phone Number">
    <p>Password</p>
    <input type="password" name="Password" placeholder="Enter your Password">
    <span style="color: red; font-weight: bold; font-size: 20px;"><?php echo $error; ?></span>
    <button name="submit" type="submit">Login</button>
</form>


	 	</form>
	 </div>

</body>
</html>

