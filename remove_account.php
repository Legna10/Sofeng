
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Account - K-pop Album Review</title>
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
        .remove-container {
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
        .remove-container h2 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 15px;
        }
        .remove-form label {
            display: block;
            margin-bottom: 2px;
        }
        .remove-form input[type="text"],
        .remove-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .remove-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #cc3d68;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .remove-form button[type="submit"]:hover {
            background-color: palevioletred;
        }
        .help-block {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Remove Account | K-pop Album Review</h1>
    </header>
    <main>
        <div class="remove-container">
            <h2>Remove Account</h2>
            <?php
            session_start();
            include_once 'config.php';

            if (!isset($_SESSION["user_id"])) {
                header("Location: login.php");
                exit;
            }

            $user_id = $_SESSION["user_id"];
            $confirm_password = $confirm_password_err = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty(trim($_POST["confirm_password"]))) {
                    $confirm_password_err = "Please enter your password to confirm.";
                } else {
                    $confirm_password = trim($_POST["confirm_password"]);
                }

                if (empty($confirm_password_err)) {
                    if (trim($_POST["confirmation"]) !== "REMOVE") {
                        $confirm_password_err = "Please type 'REMOVE' to confirm.";
                    } else {
                        $sql = "SELECT password FROM users WHERE user_id = ?";

                        if ($stmt = mysqli_prepare($conn, $sql)) {
                            mysqli_stmt_bind_param($stmt, "i", $param_user_id);

                            $param_user_id = $user_id;

                            if (mysqli_stmt_execute($stmt)) {
                                mysqli_stmt_store_result($stmt);

                                //check if the user exists
                                if (mysqli_stmt_num_rows($stmt) == 1) {
                                    mysqli_stmt_bind_result($stmt, $hashed_password);
                                    if (mysqli_stmt_fetch($stmt)) {
                                        //verify the entered password
                                        if (password_verify($confirm_password, $hashed_password)) {
                                            $delete_sql = "DELETE FROM users WHERE user_id = ?";
                                            if ($delete_stmt = mysqli_prepare($conn, $delete_sql)) {
                                                mysqli_stmt_bind_param($delete_stmt, "i", $param_user_id);

                                                if (mysqli_stmt_execute($delete_stmt)) {
                                                    session_destroy();
                                                    header("Location: login.php");
                                                    exit;
                                                } else {
                                                    echo "Oops! Something went wrong. Please try again later.";
                                                }
                                                mysqli_stmt_close($delete_stmt);
                                            }
                                        } else {
                                            $confirm_password_err = "Password does not match.";
                                        }
                                    }
                                } else {
                                    header("Location: login.php");
                                    exit;
                                }
                            } else {
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }
                }

                mysqli_close($conn);
            }
            ?>
            <form class="remove-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p>Are you sure you want to remove your account? This action cannot be undone.</p>
                <div>
                    <label>Password</label>
                    <input type="password" name="confirm_password">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <br>
                <div>
                    <label>Please type "REMOVE"</label>
                    <input type="text" name="confirmation">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <br>
                <div>
                    <button type="submit">Remove Account</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> K-pop Album Review</p>
    </footer>
</body>
</html>

