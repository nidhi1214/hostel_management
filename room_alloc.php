<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Allocation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            display: flex;
            background-image:url(https://tse2.mm.bing.net/th?id=OIP.yVl6mTDiWp7Kp9RNJVkY1gHaD5&pid=Api&P=0&h=180);
            background-size: cover;
            background-position: center;
            width: 100%;
          position: fixed;
        }

        .card {
            background-color:rgb(27, 78, 116);
            padding:20px 20px;
            border-radius: 15px;
            box-shadow: 5px 5px 7px 0px #0000003f ;
            width: 300px;
            text-align: center;
            width:350px;
            height:350px;
            margin:600px;
        }

        .container::before{
            transform: scaleX(0);
        }

        .container::after{
            transform: scaleX(1);
        }

        h2 {
            color: #0eadd0;
        }

        label {
            display: block;
            margin-top: 10px;
            color: white;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: white;
            color: black;
            padding: 10px;
            border: none;
            width: 50%;
            cursor: pointer;
            border-radius: 100%;
            margin:40px
        }

        input:hover[type="submit"] {
            background: rgb(162, 162, 165);
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

                    // Perform database query to insert new user
                    $query = "INSERT INTO room_allocate (student_id, room_id) VALUES ('$submittedUsername', '$submittedPassword')";
                    
                    if ($mysqli->query($query) === TRUE) {
                        echo "Room allocated successfully!";
                    } else {
                        echo "Error: " . $query . "<br>" . $mysqli->error;
                    }
                }

                // Close the database connection
                $mysqli->close();
            ?>

            <form action="" method="post">
                <h2> Room Allocation</h2>
                <label for="username">Student_id:</label>
                <input type="text" name="username" placeholder="Enter student_id" required>
                <label for="password">Room_id:</label>
                <input type="password" name="password" placeholder="Enter room_id" required>
                <input type="submit" value="Allocate">
            </form>
        </div>
    </div>
</body>
</html>
