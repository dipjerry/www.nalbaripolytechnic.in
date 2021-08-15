<?php
require("./class/link.php");
require("./admin/server.php");

?>
<html>

<head>
    <title> <?php
            myTitle();
            ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="images/icon.png" type="image/icon type">
    <!-- Css links -->
    <link rel="stylesheet" href="css/css/all.css">
    <link rel="stylesheet" href="css/marque.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/thmbSlider.css">
    <link rel="stylesheet" href="css/responsive.css" media="screen and (max-width: 1200px)">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/Dtabs.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Js links -->
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/thumb-slider.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</head>

<body>
    <header>
        <div class="parallex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 col-3">
                        <img class="img-fluid img1" src="images/logo.png">
                    </div>

                    <div class="col-md-7 col-9">
                        <center>
                            <span class="logo-text1">NALBARI </span>
                            <span class="logo-text2">POLYTECHNIC</span>
                        </center>
                        <div class="sub-text">
                            <p>
                                <center>CHANDKUCHI
                                    <br>
                                    E.S.T.D-2017</center>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="SideText"><a class="SideTextLink" href="#">MHRD-Digital Initiative</a></div>
        </div>


        <!-- 
        <div class="logo">
            <img class="img img-responsive img1" src="images/logo.png">
            <p><b>
                    <center><span class="logo-text1">NALBARI </span> <span class="logo-text2">POLYTECHNIC</span></center>
                </b></p>
            <div class="sub-text">
                <p>
                    <center>CHANDKUCHI</center>
                </p>
                <p>
                    <center>E.S.T.D-2017</center>
                </p>
            </div>
            <div class="SideText"><a class="SideTextLink" href="#">MHRD-Digital Initiative</a></div>
        </div> -->

        <!-- navbar -->
    </header>
    <!--/body-content-->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background-color:#512da8">
        <a href="?lnk=home" class="nav-item nav-link"><i class="fas fa-home"></i></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav overflow-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">DEPARTMENTS</a>
                    <div class="dropdown-menu  overflow-auto">
                        <a href="?lnk=electrical" class="dropdown-item">ELECTRICAL</a>
                        <a href="?lnk=computer" class="dropdown-item">COMPUTER</a>
                        <a href="?lnk=printing" class="dropdown-item">PRINTING</a>
                        <a href="?lnk=science" class="dropdown-item">SCIENCE</a>
                        <a href="?lnk=humanities" class="dropdown-item">HUMANITIES</a>
                        <a href="?lnk=workshop" class="dropdown-item">B.W.P</a>
                    </div>
                </div>
                <a href="?lnk=faculties" class="nav-item nav-link">FACULTIES</a>
                <a href="?lnk=gallery" class="nav-item nav-link">PHOTOS</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ACADEMICS</a>
                    <div class="dropdown-menu  overflow-auto">
                        <a href="?lnk=admission" class="dropdown-item">ADMISSION</a>
                        <a href="?lnk=timeTable" class="dropdown-item">TIME TABLE</a>
                        <a href="?lnk=rules" class="dropdown-item">REGULATION</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">FACILITIES</a>
                    <div class="dropdown-menu">
                        <a href="?lnk=library" class="dropdown-item">LIBRARY</a>
                        <a href="#" class="dropdown-item">CANTEEN</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">AICTE EOA </a>
                    <div class="dropdown-menu">
                        <a target="_blank" href="document/eoa18-19.pdf" class="dropdown-item">EOA 2018-19</a>
                        <a target="_blank" href="document/eoa19-20.pdf" class="dropdown-item">EOA 2019-20</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">AISHE</a>
                    <div class="dropdown-menu">
                        <a target="_blank" href="document/aishe18-19.pdf" class="dropdown-item">AISHE 2018-19</a>
                        <a target="_blank" href="document/aishe19-20.pdf" class="dropdown-item">AISHE 2019-20</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">STUDENTS' ZONE </a>
                    <div class="dropdown-menu">
                        <a href="?lnk=2NDSEMESTER" class="dropdown-item">2ND SEMESTER</a>
                        <a href="?lnk=4THSEMESTER" class="dropdown-item">4TH SEMESTER</a>
                        <a href="?lnk=6THSEMESTER" class="dropdown-item">6TH SEMESTER</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">COMMITTEE</a>
                    <div class="dropdown-menu nav_scroll  overflow-auto">
                        <a target="_blank" class="dropdown-item" href="document/AcademicCouncil.PDF">Academic Council</a>
                        <a target="_blank" class="dropdown-item" href="document/Antiragging.pdf">Anti Ragging Committee </a>
                        <a target="_blank" class="dropdown-item" href="document/AntiSquad.pdf">Anti Ragging Squad</a>
                        <a target="_blank" class="dropdown-item" href="document/Grievance.pdf">Grievance Redrassale Committee</a>
                        <a target="_blank" class="dropdown-item" href="document/InternalCC.pdf">Internal Complaint Committee</a>
                        <a target="_blank" class="dropdown-item" href="document/Library.pdf">Library Automation</a>
                        <a target="_blank" class="dropdown-item" href="document/Purchase.PDF">Purchase Committee</a>
                        <a target="_blank" class="dropdown-item" href="document/QualityAssurance.pdf">Quality Assurance Cell</a>
                        <a target="_blank" class="dropdown-item" href="document/RTI.pdf">RTI ACT 2005</a>
                        <a target="_blank" class="dropdown-item" href="document/scst.pdf">SC/ST Harassment Complaint</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ABOUT</a>
                    <div class="dropdown-menu  overflow-auto">
                        <a href="?lnk=about" class="dropdown-item">ABOUT NALPO</a>
                        <a href="?lnk=contact" class="dropdown-item">CONTACT</a>
                    </div>
                </div>
            </div>
    </nav>
    <?php
    require($objURL->page);
    ?>
    <!-- footer -->
    <footer class="page-footer" style="background-color:#f5f5f5; padding-top: 20px">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-uppercase">Anti-Ragging</h5>
                    <p>Prevention and prohibition of Ragging in technical Institutions, Universities including Deemed to be Universities imparting technical education.</p>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">Important Link</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://www.aicte-india.org/" target="_blank">AICTE</a>
                        </li>
                        <li>
                            <a href="https://dte.assam.gov.in/" target="_blank">DTE</a>
                        </li>
                        <li>
                            <a href="https://directorateofhighereducation.assam.gov.in/" target="_blank">DHE</a>
                        </li>
                        <li>
                            <a href="https://scholarships.gov.in/fresh/studentRegistration.action" target="_blank">SCHOLARSHIP</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3573.7608434755366!2d91.41628011408595!3d26.398913088376457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a333a3c369e27%3A0xf0a2fa59f5dcdf4f!2sNalbari+Polytechnic!5e0!3m2!1sen!2sin!4v1546936788952" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="social-media">
            <div>
                <center>
                    <a href="#" target="_blank"><img src="images/fb3.png" style="height: 30px;margin-right: 10px" class="social-fb"></a>
                    <a href="#" target="_blank"><img src="images/g%2b.png" style="height: 30px;margin-right: 10px" class="social-google"></a>
                    <a href="#" target="_blank"><img src="images/tw.png" style="height: 30px;" class="social-twitter"></a>
                </center>
            </div>
        </div>
        <div class="footer-copyright text-center py-1"><small> Copyright© 2018 -
                <?php echo date("Y");
                $fp = fopen("counterlog.txt", "r");
                $count = fread($fp, 1024);
                fclose($fp);
                echo "<br>You are visitor number:" . $count . "";
                ?></small> </div>
    </footer>
</body>

</html>