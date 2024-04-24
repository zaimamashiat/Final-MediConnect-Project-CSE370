<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <style>
        body {
            background-image: url('./images/DALL·E 2024-04-24 00.45.35 - Create an image of a background suitable for a medical appointment webpage. The image should be calming and professional, incorporating soft blue and .webp'); /* Update with the actual path */
            background-size: cover; /* Cover the entire page */
            background-repeat: no-repeat;
            background-attachment: fixed; /* Fixed background */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Appointment List</h2>

<form action="" method="GET">
    <label for="name">Search by Name:</label>
    <input type="text" id="name" name="name">

    <label for="date">Search by Date:</label>
    <input type="text" id="date" name="date">

    <label for="doctor_id">Search by Doctor ID:</label>
    <input type="text" id="doctor_id" name="doctor_id">

    <label for="patient_id">Search by Patient ID:</label>
    <input type="text" id="patient_id" name="patient_id">

    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Doctor ID</th>
            <th>Patient ID</th>
            <th>Reasons</th>
        </tr>
    </thead>
    <tbody>
       <?php
// Include database connection
require 'dbconnect.php';

// Initialize search criteria
$whereClause = "";

// Apply search criteria if provided
if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $_GET['name'];
    $whereClause .= " WHERE Name LIKE '%$name%'";
}
if (isset($_GET['date']) && !empty($_GET['date'])) {
    $date = $_GET['date'];
    $whereClause .= (!empty($whereClause)) ? " AND Date = '$date'" : " WHERE Date = '$date'";
}
if (isset($_GET['doctor_id']) && !empty($_GET['doctor_id'])) {
    $doctor_id = $_GET['doctor_id'];
    $whereClause .= (!empty($whereClause)) ? " AND Doctor_ID = '$doctor_id'" : " WHERE Doctor_ID = '$doctor_id'";
}
if (isset($_GET['patient_id']) && !empty($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
    $whereClause .= (!empty($whereClause)) ? " AND Patient_ID = '$patient_id'" : " WHERE Patient_ID = '$patient_id'";
}

// Construct the SQL query
$sql = "SELECT * FROM appointment $whereClause";

$result = $conn->query($sql);

// Check if there are any appointments
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Date"] . "</td>";
        echo "<td>" . $row["Time"] . "</td>";
        echo "<td>" . $row["Doctor_ID"] . "</td>";
        echo "<td>" . $row["Patient_ID"] . "</td>";
        echo "<td>" . $row["Reasons"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No appointments found</td></tr>";
}

// Close database connection
$conn->close();
?>
