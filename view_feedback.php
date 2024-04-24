<?php
// Include database connection script
require "dbconnect.php";

// Check if patient_username is provided in the URL parameters
if (isset($_GET["patient_username"])) {
    // Get the patient's username from the URL parameters
    $patient_username = $_GET["patient_username"];

    // Prepare and execute the SQL query to fetch feedback, test, and medicine information for the patient
    $sql = "SELECT Feedback, Test, Medicine FROM diagnosis WHERE patient_username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $patient_username);
    $stmt->execute();
    $stmt->bind_result($feedback, $test, $medicine);

    // Fetch the result
    if ($stmt->fetch()) {
        // Display the feedback, test, and medicine information
        echo "<h2>Feedback</h2>";
        echo "<p>$feedback</p>";
        echo "<h2>Test</h2>";
        echo "<p>$test</p>";
        echo "<h2>Medicine</h2>";
        echo "<p>$medicine</p>";
    } else {
        // If no feedback is found for the patient, display a message
        echo "No feedback found for this patient.";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If patient_username is not provided in the URL parameters, display an error message
    echo "Patient username is not provided.";
}
?>
