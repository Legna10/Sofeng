<<<<<<< HEAD
<?php
session_start();

include_once 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];

    $sql = "SELECT users.username, reviews.review_text FROM reviews INNER JOIN users ON reviews.user_id = users.user_id WHERE reviews.album_id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $album_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $username, $review_text);
        
        $reviews = [];
        while (mysqli_stmt_fetch($stmt)) {
            $reviews[] = ['username' => $username, 'review_text' => $review_text];
        }

        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['album_id']) && isset($_POST['review_content'])) {
    $user_id = $_SESSION["user_id"];
    $album_id = $_POST['album_id'];
    $review_content = $_POST['review_content'];

    $sql = "INSERT INTO reviews (user_id, album_id, review_text) VALUES (?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "iis", $user_id, $album_id, $review_content);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: {$_SERVER['PHP_SELF']}?album_id=$album_id");
            exit;
        } else {
            $error_message = "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];

    $sql = "SELECT * FROM albums WHERE album_id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $album_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $album_id, $title, $release_date, $artist_id, $cover_image);

        //Fetch the album details
        if (mysqli_stmt_fetch($stmt)) {
            // Close the first statement
            mysqli_stmt_close($stmt);
            
            //Query to get artist name based on artist_id
            $sql_artist = "SELECT artist_name FROM artists WHERE artist_id = ?";
            if ($stmt_artist = mysqli_prepare($conn, $sql_artist)) {
                mysqli_stmt_bind_param($stmt_artist, "i", $artist_id);
                mysqli_stmt_execute($stmt_artist);
                mysqli_stmt_bind_result($stmt_artist, $artist_name);
                
                mysqli_stmt_fetch($stmt_artist);
                
                mysqli_stmt_close($stmt_artist);
            }
            
            $album_info = [
                'title' => $title,
                'release_date' => $release_date,
                'artist_name' => $artist_name,
                'cover_image' => $cover_image
            ];
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Reviews - K-pop Album Review</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: palevioletred;
            height: auto;
        }
        header {
            background-color: #cc3d68;
            color: white;
            padding: 10px;
            text-align: center;
            width: 100%;
        }
        main {
            padding: 20px 40px;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left:420px;
            background-color: pink;
            border-radius: 10px;
            width: 70%;
            max-width: 600px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #cc3d68;
            color: white;
            padding: 10px;
            text-align: center;
            bottom: 0;
            width: 100%;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        textarea {
            width: 100%;
            height: 50px;
            resize: vertical;
            margin-bottom: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #cc3d68;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #af3358;
        }
        .review-list {
            list-style-type: none;
            padding: 0;
        }
        .review-list li {
            border-bottom: 1px solid #af3358;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .review-list li:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .review-list li strong {
            color: #cc3d68;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
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
        .album-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .album-info img {
            height: 200px;;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .album-info h2 {
            margin-bottom: 5px;
        }
        .album-info p {
            margin-top: 0;
        }
    </style>
<body>
    <header>
        <h1>K-pop Album Review</h1>
    </header>
    <main>
        <?php if (!empty($album_info)) : ?>
            <div class="album-info">
                <img src="<?php echo $album_info['cover_image']; ?>" alt="Album Cover">
                <h2><?php echo $album_info['title']; ?></h2>
                <p>Artist: <?php echo $album_info['artist_name']; ?> <br>Release Date: <?php echo $album_info['release_date']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <?php if (isset($reviews) && !empty($reviews)) : ?>
            <ul class="review-list">
                <?php foreach ($reviews as $review) : ?>
                    <li>
                        <strong><?php echo htmlspecialchars($review['username']); ?>:</strong>
                        <?php echo htmlspecialchars($review['review_text']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No reviews available for this album.</p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="album_id" value="<?php echo htmlspecialchars($_GET['album_id'] ?? ''); ?>">
            <div>
                <label for="review_content">Write your review:</label><br>
                <textarea id="review_content" name="review_content" required></textarea>
            </div>
            <div>
                <input type="submit" value="Submit">
                <button type="button" class="back-btn" onclick="window.location.href='albums.php';">Back</button>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
=======
ini review
>>>>>>> c717e146e3abeb9873f752ec367b00c65d333b68
