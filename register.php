<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $user = $_POST["user"];
    $usn = $_POST["usn"];
    $branch = $_POST["branches"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password1= $_POST["password"];
    $confirmpassword= $_POST["conpassword"];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "A82P8QBWi@BPX-Y8";
    $database = "lms_1";

    // Create a new MySQLi object
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to update the data
    $sql = "INSERT INTO student_details (Usn, S_name, S_branch, M_no , S_email, S_password ) VALUES ('$usn','$user', '$branch', '$mobile', '$email', ' $password1')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>