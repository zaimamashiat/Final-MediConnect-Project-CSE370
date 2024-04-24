<?php
// Include database connection script
require "dbconnect.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $doctor_username = $_POST["doctor_username"];
    $patient_username = $_POST["patient_username"];
    $feedback = $_POST["feedback"];
    $test = $_POST["test"];
    $medicines = $_POST["medicines"];

    // Check if the database connection is established
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to insert feedback into the diagnosis table
    $sql = "INSERT INTO diagnosis (doctor_username, patient_username, Feedback, Test, Medicine) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $doctor_username, $patient_username, $feedback, $test, $medicines);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        // Provide feedback to the user


        echo "Feedback submitted successfully.";
    } else {
        // Handle insertion failure
        echo "Error: Failed to submit feedback. Please try again later.";
        // You can also log the error for debugging purposes
        error_log("Error: Failed to insert feedback into database.");
    }

    // Close the prepared statement
    $stmt->close();
}
