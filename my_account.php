<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'User_Info';

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die('Connection Error: ' . $mysqli->connect_error);
}

// Retrieve available specializations
$specializations_query = "SELECT DISTINCT doctor_specialization FROM users WHERE user_type = 'doctor'";
$specializations_result = $mysqli->query($specializations_query);

// Display the search form
echo '<form method="GET" action="doctors_list.php">';
echo 'Search by Doctor Name: <input type="text" name="doctor_name" placeholder="Doctor Name">';
echo 'Search by Specialization: <select name="specialization">';
echo '<option value="">All Specializations</option>'; // Add an option to search all specializations

// Populate the dropdown with available specializations
while ($row = $specializations_result->fetch_assoc()) {
    echo '<option value="' . htmlspecialchars($row['doctor_specialization']) . '">' . htmlspecialchars($row['doctor_specialization']) . '</option>';
}

echo '</select>';
echo '<input type="submit" value="Search">';
echo '</form>';

// Get the doctor's name and specialization from the URL query string
$doctor_name = isset($_GET['doctor_name']) ? $_GET['doctor_name'] : '';
$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';

// Prepare the query with filtering based on doctor's name and specialization
$query = "SELECT  name, user_id, doctor_specialization, qualification, contact_no, address, hospital FROM users WHERE user_type = 'doctor'";

$conditions = [];
$params = [];

// Add condition for doctor's name
if ($doctor_name) {
    $conditions[] = "name LIKE ?";
    $params[] = '%' . $doctor_name . '%';
}

// Add condition for specialization
if ($specialization) {
    $conditions[] = "doctor_specialization = ?";
    $params[] = $specialization;
}

// Add conditions to the query
if (count($conditions) > 0) {
    $query .= " AND " . implode(" AND ", $conditions);
}

// Prepare the statement
$stmt = $mysqli->prepare($query);

// Bind parameters to the statement
if (count($params) > 0) {
    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Display the list of doctors
echo '<h2>List of Doctors:</h2>';
while ($doctor = $result->fetch_assoc()) {
    echo '<div class="doctor-profile">';
    echo 'Name: ' . htmlspecialchars($doctor['name']) . '<br>';
    echo 'Specialization: ' . htmlspecialchars($doctor['doctor_specialization']) . '<br>';
    echo 'Qualification: ' . htmlspecialchars($doctor['qualification']) . '<br>';
    echo 'Contact No: ' . htmlspecialchars($doctor['contact_no']) . '<br>';
    echo 'Address: ' . htmlspecialchars($doctor['address']) . '<br>';
    echo 'Hospital: ' . htmlspecialchars($doctor['hospital']) . '<br>';
    echo '<form method="POST" action="delete_doctor.php">';
    echo '<input type="hidden" name="user_id" value="' . $doctor['user_id'] . '">';
    echo '<input type="submit" value="Delete">';
    echo '</form>';
    echo '</div><br>';
}

// Free result and close connection
$result->free();
$mysqli->close();
?>