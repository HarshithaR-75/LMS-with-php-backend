<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $bookIdToDelete = $_POST["bookidinput"];

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

    // SQL query to delete the record
    // $sql = "DELETE FROM `book_details` WHERE `book_details`.`Book_no` = '$bookIdToDelete'";
   $sql = "DELETE FROM book_details WHERE Book_no = '$bookIdToDelete'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
