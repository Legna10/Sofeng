<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - K-pop Album Review</title>
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
        .signup-container {
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
        .signup-container h2 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 15px;
        }
        .signup-form label {
            display: block;
            margin-bottom: 2px;
        }
        .signup-form input[type="text"],
        .signup-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .signup-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #cc3d68;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .signup-form button[type="submit"]:hover {
            background-color: palevioletred;
        }
        .help-block {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sign Up | K-pop Album Review Platform</h1>
    </header>
    <main>
        <div class="signup-container">
            <h2>Sign Up</h2>
            <?php
            include_once 'config.php';

            $username = $password = $confirm_password = "";
            $username_err = $password_err = $confirm_password_err = "";

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                //validate username
                if(empty(trim($_POST["username"]))) {
                    $username_err = "Please enter a username.";
                } else {
                    $sql = "SELECT user_id FROM users WHERE username = ?";

                    if($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "s", $param_username);

                        $param_username = trim($_POST["username"]);

                        if(mysqli_stmt_execute($stmt)) {
                            mysqli_stmt_store_result($stmt);

                            if(mysqli_stmt_num_rows($stmt) == 1) {
                                $username_err = "This username is already taken.";
                            } else {
                                $username = trim($_POST["username"]);
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        mysqli_stmt_close($stmt);
                    }
                }

                //validate password
                if(empty(trim($_POST["password"]))) {
                    $password_err = "Please enter a password.";     
                } elseif(strlen(trim($_POST["password"])) < 6) {
                    $password_err = "Password must have at least 6 characters.";
                } else {
                    $password = trim($_POST["password"]);
                }

                //validate confirm password
                if(empty(trim($_POST["confirm_password"]))) {
                    $confirm_password_err = "Please confirm password.";     
                } else {
                    $confirm_password = trim($_POST["confirm_password"]);
                    if(empty($password_err) && ($password != $confirm_password)) {
                        $confirm_password_err = "Password did not match.";
                    }
                }

                if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
                    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

                    if($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                        $param_username = $username;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); //creates a password hash

                        if(mysqli_stmt_execute($stmt)) {
                            header("location: login.php");
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        mysqli_stmt_close($stmt);
                    }
                }

                mysqli_close($conn);
            }
            ?>

            <form class="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div>
                    <label>Verify Password</label>
                    <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div>
                    <button type="submit">Sign Up</button>
                </div>
                <br/>Already have an account? <a href="login.php">Login here</a>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>
