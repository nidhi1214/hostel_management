<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Query Result</title>
  <style>
  .container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333;
}

p {
  color: #666;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin-bottom: 10px;
}

strong {
  font-weight: bold;
  color: #555;
}</style>
</head>
<body>
  <div class="container">
  <?php
session_start();
// Check if admin is authenticated, if not, redirect to login page
// if (!isset($_SESSION['admin_authenticated'])) {
//     header("Location: admin_login.php");
//     exit();
// }

// Retrieve and display query data from the database
// Example code to fetch data from the contact table
// Replace this with your actual database connection and query
$servername = "localhost";
$username = "root";
$password = "";
$database = "hostel";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

// Display fetched data
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Query Result \n";
       
        echo "\nStudent ID: " . $row["student_id"]. "  Room Number: " . $row["room_id"]. " - Query: " . $row["c_query"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "Thank you for submitting your query. Below is the information you provided:";
$conn->close();
?>
    
  </div>
</body>
</html>