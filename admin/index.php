<?php
session_start();
if (isset($_SESSION["NALPO"]) && $_SESSION["NALPO"] === true) {
    header("location: ./dash.php");
    exit;
}
require_once "server.php";
$username = $password = "";
$username_err = $password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    if (empty($username_err) && empty($password_err)) {
        $sql = "select * from register WHERE user_name = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $user_email);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($pass = $hashed_password) {
                            session_start();
                            $_SESSION["NALPO"] = true;
                            $_SESSION["NALPO_admin_id"] = $id;
                            $_SESSION["NALPO_admin_username"] = $username;
                            header("location: ./dash.php");
                        } else {
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $username_err = "No account found with that username.";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" href="../images/icon.png" type="image/icon type">
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style type="text/css">
        #personal_details {
            margin: 0 auto;
            width: auto
        }

        .form_error span {
            width: 80%;
            height: 35px;
            margin: 3px 10%;
            font-size: 1.1em;
            color: #D83D5A;
        }

        .form_error input {
            border: 1px solid #D83D5A;
        }

        body {
            margin: 0px;
            font: 14px sans-serif;
        }
    </style>
</head>

<body>
    <div class="jumbotron">
        <h2>Login</h2>
        <p>Please fill this form to create an account.</p>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="personal_details" method="post" class="col-md-6" autocomplete="off">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required autocomplete="new-password">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
    </form>
</body>

</html>