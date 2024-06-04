<?php
include "connection.php";
// Query to select ID values from the "test" table
$sql = "SELECT id FROM test";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. "<br>";
    }
} else {
    echo "0 results";
}
?>
