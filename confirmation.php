<?php
$floor = isset($_GET['floor']) ? $_GET['floor'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$roomNumber = isset($_GET['roomNumber']) ? $_GET['roomNumber'] : '';

if (!$floor || !$name || !$roomNumber) {
    die("Invalid confirmation request");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akkama Hostel - Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            font-size: 24px;
        }

        .confirmation-container {
            max-width: 300px;
            margin: 20px auto;
        }

        p {
            margin-bottom: 15px;
        }

        a {
            display: inline-block;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Akkama Hostel - Confirmation</h1>
    </header>

    <div class="confirmation-container">
        <p>Dear <?php echo $name; ?>,</p>
        <p>You have been allocated Room <?php echo $roomNumber; ?> on Floor <?php echo $floor; ?>.</p>
        <a href="index.php">Go Back</a>
    </div>
</body>
</html>
