<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $bookid = $_POST["bookid"];
    $bookname = $_POST["bookname"];
    $author = $_POST["author"];
    $publication = $_POST["publication"];
    


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

    
    $sql = "UPDATE book_details SET ";
    
    // Check if each column is specified in the form, and append it to the query if it's present
    if (!empty($bookname)) {
        $sql .= "Book_name = '$bookname', ";
    }
    if (!empty($author)) {
        $sql .= "Author = '$author', ";
    }
    if (!empty($publication)) {
        $sql .= "Publication = '$publication', ";
    }
    
    // Remove the trailing comma and space from the query
    $sql = rtrim($sql, ", ");
    
    // Append the WHERE condition for the specific row to update
    $sql .= " WHERE Book_no = '$bookid'";
    
    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>