<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSTEL MANAGEMENT SYSTEMS</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;

        }

        h1 {
            text-align: center;
            margin-bottom: 50px;
            color: #0a2832; /* Instagram color */
            font-size: 45px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;


        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .containermain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(rgba(200, 200, 200, 10), rgba(0, 0, 0, 0.7)), url(hback.jpg);
            background-position: center;
            background-size: cover;
            position: absolute;

        }

        .bubbleadmin {
            text-decoration: none;
            /* Remove underline from bubbles */
            color: inherit;
            /* Inherit text color from parent */
            width: 280px;
            height: 220px;
            border-radius: 50%;
            background: #013544;
            /* Instagram-like gradient */
            color: #ece9e9;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 28px;
            font-family: 'Times New Roman', Times, serif;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(241, 83, 9, 0.1);
            margin-bottom: 20px;
            border-radius: 156px;
            background-image: linear-gradient(rgba(80, 80, 80, 200), rgba(0, 0, 0, 0.7)),
                url("https://tse1.mm.bing.net/th?id=OIP.FUYG2ULJI1LzxUqxK9pCZQHaHa&pid=Api&P=0&h=280");
            background-repeat: no-repeat;

        }

        .bubblestud {
            text-decoration: none;
            /* Remove underline from bubbles */
            color: inherit;
            /* Inherit text color from parent */
            width: 280px;
            height: 220px;
            border-radius: 50%;
            background: #013544;
            /* Instagram-like gradient */
            color: #ece9e9;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 28px;
            font-family: 'Times New Roman', Times, serif;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(241, 83, 9, 0.1);
            margin-bottom: 20px;
            border-radius: 156px;
            background-image: linear-gradient(rgba(80, 80, 80, 100), rgba(0, 0, 0, 0.7)),
                url("https://tse4.mm.bing.net/th?id=OIP.d6qqJMrvFA6CVbzEy6iuxAHaEK&pid=Api&P=0&h=180");
            background-repeat: no-repeat;

        }

        .bubblevisit {
            text-decoration: none;
            /* Remove underline from bubbles */
            color: inherit;
            /* Inherit text color from parent */
            width: 280px;
            height: 220px;
            border-radius: 50%;
            background: #013544;
            /* Instagram-like gradient */
            color: #ece9e9;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 28px;
            font-family: 'Times New Roman', Times, serif;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(241, 83, 9, 0.1);
            margin-bottom: 20px;
            border-radius: 156px;
            background-image: linear-gradient(rgba(80, 80, 80, 200), rgba(0, 0, 0, 0.7)),
                url("https://tse1.mm.bing.net/th?id=OIP.aw9v7TdnJW_3aGuLAvOdzgHaEA&pid=Api&P=0&h=220");
            background-repeat: no-repeat;

        }

        .bubbleadmin:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(199, 19, 124, 0.2);
            color: rgb(73, 137, 185);
        }

        .bubblestud:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(199, 19, 124, 0.2);
            color: rgb(73, 137, 185);
        }

        .bubblevisit:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(199, 19, 124, 0.2);
            color: rgb(73, 137, 185);
        }

        /* Navigation bar styles */
        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        nav a.active {
            background-color: #4CAF50;
            color: white;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0.5px 2px;
            position: fixed;
            width: 100%;
            bottom: 0;
            left:0
        }
    </style>
</head>

<body>
    <nav>
        <a href="#" class="active">Home</a>
        <a href="#">Services</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </nav>
    <div class="containermain">
        <h1>HOSTEL MANAGEMENT SYSTEMS</h1>

        <div class="container">
            <div class="bubbleadmin" onclick="selectAdmin('Admin')">ADMIN</div>

        </div>
        <div class="container">
            <div class="bubblestud" onclick="selectStudent('Student')">STUDENT</div>
            <div class="bubblevisit" onclick="selectVisitor('Visitor')">VISITOR</div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Hostel Management Systems. All rights reserved.</p>
    </footer>
    <script>
        function selectAdmin(Domian) {
            alert('You selected ' + Domian);
            window.location = 'admin_login.php';
        }

        function selectStudent(Domian) {
            alert('You selected ' + Domian);
            window.location = 'stud_login.php';
        }

        function selectVisitor(Domian) {
            alert('You selected ' + Domian);
            window.location = 'visit.php';
        }
    </script>

</body>

</html>
