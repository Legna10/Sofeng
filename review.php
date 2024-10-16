<<<<<<< HEAD
<?php
session_start();

include 'config.php';

function escape($str) {
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

function deleteReview($review_id) {
    global $conn;
    $review_id = escape($review_id);
    $delete_query = "DELETE FROM Reviews WHERE review_id = '$review_id'";
    mysqli_query($conn, $delete_query);
}

$review_query = "SELECT Reviews.*, users.username FROM Reviews INNER JOIN users ON Reviews.user_id = users.user_id";
$review_result = mysqli_query($conn, $review_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review - K-pop Album Review</title>
    <style>
        body {
            margin: 0px;
            height: 10vh;;
            font-family: Georgia, serif;
            background-color: palevioletred;
        }
        header {
            background-color: #cc3d68;
            color: white;
            padding: 14px;
            height: 10vh;
            width: 100%;
            position: fixed;
            top: 0;
        }
        main {
            height: 90vh;
            margin-left: 50px;
            margin-top: 120px;
            text-align: center;
            margin-right: 50px;
        }
        footer {
            background-color: #cc3d68;
            color: white;
            padding: 6px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .kere a{
            font-size: 40px; 
            font-weight: 680; 
            margin-left: 18px; 
            float: left;
            padding-top: 13px;
            text-decoration: none;
            color: white;
        }
        .menu {
            float:right;
            font-size: 27px;
            padding-right: 20px;
        }
        .menu ul li {
            display: inline;
            margin-right: 45px;
        }
        .menu ul li a {
            text-decoration: none;
            color: white; 
        }
        .logout {
            float: right;
            margin-top: 15px;
            background: #e28b99;
            border: 2px solid #fff;
            border-radius: 20px;
            padding: 10px;
            color: #FFFFFF;
            cursor: pointer;
            font-weight: bold;
            margin-right: 38px;
            width: 100px;
            height: 40px;
            text-align: center;
            text-decoration: none;
    
        }
        .logout:hover {
            background: #ee9a9a;
            text-decoration: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: pink;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
            border-radius: 10px;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: palevioletred;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropbtn {
            background-color: #cc3d68;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #cc3d68;
            color: white;
        }
        tr:nth-child(even) {
            background-color: pink;
        }
        form {
            display: inline;
        }
        button {
            background-color: #cc3d68;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 7px 12px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #af3057;
        }
        h1 {
            color: white;
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
        <nav>
            <div class="kere"><a href="panel_admin.php">K-Review</a></div>
            <div class="menu">
                <ul>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Add</a>
                        <div class="dropdown-content">
                            <a href="add_artist.php">Artist</a>
                            <a href="add_album.php">Album</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Edit</a>
                        <div class="dropdown-content">
                            <a href="edit_artist.php">Artist</a>
                            <a href="edit_album.php">Album</a>
                        </div>
                    </li>
                    <li><a href="review.php">Review</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Profile</a>
                        <div class="dropdown-content">
                            <a href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>  
    </header>
    <main>
        <h1>All Reviews</h1>
        <?php 
        if ($review_result && mysqli_num_rows($review_result) > 0) {
            echo "<table>";
            echo "<tr><th>Username</th><th>Review Text</th><th> </th></tr>";
            while ($review = mysqli_fetch_assoc($review_result)) {
                echo "<tr>";
                echo "<td>" . $review['username'] . "</td>";
                echo "<td>" . $review['review_text'] . "</td>";
                echo "<td><form method='post'><input type='hidden' name='review_id' value='" . $review['review_id'] . "'>
                <button type='submit' name='delete'>Delete</button></form></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No reviews yet.";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
            $review_id_to_delete = $_POST['review_id'];
            deleteReview($review_id_to_delete);
            header("Location: review.php");
            exit;
        }
        ?>
        <br/>
        <button type="button" class="back-btn" onclick="window.location.href='panel_admin.php';">Back</button>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
=======
review
>>>>>>> f90bd36a467a4d2e12d6347750c0265843091332
