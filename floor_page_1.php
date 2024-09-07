<?php
// floor_page.php
session_start();
$floor = isset($_GET['floor']) ? $_GET['floor'] : null;

if (!$floor || !in_array($floor, [1, 2, 3])) {
    die("Invalid floor selection");
}

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $roomId = isset($_POST["roomNumber"]) ? $_POST["roomNumber"] : "";

    // Validate and insert data into the database
    if ($name && $roomId) {
        if ($name != $_SESSION['f_name']) {
            $errorMessage = "Entered name does not match the logged-in user.";
        } else {
            // Perform database insertion here
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hostel";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Start a transaction
            $conn->autocommit(FALSE);

            // Verify the name in the database
            $stmt = $conn->prepare("SELECT * FROM student WHERE f_name = ?");
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Student with the entered name exists, update the room ID
                $studentData = $result->fetch_assoc();

                if ($studentData['room_id']) {
                    $errorMessage = "The student already has a room allocated (Room ID: " . $studentData['room_id'] . ").";
                } else {
                    $updateStmt = $conn->prepare("UPDATE student SET room_id = ? WHERE f_name = ?");
                    $updateStmt->bind_param("ss", $roomId, $name);
                    $updateStmt->execute();

                    // Increment the no_of_mem count in room_allocate
                    $incrementStmt = $conn->prepare("UPDATE room_allocate SET no_of_mem = no_of_mem + 1 WHERE room_id = ?");
                    $incrementStmt->bind_param("s", $roomId);
                    $incrementStmt->execute();

                    // Check if no_of_mem exceeds the limit (3)
                    $checkRoomStmt = $conn->prepare("SELECT no_of_mem FROM room_allocate WHERE room_id = ?");
                    $checkRoomStmt->bind_param("s", $roomId);
                    $checkRoomStmt->execute();
                    $checkRoomResult = $checkRoomStmt->get_result();

                    if ($checkRoomResult && $checkRoomResult->num_rows > 0) {
                        $roomData = $checkRoomResult->fetch_assoc();
                        $noOfMem = $roomData['no_of_mem'];

                        if ($noOfMem > 3) {
                            $errorMessage = "The room is full. Please choose another room.";
                            // Rollback the updates
                            $conn->rollback();
                        } else {
                            // Commit the transaction
                            $conn->commit();

                            // Redirect to a confirmation page or display a success message
                            header("Location: confirmation.php?floor=$floor&name=$name&roomNumber=$roomId");
                            exit();
                        }
                    }
                }
            } else {
                $errorMessage = "Invalid student name. Please enter a valid name.";
            }

            $stmt->close();
            $conn->close();
        }
    } else {
        $errorMessage = "Please enter both name and room number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akkama Hostel - Floor <?php echo $floor; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            //background-color: #3498db;
            color:black;
            padding: 50px;
            font-size: 30px;
        }
        .form-container {
            max-width: 400px;
           max-height:50px;
            padding: 0px;
            margin: 20px auto;
            font-size: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body>
    <header>
        <h1>AKKAMAHADEVI HOSTEL-FLOOR <?php echo $floor; ?></h1>
    </header>
    <div class="background-image">
        <!-- <img src="https://tse1.mm.bing.net/th?id=OIP.xLlL2Bnwp4GL-lrAhXl5WQHaEo&pid=Api&P=0&h=180" alt="Background Image" style="width: 100%; height: 100%; object-fit: cover;"> -->
        <img src="https://tse2.mm.bing.net/th?id=OIP.mCUSosuiXgPUce3v1sFTiwHaE8&pid=Api&P=0&h=180" alt="Background Image" style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <div class="form-container">
        <form method="post" action="">
            <?php if ($errorMessage): ?>
                <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>

            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="roomNumber">Room Number (within range <?php echo $floor * 100 + 1; ?> to <?php echo $floor * 100 + 10; ?>):</label>
            <input type="number" id="roomNumber" name="roomNumber" min="<?php echo $floor * 100 + 1; ?>" max="<?php echo $floor * 100 + 10; ?>" required>

            <button type="submit">Submit</button>
        </form>
    </div>
    <div style="position: fixed; bottom: 20px; right: 20px;">
    <form action="logout2.php" method="post">
        <input type="submit" value="Logout">
    </form>
</div>
</body>
</html>