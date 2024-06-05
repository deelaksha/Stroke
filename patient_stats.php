<?php
session_start();
// Include the database connection file
include 'connection.php';

// Your SQL query to count the occurrences of 0s and 1s separately
$sql1 = "SELECT SUM(taken = 0) AS zeros_count, SUM(taken = 1) AS ones_count FROM patient_medicine";
$result1 = $conn->query($sql1);

// Check if the query executed successfully
if ($result1) {
    // Fetch the result as an associative array
    $row = $result1->fetch_assoc();
    
    // Get the counts
    $zerosCount = $row['zeros_count'];
    $onesCount = $row['ones_count'];
    
    // Calculate the sum
    $sum = $zerosCount + $onesCount;
    
    // Calculate the percentage
    $percentage_1 = ($onesCount / $sum) * 100;
    $percentage_0 = ($zerosCount / $sum) * 100;
} else {
    // Error handling if the query fails
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <?php
                                    // Display the counts and percentages
                                    echo "<p>Name : Deelaksha </p>";
                                    echo "<p>Phone Number : 8088137341 </p>";
                                    
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                              <h3>Medicine Taken</h3>
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                <script>
                                    window.onload = function () {
                                        var chart = new CanvasJS.Chart("chartContainer", {
                                            animationEnabled: true,
                                            data: [{
                                                type: "pie",
                                                dataPoints: [
                                                    { y: <?php echo $percentage_1; ?>, color: "green", legendText: "Tablets Taken" },
                                                    { y: <?php echo $percentage_0; ?>, color: "red", legendText: "Tablets Not Taken" }
                                                ]
                                            }]
                                        });
                                        chart.render();
                                    }
                                </script>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Male
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">age	</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    21
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">hypertension	
</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    yes
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">heart_disease	</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    No
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ever_married</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    No
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">residence_type	</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Urban
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">avg_glucose_level	</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    78
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">bmi	</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    18.5
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">stroke	</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Yes
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body{
            margin-top:20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;    
        }
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>
</body>
</html>