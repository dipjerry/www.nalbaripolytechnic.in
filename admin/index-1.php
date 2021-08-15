<?php require("config.php"); ?>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <link rel="icon" href="../images/icon.png" type="image/icon type">
    <link rel="stylesheet" href="../css/bootstrap.min.css">


    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style>
        #personal_details {
            margin: 0 auto;
            width: auto;
        }
    </style>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn-submit').click(function() {
                var user_name = $("#user_name").val();
                if (user_name == "") {
                    alert("please fill firstname");
                    $("#user_name").focus();
                    return (false);
                }
                var user_password = $("#user_password").val();
                if (user_password == "") {
                    alert("please fill lastname");
                    $("#user_password").focus();
                    return (false);
                }
                return (true);
            });
        });
    </script>
</head>

<body>

    <h1 class="jumbotron">LOGIN</h1>
    <div class="col-md-3"></div>
    <form name="personal_details" id="personal_details" method="post" class="col-md-6">
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="enter your username" />
        </div>
        <div class="form-group">
            <label for="user_password">password</label>
            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="enter your password" />
        </div>
        <?php
        if (isset($loginCheck)) {
            echo "Invalid data";
        }
        ?>
        <button type="submit" class="btn btn-primary" name="login" id="btn-submit" value="SUBMIT">Log IN</button>
        <input type="reset" class="btn btn-danger" name="log_cancel" id="btn-submit" value="CANCEL">

    </form>



</body>

</html>