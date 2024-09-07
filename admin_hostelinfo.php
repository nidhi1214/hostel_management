<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintain the aspect ratio while covering */
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        main {
            padding: 1em;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .card {
            background-color: #262626;
            padding: 40px;
            font-size: 15px;
            font-weight: 300;
            border-right: 10px;
            transition: background 0.5s, transform 0.5s;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 1em;
            margin: 20px;
            width: 280px;
            height: 400px;
            cursor: pointer;
            transition: box-shadow 0.3s;
            color: antiquewhite;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: color 0.3s, background-color 0.3s;
            background-color: red;
            background: #b40606;
            transform: translateY(-10px);
        }

        .head {
            margin: 0;
            padding: 10px;
            text-align: center;
            text-shadow: #b40606;
            text-size-adjust: 100px;
            font-size: 2em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
<header>
    <div class="head">
        <h1>AKKAMAHADEVI HOSTEL</h1>
    </div>
</header>

<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQM3k5hCxweb1AKnCkw3ltAZ9x3oNx_hsn6Hw&usqp=CAU"
     alt="">

<main>
    <?php
    // Database connection setup
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch allocated rooms information from the database
    $sql = "SELECT * FROM room_allocate";
    $result = $conn->query($sql);

    // Display allocated rooms dynamically
    if ($result->num_rows > 0) {
        $floor1 = [];
        $floor2 = [];
        $floor3 = [];
        while ($row = $result->fetch_assoc()) {
            $room_id = $row['room_id'];
            $no_of_mem = $row['no_of_mem'];
            if ($room_id >= 101 && $room_id <= 110) {
                $floor1[$room_id] = $no_of_mem;
            } elseif ($room_id >= 201 && $room_id <= 210) {
                $floor2[$room_id] = $no_of_mem;
            } elseif ($room_id >= 301 && $room_id <= 310) {
                $floor3[$room_id] = $no_of_mem;
            }
        }
        echo "<div class='card'>";
        echo "<h2>Floor 1</h2>";
        foreach ($floor1 as $room_id => $no_of_mem) {
            echo "<p>Room $room_id: $no_of_mem members</p>";
        }
        echo "</div>";

        echo "<div class='card'>";
        echo "<h2>Floor 2</h2>";
        foreach ($floor2 as $room_id => $no_of_mem) {
            echo "<p>Room $room_id: $no_of_mem members</p>";
        }
        echo "</div>";

        echo "<div class='card'>";
        echo "<h2>Floor 3</h2>";
        foreach ($floor3 as $room_id => $no_of_mem) {
            echo "<p>Room $room_id: $no_of_mem members</p>";
        }
        echo "</div>";
    } else {
        echo "No rooms allocated.";
    }

    // Close database connection
    $conn->close();
    ?>
    
</main>
<div style="position: fixed; bottom: 20px; right: 20px;">
    <form action="logout1.php" method="post">
        <input type="submit" value="Logout">
    </form>
</div>
</body>
