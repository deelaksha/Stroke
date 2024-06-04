<?php
session_start(); // Start the session
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $patient_phone_number = $_POST['patient_phone_number'];
    $entered_otp = $_POST['otp']; // Get the entered OTP

    // You can add OTP verification logic here if required

    if (strlen($patient_phone_number) !== 10) {
        echo "<script>alert('Error: Invalid Phone Number.');</script>";
    } else {
        // Check if phone number already exists
        $sql_check_phone = "SELECT * FROM patient WHERE patient_phone_number = '$patient_phone_number'";
        $result_check_phone = $conn->query($sql_check_phone);

        if ($result_check_phone->num_rows > 0) {
            // Phone number already exists, redirect to appropriate page
            // Check if user data exists in patient_profile table
            $sql_check_profile = "SELECT * FROM patient_profile WHERE patient_phone_number = '$patient_phone_number'";
            $result_check_profile = $conn->query($sql_check_profile);

            if ($result_check_profile->num_rows > 0) {
                // Redirect to patient_profile_controller.php if user data exists
                header("Location: patient_profile_controller.php");
                exit();
            } else {
                // Redirect to patient_profile.php if user data does not exist
                header("Location: patient_profile.php");
                exit();
            }
        } else {
            // Phone number doesn't exist, proceed with insertion
            $sql = "INSERT INTO patient (patient_name, patient_phone_number) VALUES ('$patient_name','$patient_phone_number')";

            if ($conn->query($sql) === TRUE) {
                // Store user data in session
                $_SESSION['patient_name'] = $patient_name;
                $_SESSION['patient_phone_number'] = $patient_phone_number;
                echo "<script>alert('New record created successfully');</script>";
                
                // Check if user data exists in patient_profile table
                $sql_check_profile = "SELECT * FROM patient_profile WHERE patient_phone_number = '$patient_phone_number'";
                $result_check_profile = $conn->query($sql_check_profile);

                if ($result_check_profile->num_rows > 0) {
                    // Redirect to patient_profile_controller.php if user data exists
                    header("Location: patient_profile_controller.php");
                    exit();
                } else {
                    // Redirect to patient_profile.php if user data does not exist
                    header("Location: patient_profile.php");
                    exit();
                }
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
                <input type="text" id="name" name="patient_name" required>
            </div>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="patient_phone_number" required>
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
