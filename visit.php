<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visiting Timings Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e5e5e5;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 300px;
            width: 100%;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #e0f2f1; /* Light blue background color */
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 10px;
        }

        h4 {
            text-align: center;
            color: #666666;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 8px;
            color: #555555;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
         .background-img {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Place the image behind other content */
        } 
        input[type:submit]
        {
            padding:10px 50px;
        }
        input:hover[type="submit"] {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
        <?php
    // Database connection parameters
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'hostel';

    // Create a database connection
    $mysqli = new mysqli($hostname, $username, $password, $database);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the submitted username and password from the form
        $submittedUsername = $_POST['username'];
        $submittedPassword = $_POST['password'];

        // Perform database query to check credentials
        $query = "SELECT * FROM student WHERE visitor_name = '$submittedUsername' AND password = '$submittedPassword'";
        // Hash the password before storing it
        $result = $mysqli->query($query);

        // Check if the query was successful
        if ($result) {
            // Check if there is a matching user in the database
            if ($result->num_rows > 0) {
                // Fetch student data
                $studentData = $result->fetch_assoc();
                
                // Redirect to visitor_form.php with data
                header("Location: visitor_form.php?studentName={$studentData['f_name']}&studentID={$studentData['student_id']}");
                exit();
            } else {
                // Authentication failed
                echo "Invalid credentials. Please try again.";
            }
            // Free the result set
            $result->free();
        } else {
            // Query failed
            echo "Error executing query: " . $mysqli->error;
        }
    }

    // Close the database connection
    $mysqli->close();
?>

<img class="background-img"src="https://media.istockphoto.com/id/1313300720/photo/abstract-blur-soft-focus-blue-color-interior-of-modern-cleaning-workplace-background-with.jpg?b=1&s=612x612&w=0&k=20&c=uwNmiTO7cz_TjR9a-t2WrudU6ATnXYyFz947t0xBlhk=" alt="">

<!-- <img class="background-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJtOEHsDLSi-Rigf-QqQ9vD4bQdTeujzLCLhFS-0VVksFdqk2QFv4hAkTlRgirxsNjvQk&usqp=CAU" alt=""> -->

<form action="" method="post">
        <h2>VISITORS GATEWAY</h2>
        <h4>Timings: 9 AM to 7:30 PM</h4>

        <label for="username">Visitor_name:</label>
                <input type="text" name="username" placeholder="username" required class="raja">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" value="Login" style="height:35px; width:70px; ">   </form>
        </div>
    </div>
</body>
</html>