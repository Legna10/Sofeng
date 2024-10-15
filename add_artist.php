<<<<<<< HEAD
<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST['artist_name'];

    $sql = "INSERT INTO artists (artist_name) VALUES ('$artist_name')";
    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
=======
>>>>>>> c717e146e3abeb9873f752ec367b00c65d333b68
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Add New Artist</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Georgia, serif;
            background-color: palevioletred;
        }
        header {
            background-color: #cc3d68;
            color: white;
            padding: 10px;
            height: 10vh;
            width: 100%;
            position: fixed;
            top: 0;
        }
        main {
            margin-top: 170px;
            text-align: center;
        }
        footer {
            background-color: #cc3d68;
            color: white;
            padding: 6px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 7px;
            display: inline-block;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px;
            background-color: #cc3d68;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #b5335e;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add New Artist</h1>
    </header>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="artist_name">Artist Name:</label>
            <input type="text" id="artist_name" name="artist_name" required>
            <button type="submit">Add</button>
            <button type="button" class="back-btn" onclick="window.location.href='panel_admin.php';">Back</button>
        </form>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
=======
    <title>Add New</title>
    <style>
        body {
>>>>>>> c717e146e3abeb9873f752ec367b00c65d333b68
