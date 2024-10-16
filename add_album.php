<<<<<<< HEAD
<?php
include_once 'config.php';

$sql = "SELECT * FROM artists";
$result = mysqli_query($conn, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $artist_id = $_POST['artist'];
    $release_date = $_POST['release_date'];
    $cover_image = $_POST['cover_image'];

    $insert_sql = "INSERT INTO albums (title, artist_id, release_date, cover_image) VALUES ('$title', '$artist_id', '$release_date', '$cover_image')";
    if (mysqli_query($conn, $insert_sql)) {
        echo "";
    } else {
        echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Album</title>
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
            margin-top: 100px;
            padding: 20px;
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
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="date"] {
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
            margin-right: 10px;
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
        <h1>Add New Album</h1>
    </header>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="artist">Artist:</label>
            <select id="artist" name="artist" required>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $row['artist_id']; ?>"><?php echo $row['artist_name']; ?></option>
                <?php } ?>
            </select>
            <label for="release_date">Release Date:</label>
            <input type="date" id="release_date" name="release_date" required>
            <label for="cover_image">Cover Image URL:</label>
            <input type="text" id="cover_image" name="cover_image" required>
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
ini kosong
>>>>>>> c717e146e3abeb9873f752ec367b00c65d333b68
