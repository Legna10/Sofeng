<?php
include_once 'config.php';

if(isset($_GET['artist_id'])) {
    $artist_id = $_GET['artist_id'];

    $sql = "SELECT * FROM artists WHERE artist_id = $artist_id";
    $result = mysqli_query($conn, $sql);
    $artist = mysqli_fetch_assoc($result);

    if (!$artist) {
        echo "Artist not found.";
        exit;
    }
} else {
    echo "Artist ID is not provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    $update_sql = "UPDATE artists SET artist_name='$name' WHERE artist_id=$artist_id"; 
    if (mysqli_query($conn, $update_sql)) {
        echo "Artist updated successfully.";
        header("Location: edit_artist.php");
        exit;
    } else {
        echo "Error: " . $update_sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artist</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: palevioletred;
        }
        header {
            background-color: #cc3d68;
            color: white;
            padding: 10px;
            text-align: center;
        }
        main {
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 7px;
            display: inline-block;
            text-align: left;
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
        button[type="submit"] {
            padding: 10px;
            background-color: #cc3d68;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #b5335e;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Artist</h1>
    </header>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?artist_id=' . $artist['artist_id']; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $artist['artist_name']; ?>" required>
            <button type="submit">Update Artist</button>
        </form>
    </main>
</body>
</html>
