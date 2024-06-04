<?php 
include 'connection.php';
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
        <form action="/submit" method="post">
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>

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

    // Establish a connection to the MySQL database
   include 'connection.php';

    // Prepare the SQL statement
    $sql = "INSERT INTO patient_profile (phone_number, gender, age, hypertension, ever_married, work_type, residence_type, avg_glucose_level, bmi, smoking_status, stroke) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ssiissssssssi", $_POST['phone_number'], $_POST['gender'], $_POST['age'], $_POST['hypertension'], $_POST['heart_disease'], $_POST['ever_married'], $_POST['work_type'], $_POST['residence_type'], $_POST['avg_glucose_level'], $_POST['bmi'], $_POST['smoking_status'], $_POST['stroke']);

    // Execute the statement
    $stmt->execute();

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

?>
