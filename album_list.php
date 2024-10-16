<?php

include_once 'config.php';

$sql = "SELECT YEAR(release_date) AS release_year, GROUP_CONCAT(title) AS album_names 
        FROM albums 
        GROUP BY YEAR(release_date)
        ORDER BY release_year DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums by Year - K-pop Album Review</title>
    <style>
        body {
            margin: 0px;
            height: 10vh;
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
            background-color: pink;
        }
        footer {
            background-color: #cc3d68;
            color: white;
            padding: 6px;
            bottom: 0;
            width: 100%;
            position: fixed;
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
            font-size: 25px;
            padding-right: 20px;
        }
        .menu ul li {
            display: inline;
            margin-right: 42px;
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
        .container {
            padding-top: 100px;
            padding-bottom: 70px;
        }
        h1, h2 {
            color: #cc3d68;
            text-align: center;
        }
        ul {
            list-style-type: none;
            text-align: center;
            padding: 0;
            color: black;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<header>
        <nav>
            <div class="kere"><a href="about_us.php">K-Review</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="albums.php">Album</a></li>
                        <li><a href="album_list.php">List</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Profile</a>
                            <div class="dropdown-content">
                                <a href="logout.php">Logout</a>
                                <a href="remove_account.php">Remove Account</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
        </nav>  
    </header>
    <main>
    <div class="container">
        <h1>Albums by Year</h1>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $year = $row["release_year"];
                    $album_names = explode(',', $row["album_names"]);
                    echo "<h2>$year</h2>";
                    echo "<ul>";
                    foreach ($album_names as $album_name) {
                        echo "<li>$album_name</li>";
                    }
                    echo "</ul>";
                }
            } else {
                echo "No albums found.";
            }
            ?>
    </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
<?php
$conn->close();
?>
