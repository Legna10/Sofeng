<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 881d20d53de2b979095c17201ab59d1f898efc7f
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums - K-pop Album Review</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            height: 100vh;;
            font-family: Georgia, serif;
        }
        header {
            background-color: #cc3d68;
            color: white;
            padding: 10px;
            height: 10vh;
            width: 100%;
            position: fixed;
        }
        main {
            height: auto;
            background-color: palevioletred;
            padding: 100px 50px;
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
        .album-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .album {
            margin: 10px;
        }
        .album img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
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
        </nav>  
    </header>
    <main>
        <div class="album-container">
            <?php
            include_once 'config.php';

            $sql = "SELECT * FROM albums";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $album_id = $row['album_id'];
                    $album_cover = $row['cover_image'];

                    echo "<div class='album'>";
                    echo "<a href='add_review.php?album_id=$album_id'>";
                    echo "<img src='$album_cover' alt='Album Cover'>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "No albums found.";
            }
            $conn->close();
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
<<<<<<< HEAD
=======
album
>>>>>>> f90bd36a467a4d2e12d6347750c0265843091332
=======
>>>>>>> 881d20d53de2b979095c17201ab59d1f898efc7f
