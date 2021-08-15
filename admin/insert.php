<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" href="../images/icon.png" type="image/icon type">
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>


    <style>
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
    </style>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn-submit').click(function() {
                var user_name = $("#user_name").val();
                if (user_name == "") {
                    alert("please fill user name");
                    $("#user_name").focus();
                    return (false);
                }
                var user_password = $("#user_password").val();
                if (user_password == "") {
                    alert("please enter password");
                    $("#user_password").focus();
                    return (false);
                }
                return (true);
            });
        });
    </script>
</head>

<body>
    <?php require("config.php"); ?>



    <h1 class="jumbotron">SIGN UP</h1>
    <div class="col-md-3"></div>
    <form name="personal_details" id="personal_details" method="post" class="col-md-6">
        <div <?php if (isset($name_error)) : ?>class="form-group form-error" <?php endif ?>>
            <label for="user_name">USERNAME</label>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="enter your userid" autocomplete="off" required />
            <?php if (isset($name_error)) : ?>
                <span><?php echo $name_error; ?></span>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="user_password">password</label>
            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required />
        </div>
        <div <?php if (isset($name_error2)) : ?> class="form-group form-error" <?php endif ?>>
            <label for="user_email">Email</label>
            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="enter your Email" autocomplete="off" required />
            <?php if (isset($name_error2)) : ?>
                <span><?php echo $name_error2; ?></span>
            <?php endif ?>
        </div>




        <br><br>


        <button type="submit" class="btn btn-primary" name="register" id="btn-submit" value="SUBMIT">Save</button>
        <input type="reset" class="btn " name="btn-submit" id="btn-submit" value="CANCEL">
        <a href='index.php' class="btn btn-dark"><i>already have an account?</i>SIGN UP</a>

    </form>
    <div class="col-md-3"></div>

</body>

</html>