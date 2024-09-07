<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Query Form</title>
  <link rel="stylesheet" href="styles3.css">

  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('c1.jpg');
    background-size: cover;
  }
  
  .container {
    max-width: 600px;
    margin: 20px auto;
    padding: 0 20px;

  }
  
  h1 {
    text-align: center;
    color:bisque
  }
  h2{
   color: cornsilk;
  }
  
  .form-group {
    margin-bottom: 20px;
    color: bisque;
   font-family: 'Courier New';
  }
  
  label {
    display: block;
    font-weight: bold;
  }
  
  input[type="text"],
  textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color:bisque;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  button:active {
    background-color: #0056b3;
    transform: translateY(1px);
  }
  </style>
</head>
<body>

<?php
// Connect to MySQL database (change these credentials to match your own)
$servername = "localhost";
$username = "root";
$password = "";
$database = "hostel";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
   
    $roomId = $conn->real_escape_string($_POST['roomNo']);
    $mobileNo = $conn->real_escape_string($_POST['mobileNo']);
    $query = $conn->real_escape_string($_POST['query']);
    $studentId = $conn->real_escape_string($_POST['studentId']);

    // Insert user data into database
    $sql = "INSERT INTO contact (room_id, c_query, student_id, mob_no) VALUES ('$roomId', '$query', '$studentId', '$mobileNo')";

    if ($conn->query($sql) === TRUE) {
        echo "Query submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

  
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Complaints</title>
  <link rel="stylesheet" href="styles3.css">
</head>
<body>
  <div class="container">
    <h1>CONTACT US</h1>
    <h2>Hostel Complaints</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group">
      <label for="studentId">Student ID:</label>
    <input type="text" id="studentId" name="studentId" required>
      </div>
      <div class="form-group">
      <label for="roomNo">Room Number:</label>
    <input type="text" id="roomNo" name="roomNo" required>
      </div>
      <div class="form-group">
      <label for="mobileNo">Mobile Number:</label>
    <input type="tel" id="mobileNo" name="mobileNo" pattern="[0-9]{10}" required>
    <small>Enter 10-digit mobile number</small>
    </div>
      <div class="form-group">
      <label for="query">Query:</label>
    <textarea id="query" name="query" rows="4" required></textarea>
    </div>
      <button type="submit">Submit</button>
    </form>
  </div>
  <!-- <script src="script3.js"></script> -->
</body>
</html>
 