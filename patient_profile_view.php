<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .view-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .info-group {
            margin-bottom: 15px;
        }
        .info-group label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }
        .info-group p {
            margin: 0;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #ddd;
            color: #333;
            font-size: 14px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="view-container">
        <h1>Patient Information</h1>
        <div class="info-group">
            <label>Phone Number:</label>
            <p id="view_phone_number"></p>
        </div>
        <div class="info-group">
            <label>Gender:</label>
            <p id="view_gender"></p>
        </div>
        <div class="info-group">
            <label>Age:</label>
            <p id="view_age"></p>
        </div>
        <div class="info-group">
            <label>Hypertension:</label>
            <p id="view_hypertension"></p>
        </div>
        <div class="info-group">
            <label>Heart Disease:</label>
            <p id="view_heart_disease"></p>
        </div>
        <div class="info-group">
            <label>Ever Married:</label>
            <p id="view_ever_married"></p>
        </div>
        <div class="info-group">
            <label>Work Type:</label>
            <p id="view_work_type"></p>
        </div>
        <div class="info-group">
            <label>Residence Type:</label>
            <p id="view_residence_type"></p>
        </div>
        <div class="info-group">
            <label>Average Glucose Level:</label>
            <p id="view_avg_glucose_level"></p>
        </div>
        <div class="info-group">
            <label>BMI:</label>
            <p id="view_bmi"></p>
        </div>
        <div class="info-group">
            <label>Smoking Status:</label>
            <p id="view_smoking_status"></p>
        </div>
        <div class="info-group">
            <label>Stroke:</label>
            <p id="view_stroke"></p>
        </div>
    </div>
    <script>
        // Example data, in a real scenario this data would be fetched from a database or an API
        const patientData = {
            phone_number: "123-456-7890",
            gender: "Male",
            age: 45,
            hypertension: 1,
            heart_disease: 0,
            ever_married: "Yes",
            work_type: "Private",
            residence_type: "Urban",
            avg_glucose_level: 105.6,
            bmi: 27.5,
            smoking_status: "never smoked",
            stroke: 0
        };

        document.getElementById("view_phone_number").innerText = patientData.phone_number;
        document.getElementById("view_gender").innerText = patientData.gender;
        document.getElementById("view_age").innerText = patientData.age;
        document.getElementById("view_hypertension").innerText = patientData.hypertension ? "Yes" : "No";
        document.getElementById("view_heart_disease").innerText = patientData.heart_disease ? "Yes" : "No";
        document.getElementById("view_ever_married").innerText = patientData.ever_married;
        document.getElementById("view_work_type").innerText = patientData.work_type;
        document.getElementById("view_residence_type").innerText = patientData.residence_type;
        document.getElementById("view_avg_glucose_level").innerText = patientData.avg_glucose_level;
        document.getElementById("view_bmi").innerText = patientData.bmi;
        document.getElementById("view_smoking_status").innerText = patientData.smoking_status;
        document.getElementById("view_stroke").innerText = patientData.stroke ? "Yes" : "No";
    </script>
</body>
</html>