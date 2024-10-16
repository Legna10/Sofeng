<<<<<<< HEAD
<?php
include_once 'config.php';

if(isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];

    $sql = "SELECT * FROM albums WHERE album_id = $album_id";
    $result = mysqli_query($conn, $sql);
    $album = mysqli_fetch_assoc($result);

    if (!$album) {
        echo "Album not found.";
        exit;
    }
} else {
    echo "Album ID is not provided.";
    exit;
}

$sql_artists = "SELECT * FROM artists";
$result_artists = mysqli_query($conn, $sql_artists);
$artists = mysqli_fetch_all($result_artists, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $artist_id = $_POST['artist'];
    $release_date = $_POST['release_date'];
    $cover_image = $_POST['cover_image'];

    $update_sql = "UPDATE albums SET title='$title', artist_id='$artist_id', release_date='$release_date', cover_image='$cover_image' WHERE album_id=$album_id";
    if (mysqli_query($conn, $update_sql)) {
        echo "Album updated successfully.";
        header("Location: edit_album.php");
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
    <title>Edit Album</title>
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
        <h1>Edit Album</h1>
    </header>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?album_id=' . $album['album_id']; ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $album['title']; ?>" required>
            <label for="artist">Artist:</label>
            <select id="artist" name="artist" required>
                <?php foreach ($artists as $artist) { ?>
                    <option value="<?php echo $artist['artist_id']; ?>" <?php if ($album['artist_id'] == $artist['artist_id']) echo 'selected'; ?>><?php echo $artist['artist_name']; ?></option>
                <?php } ?>
            </select>
            <label for="release_date">Release Date:</label>
            <input type="date" id="release_date" name="release_date" value="<?php echo $album['release_date']; ?>" required>
            <label for="cover_image">Cover Image URL:</label>
            <input type="text" id="cover_image" name="cover_image" value="<?php echo $album['cover_image']; ?>" required>
            <button type="submit">Update Album</button>
        </form>
    </main>
</body>
</html>
=======
ini jgu
>>>>>>> 3c2a473db5cb5719303a4a371a2c0a18887e8adc
