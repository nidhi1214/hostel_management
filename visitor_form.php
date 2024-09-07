<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Colorful Visitor Information Form</title>
  <style>
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
    }

    #form-container {
      background-color: #262626;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      color: #f2f2f2;
    }

    h2 {
      color: #f2f2f2;
    }

    label {
      display: block;
      margin: 15px 0 5px;
      color: #f2f2f2;
    }

    input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    button {
      background-color: #4CAF50;
      color: #fff;
      padding: 15px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
    }

    button:hover {
      background-color: #45a049;
    }

    #visitor-list {
      margin-top: 20px;
    }

    .visitor-item {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvRMdnl0Kj0MKAFi3gFpdZpSHIwsmibeJ_NNhbKF3FnbjgylfrHK8YyFKXPL2e4jQmiAc&usqp=CAU" alt="">
  
  <div id="form-container">
  <?php
  session_start(); 
$success_message = ""; // Initialize the success message variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    if (isset($_SESSION['username'])) {
        $visitorName = $_SESSION['username'];
    // Escape user inputs to prevent SQL injection
    $visitorName = $conn->real_escape_string($_POST['visitorName']);
    $studentName = $conn->real_escape_string($_POST['studentName']);
    $studentID = $conn->real_escape_string($_POST['studentID']);
    $inTime = $conn->real_escape_string($_POST['inTime']);
    $outTime = $conn->real_escape_string($_POST['outTime']);
    $fromPlace = $conn->real_escape_string($_POST['fromPlace']);
    echo "<script>document.getElementById('visitorName').value = '$visitorName';</script>";
    }
    // Insert user data into database
    $sql = "INSERT INTO visitor_info (visitor_name, student_id, student_name, In_time, Out_time, from_place) 
            VALUES ('$visitorName', '$studentID', '$studentName', '$inTime', '$outTime', '$fromPlace')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "<p style='color: green;'>Submitted successfully</p>"; // Set success message
    } else {
        if ($conn->errno == 1062) { // MySQL error code for duplicate entry
            echo "<p style='color: red;'>Error: Duplicate entry. Visitor information already exists.</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    // Close connection
    $conn->close();
}
?>


    <h2> VISITOR INFORMATION</h2>
    <form id="visitorForm" method="POST">
      <label for="visitorName">VISITOR NAME:</label>
      <input type="text" id="visitorName" name="visitorName" required>
      
      <label for="studentName">STUDENT NAME:</label>
      <input type="text" id="studentName" name="studentName" required>

      <label for="studentID">STUDENT ID:</label>
      <input type="text" id="studentID" name="studentID" required>

      <label for="inTime">IN TIME:</label>
      <input type="time" id="inTime" name="inTime" required>
      
      <label for="outTime">OUT TIME:</label>
      <input type="time" id="outTime" name="outTime" required>

      <label for="fromPlace">FROM PLACE:</label>
      <input type="text" id="fromPlace" name="fromPlace" required>

      <button type="submit">Submit</button>
    </form>

    <div id="visitor-list"></div>
    <?php echo $success_message; ?> <!-- Display success message here -->
  </div>
</body>
</html>