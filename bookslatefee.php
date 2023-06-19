<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Late fees</title>
    <link rel="stylesheet" href="./style.css">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./images/icon.png">
   
    </head>

    <body>
       <div>
       <nav class="nav_head">
           <div class="logo"><img src="./images/icon.png"alt="company logo"></div>
           <h1>BMSCE LIBRARY</h1>
           <div class="right_Nav">
               
       </nav>
   
       <nav class="navbar background">
           
           </ul>
           <ul class="nav_list">
               <!-- <div class="logo"><img src="./images/icon.png"alt="company logo"></div> -->
               <li><a href="./index.php">Home</a></li>
               <li><a href="./facilities.html">Facilities</a></li>
               <li><a href="./e-resouces.html">E-Resources</a></li>
               <li class="active"><a href="#dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
               <li><a href="./index.php#contact-in"><i class="fa fa-phone"></i>Contact us</a></li>
            </ul>
            <!-- <input type="text" name="Search" placeholder="Search for books" id="searchbooks"> -->
           </div>
           
        </nav>
        <div class="imageslide">
         <img class="mySlides" src="images/Csebookslib.jpeg" style="width:100%">
         <img class="mySlides" src="./images/civilbookdlib.jpeg" style="width:100%">
         <img class="mySlides" src="./images/eeebookslib.jpeg" style="width:100%">
         <img class="mySlides" src="./images/Btbookslib.jpeg" style="width:100%">
         <img class="mySlides" src="./images/mechbookslib.jpeg" style="width:100%">
       </div>
       
       <script>
       var myIndex = 0;
       carousel();
       
       function carousel() {
         var i;
         var x = document.getElementsByClassName("mySlides");
         for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
         }
         myIndex++;
         if (myIndex > x.length) {myIndex = 1}    
         x[myIndex-1].style.display = "block";  
         setTimeout(carousel, 2000); // Change image every 2 seconds
       }
       </script>
    <br><br>
   
    
    <h2 style="text-align: center;">Late Fee Payment</h2><br>
    <?php
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

        // SQL query to retrieve specific columns from the database
        $sql = "SELECT borrower.Book_no, book_details.Book_name,borrower.Issue_Date, borrower.Return_Date, borrower.Actual_return_date,
        DATEDIFF(borrower.Actual_return_date, borrower.Return_Date) AS Days_Late,
        1 * DATEDIFF(borrower.Actual_return_date, borrower.Return_Date) AS Late_Fee
        FROM borrower
        INNER JOIN book_details ON borrower.Book_no = book_details.Book_no
        WHERE borrower.Actual_return_date > borrower.Return_Date and Usn='1BM21CS075';";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Book No</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Returned On</th><th>Late fees</th></tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
            echo "<td>" . $row["Book_no"] . "</td>";
            echo "<td>" . $row["Book_name"] . "</td>";
            echo "<td>" . $row["Issue_Date"] . "</td>";
            echo "<td>" . $row["Return_Date"] . "</td>";
            echo "<td>" . $row["Actual_return_date"] . "</td>";
            echo "<td>" . $row["Days_Late"] . "</td>";
            echo "<td>" . $row["Late_Fee"] . "</td>";
            echo "</tr>";
        }
     } else {
            echo "No records found";
        }

        // Close the database connection
        $conn->close();
        echo "</table>";
        ?>

<br/>    <div class="foot"> 
        <footer>
          <ul class="social_icons">
              <li><a href="https://www.facebook.com/" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a></li>
              <li><a href="https://www.instagram.com/bmsce_25/?hl=en" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a></li>
              <li><a href="https://twitter.com/i/flow/login" target="_blank"><ion-icon name="logo-twitter"></ion-icon></a></li>
              <li><a href="https://in.linkedin.com/school/b.-m.-s.-college-of-engineering/" target="_blank"><ion-icon name="logo-linkedin"></ion-icon></a></li>
              <li><a href="#"><ion-icon name="logo-flickr"></ion-icon></a></li>
          </ul>
          <ul class="menu">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./index.php#aboutus">About</a></li>
            <li><a href="./facilities.html">Services</a></li>
            <li><a href="#">Team</a></li>
            <li><a href="./index.php#contact-in">Contact</a></li>
        </ul>

          <p>
              © 2023 BMSCE LIBRARY 
          </p>
          </footer>
       </div>
          <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
    </body>
</html>
