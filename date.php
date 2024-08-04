<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date and Time Input</title>
    <style>
        .container {
            text-align: center;
            padding: 20px;
        }
        input {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 100%;
            max-width: 300px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Date and Time</h2>
        <form action="process.php" method="POST">
            <label for="datetime">Date and Time:</label><br>
            <input type="datetime-local" id="datetime" name="datetime"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>