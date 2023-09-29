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
