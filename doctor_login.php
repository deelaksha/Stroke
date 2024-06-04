<?php 
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_name = $_POST['doctor_name'];
    $doctor_phone_number = $_POST['doctor_phone_number'];

    // Check if the phone number and name are already registered
    $check_sql = "SELECT * FROM doctor WHERE doctor_name = '$doctor_name' AND doctor_phone_number = '$doctor_phone_number'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // If already registered, redirect to doctor_profile page
        header("Location: doctor_profile.php");
        exit();
    } else {
        // If not registered, insert the data
        if (strlen($doctor_phone_number) !== 10) {
            echo "<script>alert('Error: Invalid Phone Number.');</script>";
        } else {
            $sql = "INSERT INTO doctor (doctor_name, doctor_phone_number) VALUES ('$doctor_name','$doctor_phone_number')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New record created successfully');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <script>
        function generateOTP() {
            var otp = Math.floor(1000 + Math.random() * 9000);
            document.getElementById("otp-display").innerText = "OTP: " + otp;
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <button onclick="generateOTP()">Get OTP</button>
        <form action="#" method="post">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="doctor_name" required>
            </div>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="doctor_phone_number" required>
            </div>
            <div class="input-group">
                <label for="otp">OTP</label>
                <input type="text" id="otp" name="otp" required>
            </div>
            <div id="otp-display"></div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
