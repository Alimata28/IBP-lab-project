<?php
// Include the configuration file with database connection details
require_once 'config.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve student data from the "students" table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Registered Students</h1>";
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['full_name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['gender']."</td>
            </tr>";
    }
    
    echo "</table>";
} else {
    echo "No students registered.";
}

$conn->close();
?>
