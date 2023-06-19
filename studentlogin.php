<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "A82P8QBWi@BPX-Y8";
$dbname = "lms_1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $studentemail = $_POST["semail"];
    $studentpassword = $_POST["spassword"];

    // Query the database to check if the username and password are correct
    $sql = "SELECT * FROM student_details WHERE S_email = '$studentemail' AND S_password = '$studentpassword'";
    $result = mysqli_query($conn, $sql);

    // If a matching record is found, the login is successful
    if (mysqli_num_rows($result) == 1) {
        echo "Login successful!";
        // Redirect to the home page or any other authenticated page
         header("Location: Student_Dashboard.html");
    } else {
        echo "Invalid email or password!";
    }
}

// Close the database connection
mysqli_close($conn);
?>
