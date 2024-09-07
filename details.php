<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUDENT</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 10px;
      padding: 10px;
      background-image: url("hos1.jpg");
      background-size: cover;
    }

    nav {
      background-color: #a62b2b;
      color: #55698c;
      text-align: center;
    }

    nav ul {
      list-style: none;
      padding: 0;
    }

    nav ul li {
      display: inline-block;
      margin-right: 20px;
    }

    nav ul li a {
      color: #ffffff;
      text-decoration: none;
      padding: 10px;
      transition: all 0.3s ease;
    }

    nav ul li a:hover {
      background-color: #a34a74;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 20px;
    }

    h1 {
      text-align: center;
      /* background-color: rgb(213, 209, 204); */
    }

    p {
      line-height: 1.6;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 2px solid #b8c8c1;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #9fa7b8;
    }

    tr:nth-child(even) {
      background-color: #cecece;
    }

    .form-container {
      padding: 20px;
    }

    .form-container form {
      border: 1px solid #d1e4a2;
      padding: 20px;
      background-color: #bbd19e;
      max-width: 400px;
      margin: 0 auto;
    }

    .form-container label {
      display: block;
      margin-bottom: 10px;
    }

    .form-container input[type="text"],
    .form-container textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .form-container input[type="submit"] {
      background-color: #855d5d;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>FILL THE FORM</h1>

  <div class="form-container">
  <?php
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

    // Escape user inputs to prevent SQL injection
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $department = $conn->real_escape_string($_POST['department']);
    $mobileNo = $conn->real_escape_string($_POST['mobileNo']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $yearOfStudy = $conn->real_escape_string($_POST['yearOfStudy']);

    // Insert user data into database
    $sql = "INSERT INTO details (first_name, last_name, dept, mob_no, dob, year_of_study) 
    VALUES ('$firstName', '$lastName', '$department', '$mobileNo', '$dob', '$yearOfStudy')";


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
<?php echo $success_message; ?> <!-- Display success message -->
    <form action="" method="POST">
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName" required>
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" required>
      <label for="department">Department:</label>
      <input type="text" id="department" name="department" required>
      <label for="mobileNo">Mob_No.:</label>
      <input type="text" id="mobileNo" name="mobileNo" required>
      <label for="dob">Date_of_Birth:</label>
      <input type="text" id="dob" name="dob" required>
      <label for="yearOfStudy">Year of Study:</label>
      <input type="text" id="yearOfStudy" name="yearOfStudy" required>
      <input type="submit" value="Submit">
    </form>
  </div>
  
  <p>*Student must enter their personal information </p>
</body>
</html>
