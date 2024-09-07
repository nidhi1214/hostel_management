<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akkama Hostel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
           // background-color: #3498db;
            color: BLACK;
            padding: 10px;
            font-size: 24px;
        }

        .floor-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }

        .floor-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .floor-card:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #333;
        }

        p {
            color: #777;
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

    </style>
</head>
<body>
    <header>
        <h1>AKKAMAHADEVI HOSTEL</h1>
    </header>
     <img src="https://tse2.mm.bing.net/th?id=OIP.qVwOFUUq2wnJjQm6_80nCgHaEK&pid=Api&P=0&h=180" alt="">
    <div class="floor-container">
        <!-- Floor 1 -->
        <a style="text-decoration:none;"href="floor_page_1.php?floor=1" class="floor-card">
            <h2>Floor 1</h2>
            <p>Rooms: 101-110</p>
        </a>

        <!-- Floor 2 -->
        <a style="text-decoration:none;"href="floor_page_1.php?floor=2" class="floor-card">
            <h2>Floor 2</h2>
            <p>Rooms: 201-210</p>
        </a>

        <!-- Floor 3 -->
        <a style="text-decoration:none;"href="floor_page_1.php?floor=3" class="floor-card">
            <h2>Floor 3</h2>
            <p>Rooms: 301-310</p>
        </a>
    </div>
</body>
</html>
