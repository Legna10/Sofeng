<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - K-pop Album Review</title>

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
            padding-top: 10vh;
            min-height: 100vh;
            background-color: palevioletred;
            color: white;
            padding: 20px;
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
            font-weight: bold;
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
        #about-us {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="kere"><a href="home.php">K-Review</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="albums.php">Album</a></li>
                        <li><a href="artist.php">Artist</a></li>
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
        <section id="about-us">
            <h1>About Us</h1>
            <p>Welcome to K-Review, your ultimate destination for K-pop album reviews!</p>
            <p>At K-Review, we are passionate about K-pop and dedicated to providing insightful reviews of the latest albums from your favorite artists.</p>
            <p>Our team of music enthusiasts works tirelessly to bring you in-depth analysis, honest critiques, and engaging discussions about the vibrant world of K-pop music.</p>
            <p>Whether you're a die-hard fan or new to the genre, we invite you to join us on this journey as we explore the captivating melodies, mesmerizing performances, and inspiring stories behind every K-pop album.</p>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
=======
krev
>>>>>>> f90bd36a467a4d2e12d6347750c0265843091332
