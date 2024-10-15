<?php
include_once 'config.php';

$sql = "SELECT albums.*, artists.artist_name AS artists_name FROM albums INNER JOIN artists ON albums.artist_id = artists.artist_id";
$result = mysqli_query($conn, $sql);

function deleteAlbum($album_id) {
    global $conn;
    $delete_sql = "DELETE FROM albums WHERE album_id = $album_id";
    if (mysqli_query($conn, $delete_sql)) {
        echo "Album deleted successfully.";
        header("Location: edit_album.php");
        exit;
    } else {
        echo "Error deleting album: " . mysqli_error($conn);
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
            font-family: Georgia, serif;
            background-color: palevioletred;
        }
        header {
            background-color: #cc3d68;
            color: white;
            padding: 10px;
            text-align: center;
        }
        main {
            margin: 100px;
            padding-top: 30px;
            padding-left: 70px;
            padding-right: 70px;
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
        header {
            background-color: #cc3d68;
            color: white;
            padding: 10px;
            height: 10vh;
            width: 100%;
            position: fixed;
            top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 18px;
        }
        th {
            background-color: #cc3d68;
            color: white;
            text-align: center;
            font-size: 20px;
        }
        td.actions {
            text-align: center;
        }
        button {
            padding: 7px 14px;
            background-color: #cc3d68;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 1 0px;
            font-size: 15px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #b5335e;
        }
        .back-btn {
            padding: 10px 20px;
            background-color: #cc3d68;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Album</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Date</th>
                <th></th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['artists_name'] . "</td>";
                echo "<td>" . $row['release_date'] . "</td>";
                echo "<td class='actions'>";
                echo "<a href='edit_album_details.php?album_id=" . $row['album_id'] . "'><button>Edit</button></a>";
                echo "<form method='post' style='display: inline;'><button type='submit' name='delete' value='" . $row['album_id'] . "'>Delete</button></form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <button type="button" class="back-btn" onclick="window.location.href='panel_admin.php';">Back</button>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
