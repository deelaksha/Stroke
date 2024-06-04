<?php 
session_start();
include 'connection.php';
?>
<?php
 // Start the session
// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['patient_name']) || !isset($_SESSION['patient_phone_number'])) {
    header("Location: patient_login.php");
    exit();
}
$patient_name = $_SESSION['patient_name'];
$patient_phone_number = $_SESSION['patient_phone_number'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .radio-group {
            margin-bottom: 10px;
        }
        .radio-group label {
            display: inline-block;
            margin-right: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Patient Information Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <div class="radio-group">
                <label>Hypertension:</label>
                <input type="radio" id="hypertension_yes" name="hypertension" value="1">
                <label for="hypertension_yes">Yes</label>
                <input type="radio" id="hypertension_no" name="hypertension" value="0">
                <label for="hypertension_no">No</label>
            </div>

            <div class="radio-group">
                <label>Heart Disease:</label>
                <input type="radio" id="heart_disease_yes" name="heart_disease" value="1">
                <label for="heart_disease_yes">Yes</label>
                <input type="radio" id="heart_disease_no" name="heart_disease" value="0">
                <label for="heart_disease_no">No</label>
            </div>

            <label for="ever_married">Ever Married:</label>
            <select id="ever_married" name="ever_married" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <label for="work_type">Work Type:</label>
            <select id="work_type" name="work_type" required>
                <option value="children">Children</option>
                <option value="Govt_job">Government Job</option>
                <option value="Never_worked">Never Worked</option>
                <option value="Private">Private</option>
                <option value="Self-employed">Self-employed</option>
            </select>

            <label for="residence_type">Residence Type:</label>
            <select id="residence_type" name="residence_type" required>
                <option value="Rural">Rural</option>
                <option value="Urban">Urban</option>
            </select>

            <label for="avg_glucose_level">Average Glucose Level:</label>
            <input type="number" step="0.01" id="avg_glucose_level" name="avg_glucose_level" required>

            <label for="bmi">Body Mass Index (BMI):</label>
            <input type="number" step="0.1" id="bmi" name="bmi" required>

            <label for="smoking_status">Smoking Status:</label>
            <select id="smoking_status" name="smoking_status" required>
                <option value="formerly smoked">Formerly Smoked</option>
                <option value="never smoked">Never Smoked</option>
                <option value="smokes">Smokes</option>
                <option value="Unknown">Unknown</option>
            </select>

            <div class="radio-group">
                <label>Stroke:</label>
                <input type="radio" id="stroke_yes" name="stroke" value="1">
                <label for="stroke_yes">Yes</label>
                <input type="radio" id="stroke_no" name="stroke" value="0">
                <label for="stroke_no">No</label>
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>


<?php
session_start();
include 'connection.php';

// Check if user is logged in, if not, redirect to patient_login page
if (!isset($_SESSION['patient_name']) || !isset($_SESSION['patient_phone_number'])) {
    header("Location: patient_login.php");
    exit();
}

// Get patient information from session
$patient_name = $_SESSION['patient_name'];
$patient_phone_number = $_SESSION['patient_phone_number'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $hypertension = $_POST['hypertension'];
    $heart_disease = $_POST['heart_disease'];
    $ever_married = $_POST['ever_married'];
    $work_type = $_POST['work_type'];
    $residence_type = $_POST['residence_type'];
    $avg_glucose_level = $_POST['avg_glucose_level'];
    $bmi = $_POST['bmi'];
    $smoking_status = $_POST['smoking_status'];
    $stroke = $_POST['stroke'];

    // Check if the user has already submitted the form
    $sql_check = "SELECT * FROM patient_profile WHERE patient_phone_number = '$patient_phone_number'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Redirect to patient_profile_controller.php if form already submitted
        header("Location: patient_profile_controller.php");
        exit();
    } else {
        // Insert form data into patient_profile table
        $sql_insert = "INSERT INTO patient_profile (patient_phone_number, patient_name, gender, age, hypertension, heart_disease, ever_married, work_type, residence_type, avg_glucose_level, bmi, smoking_status, stroke) 
                VALUES ('$patient_phone_number', '$patient_name', '$gender', '$age', '$hypertension', '$heart_disease', '$ever_married', '$work_type', '$residence_type', '$avg_glucose_level', '$bmi', '$smoking_status', '$stroke')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }
}
?>


