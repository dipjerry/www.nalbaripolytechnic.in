<?php session_start();
if (!isset($_SESSION['login'])) {
    header("location: ./index.php");
}

require("class/logout.php");
require("./class/link.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> <?php
            myTitle();
            ?></title>
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/simple-sidebar.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <script src="./js/jquery.js"></script>
    <!-- <script src="../vendor/jquery/jquery.min.js"></script> -->
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="../../css/font-awesome.min.css"> -->
    <!-- <link href="" rel=" stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Nalbari Polytechnic</div>
            <div class="list-group list-group-flush">
                <a href="?lnk=student_List" class="list-group-item list-group-item-action highlight">Student List</a>
                <a href="?lnk=allumuni_List" class="list-group-item list-group-item-action highlight">Alumuni</a>
                <a href="?lnk=teacher_List" class="list-group-item list-group-item-action highlight">Teacher List</a>
                <a href="?lnk=homeCont_List" class="list-group-item list-group-item-action highlight">Homepage</a>
                <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->
            </div>
        </div>
        <!-- /#sidebar-->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                <button class="btn btn-danger" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item highlight">
                            <a class="nav-link" href="?lnk=home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Log Out</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <?php
                require($objURL->page);
                ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="post">
                        <input type="submit" class="btn btn-danger" name="logout2" id="btn-submit" value="logout">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>