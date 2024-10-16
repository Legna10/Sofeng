<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - K-pop Album Review</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: palevioletred;
        }
        footer {
            background-color: #cc3d68;
            color: white;
            padding: 6px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .login-container {
            width: 400px;
            padding-left: 20px;
            padding-right: 22px;
            padding-top: 25px;
            padding-bottom: 16px;
            background-color: #fff;
            border: 3px solid white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 15px;
        }
        .login-form label {
            display: block;
            margin-bottom: 2px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #cc3d68;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-form button[type="submit"]:hover {
            background-color: palevioletred;
        }
        .help-block {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Login | K-pop Album Review</h1>
    </header>
    <main>
        <div class="login-container">
            <h2>Login</h2>
            <?php
            session_start();

            include_once 'config.php';

            if(isset($_SESSION["user_id"])) {
                header("Location: home.php");
                exit;
            }

            $username = $password = "";
            $username_err = $password_err = "";

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(empty(trim($_POST["username"]))) {
                    $username_err = "Please enter your username.";
                } else {
                    $username = trim($_POST["username"]);
                }
                if(empty(trim($_POST["password"]))) {
                    $password_err = "Please enter your password.";
                } else {
                    $password = trim($_POST["password"]);
                }

                //validate credentials
                if(empty($username_err) && empty($password_err)) {
                    $sql = "SELECT user_id, username, password FROM users WHERE username = ?";

                    if($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "s", $param_username);

                        $param_username = $username;

                        if(mysqli_stmt_execute($stmt)) {
                            mysqli_stmt_store_result($stmt);

                            //check if username exists, if yes then verify password
                            if(mysqli_stmt_num_rows($stmt) == 1) {
                                mysqli_stmt_bind_result($stmt, $user_id, $username, $hashed_password);
                                if(mysqli_stmt_fetch($stmt)) {
                                    if(password_verify($password, $hashed_password)) {
                                        //password is correct, start a new session
                                        session_start();

                                        $_SESSION["user_id"] = $user_id;
                                        $_SESSION["username"] = $username;
                            
                                        if($username === 'admin') {
                                            header("location: panel_admin.php");
                                        } else {
                                            header("location: albums.php");
                                        }
                                    } else {
                                        $password_err = "Invalid username or password.";
                                    }
                                }
                            } else {
                                $username_err = "Invalid username or password.";
                            }                            
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        mysqli_stmt_close($stmt);
                    }
                }
                mysqli_close($conn);
            }
            ?>

            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
                <br/>Don't have an account? <a href="sign-up.php">Sign up now</a>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
