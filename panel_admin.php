<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - K-pop Album Review</title>
    <style>
        body {
            margin: 0;
            font-family: Georgia, serif;
            padding-bottom: 50px;
        }
        header {
            background-color: #cc3d68;
            color: white;
            padding: 7px;
            position: fixed;
            width: 100%;
            top: 0;
        }
        main {
            padding: 25px;
            padding-bottom: 70px;
            min-height: 78vh;
            background-color: palevioletred;
            display: flex;
            justify-content: center; 
            align-items: center;
        }
        footer {
            background-color: #cc3d68;
            color: white;
            padding: 7px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .kere a {
            font-size: 40px;
            font-weight: bold;
            margin-left: 18px;
            float: left;
            padding-top: 13px;
            text-decoration: none;
            color: white;
        }
        .menu {
            float: right;
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
        p.main-text {
            color: white;
            font-size: 24px;
            margin: 0 100px;
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
            </div>
        </nav>  
    </header>
    <main>
        <p class="main-text">Welcome to the Admin Panel of K-pop Album Review. Here, you have the power to shape the K-pop music landscape by managing artist and album information. Your dedication and efforts contribute to the vibrant world of K-pop. Keep up the great work!</p>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
=======
ini admin
>>>>>>> c717e146e3abeb9873f752ec367b00c65d333b68
