<?php  
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Search and Display Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            display: flex;
            width: 80%;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .content {
            width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }
        
        .sidebar {
            width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-end;
            border-left: 2px solid #cccccc;
        }

        .divider {
            width: 100%;
            border-top: 3px solid #cccccc;
            margin-top: 10px;
        }

        h2 {
            margin-top: 0;
            color: #333333;
        }
        
        form {
            display: flex;
            justify-content: flex-end;
            width: 100%;
        }
        
        input[type="text"] {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            flex-grow: 1;
            box-sizing: border-box;
        }
        
        button {
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #0056b3;
        }
        
        p {
            font-size: 18px;
            color: #555555;
            line-height: 1.6;
        }
        
        .patient_name {
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>Details</h2>
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT patient_name, patient_phone_number FROM patient WHERE patient_phone_number LIKE ?";
                $stmt = $conn->prepare($sql);
                $searchParam = "%" . $search . "%";
                $stmt->bind_param("s", $searchParam);
                $stmt->execute();
                $stmt->bind_result($patient_name, $patient_phone_number);
                
                $results = [];
                while ($stmt->fetch()) {
                    $results[] = ['name' => $patient_name, 'phone' => $patient_phone_number];
                }
                
                
                
                $stmt->close();
                $conn->close();
                echo "<p><strong>Name:</strong> John Doe</p>";
                echo "<p><strong>Phone Number:</strong> +1 234 567 8901</p>";
            }
            ?>
        </div>
        <div class="sidebar">
            <form action="" method="get">
                <input type="text" id="search" name="search" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
            <div class="divider"></div>
            <div class="patient_name">
                <?php

                 if (isset($results) && !empty($results)) {
                     foreach ($results as $result) {
                        echo '<div class="card" style="width: 18rem; cursor: pointer;" onclick="location.href=\'process.php?session_var='.urlencode($result['name']).'\'">';
                        echo '<div class="card" style="width: 18rem;">';
                         echo '<div class="card-body">';
                         echo '<h5 class="card-title">Name: ' . htmlspecialchars($result['name']) . '</h5>';
                         echo '<h5 class="card-title">Phone no: ' . htmlspecialchars($result['phone']) . '</h5>';
                         echo '</div>';
                         echo '</div>';

                    }
                } else {
                    echo "<p>Phone number: </p>";
                    echo "<p>Name: </p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
s