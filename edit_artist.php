<?php
include_once 'config.php';

$sql = "SELECT * FROM artists";
$result = mysqli_query($conn, $sql);

function deleteArtist($artist_id) {
    global $conn;
    $delete_albums_sql = "DELETE FROM albums WHERE artist_id = $artist_id";
    mysqli_query($conn, $delete_albums_sql);
    $delete_sql = "DELETE FROM artists WHERE artist_id = $artist_id";
    if (mysqli_query($conn, $delete_sql)) {
        echo "Artist deleted successfully.";
        header("Location: edit_artist.php");
        exit;
    } else {
        echo "Error deleting artist: " . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {
    $artist_id_to_delete = $_POST['delete'];
    deleteArtist($artist_id_to_delete);
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
            margin: 80px;
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
            padding: 10px 20px;
            background-color: #cc3d68;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px;
            font-size: 18px;
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
        button:hover {
            background-color: #b5335e;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Artist</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['artist_name'] . "</td>";
                echo "<td class='actions'>";
                echo "<a href='edit_artist_details.php?artist_id=" . $row['artist_id'] . "'><button>Edit</button></a>";
                echo "<form method='post' style='display: inline;'><button type='submit' name='delete' value='" . $row['artist_id'] . "'>Delete</button></form>";
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
