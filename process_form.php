<?php
// Include the database connection file
include 'dbconnect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $patient_id = $_POST['patient_id'];
    $pcontact_no = $_POST['pcontact_no'];
    $street = $_POST['street'];
    $area = $_POST['area'];
    $blood_group = $_POST['blood_group'];
    
    // Check if all required fields are filled
    if (!empty($patient_id) && !empty($pcontact_no) && !empty($street) && !empty($area) && !empty($blood_group)) {
        // Insert data into users table
        $sql = "INSERT INTO users (Patient_ID, PContact_No, Street, Area, Blood_Group) VALUES ('$patient_id', '$pcontact_no', '$street', '$area', '$blood_group')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required";
    }
}
?>
