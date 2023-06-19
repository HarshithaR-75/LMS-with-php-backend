<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $bookid = $_POST["bookidinput"];
    $bookname = $_POST["booknameinput"];
    $author = $_POST["authorinput"];
    $publication = $_POST["publicationinput"];
    $branch = $_POST["branches"];

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
    $sql = "INSERT INTO book_details (Book_no, Book_name, Author, Publication, Branch) VALUES ('$bookid', '$bookname', '$author', '$publication', '$branch')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
