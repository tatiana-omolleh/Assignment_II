<?php
require_once 'includes/dbConn.php';

if (isset($_POST["submit"])) {
    $fullName = $_POST["name"];
    $email_address = $_POST["email_address"];
    $contact = $_POST["contact"];

    // Create a new database connection using your constants
    $db = new dbConn();

    // Define the table and data for insertion
    $table = "users";
    $data = array(
        'name' => $fullName,
        'email_address' => $email_address,
        'contact' => $contact
    );

    // Insert data into the database using the dbConn insert method
    try {
        $result = $db->insert($table, $data);
        if ($result) {
            echo "User data added successfully!";
        } else {
            echo "Failed to add user data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST["show"])) {
    $fullNameToShow = $_POST["fullname"];

    $db = new dbConn();

    // Define your SQL query to retrieve user data by Full Name
    $sql = "SELECT * FROM users WHERE name = :fullname"; // Changed "contact" to "name"
    $param = array(':fullname' => $fullNameToShow); // Changed ":contact" to ":fullname"

    // Use your updated select function to fetch user data
    $selectUserData = $db->select($sql, $param);

    if ($selectUserData) {
        echo "<h2>User Data</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Contact</th><th>Name</th><th>Email Address</th></tr>";
        echo "<tr>";
        echo "<td>" . $selectUserData['contact'] . "</td>";
        echo "<td>" . $selectUserData['name'] . "</td>";
        echo "<td>" . $selectUserData['email_address'] . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "User data not found for Full Name: $fullNameToShow";
    }
}