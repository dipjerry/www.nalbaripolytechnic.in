<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Allumuni</title>
    <link rel="icon" href="images/icon.png" type="image/icon type">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Js links -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Js links -->
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/cities.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body,
        html {
            overflow-x: hidden;
            height: 100%;
            /* background-attachment: fixed; */
            /* height: 100%; */
        }

        .required {
            color: red;
        }

        textarea {
            resize: vertical;
        }



        .bg-image {
            /* The image used */
            background-image: url("images/S1.jpg");

            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(8px);

            /* Full height */
            height: 90%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Position text in the middle of the page/image */
        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background-color:#512da8">
        <a class="navbar-brand" href="index"><b>Nalbari Polytechnic Allumuni</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav overflow-auto">
                <span <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>> <a href="allumuni?q=1" class="nav-item nav-link">Register</a> </span>
                <span <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>> <a href="allumuni?q=2" class="nav-item nav-link">View</a> </span>
                <span <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>> <a href="allumuni?q=0" class="nav-item nav-link">Back to main menu</a> </span>
            </div>
        </div>
    </nav>
    <div class="alert alert-warning alert-dismissible fade show" id="error-alert" style="display: none;">
        <strong>Warning!</strong>
        <span id="error-message"></span>
        <button type="button" class="close" id="error">
            &times;
        </button>
    </div>
    <div class="alert alert-success alert-dismissible fade show" id="success-alert" style="display: none;">
        <strong>Success!</strong>
        <span id="success-message"></span>
        <button type="button" class="close" id="success">
            &times;
        </button>
    </div>
    <!-- <div class="container"> -->
    <?php
    if (@$_GET['q'] == 0) {
    ?>

        <div class="bg-image"></div>

        <div class="bg-text">
            <h2>Nalbari Polytechnic</h2>
            <h1 style="font-size:50px">Allumuni Association</h1>
            <p> </p>
            <span <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>><button type="button" onclick="location.href='allumuni?q=1';" class="btn btn-outline-light">Register</button></span>
        </div>

    <?php
    }
    ?>


    <?php if (@$_GET['q'] == 1) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-12 text-center text-uppercase">
                        <h1>Membership Form</h1>
                    </div>
                    <div class="col-lg-12">
                        <form id="form-work">
                            <!-- <div id="error-message"></div> -->

                            <div id="success-message"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="roll" style="font-weight: bold;color: black;">Roll no <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="a_roll" id="a_roll" class="form-control" placeholder="NAL/YY/BRANCH/CODE" type="text" autocomplete="OFF" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name" style="font-weight: bold;color: black;">Name <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="a_name" id="a_name" class="form-control" placeholder="Enter name" type="text" autocomplete="OFF" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email" style="font-weight: bold;color: black;">Email Id <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="a_email" id="a_email" class="form-control" placeholder="Enter email id" type="email" autocomplete="OFF" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="a_achiev" style="font-weight: bold;color: black;">Special Achievement during studenship or
                                            any Union portfolio during the period of study </label>
                                        <textarea name="a_achiev" id="a_achiev" class="form-control" placeholder="Enter Special Achievement" autocomplete="OFF" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="p_address" style="font-weight: bold;color: black;">Permanent Address <span style="color: red; font-weight: bold;">*</span></label>
                                        <textarea name="p_addr" id="p_addr" class="form-control" placeholder="Enter permanent address" autocomplete="OFF" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="" style="font-weight: bold;color: black;">State <span style="color: red; font-weight: bold;">*</span></label>
                                        <select onchange="print_city('city-list', this.selectedIndex);" name="a_state" id="state-list" class="form-control" style="width: 100%;" onChange="getCity(this.value);" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="" style="font-weight: bold;color: black;">City<span style="color: red; font-weight: bold;">*</span></label>
                                        <select name="a_cty" id="city-list" class="form-control" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                                <script language="javascript">
                                    print_state("state-list");
                                </script>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="" style="font-weight: bold;color: black;">PIN No.<span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="a_pin" class="form-control" placeholder="Enter PIN No." type="text" maxlength="6" autocomplete="OFF">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="mobile" style="font-weight: bold;color: black;">Mobile Number <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="a_mobile" id="a_mobile" class="form-control" placeholder="Enter mobile number" maxlength="10" type="number" autocomplete="OFF" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="mobile" style="font-weight: bold;color: black;">Whatsapp Number <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="a_Wno" id="a_Wno" class="form-control" placeholder="Enter Whatsapp number" maxlength="10" type="number" autocomplete="OFF" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="" style="font-weight: bold;color: black;">Official Contact Number</label>
                                        <input name="o_code" id="o_code" class="form-control" placeholder="STD" type="number" maxlength="4" style="width: 25%;" autocomplete="OFF">
                                        <input name="a_phone" id="a_phone" class="form-control" placeholder="Number" type="number" maxlength="7" style="width: 68%;float: right;margin-top: -38px;margin-right: 5%;" autocomplete="OFF">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="occp" style="font-weight: bold;color: black;">Present Occupation <span style="color: red; font-weight: bold;">*</span></label>
                                        <select name="occp" id="occp" class="form-control" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="Student">Student</option>
                                            <option value="Employed">Employed</option>
                                            <option value="Self Employed">Self Employed</option>
                                            <option value="Retired">Retired</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="org" style="font-weight: bold;color: black;">Organization/Institution <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="org" id="org" class="form-control" placeholder="Enter Organization/Institution name" type="text" autocomplete="OFF" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="desig" style="font-weight: bold;color: black;">Designation</label>
                                        <input name="desig" id="desig" class="form-control" placeholder="Enter designation" type="text" autocomplete="OFF">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="branch" style="font-weight: bold;color: black;">Branch of Engineering <span style="color: red; font-weight: bold;">*</span></label>
                                        <select name="branch" id="branch" class="form-control" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="CSE">Computer Science & Engg</option>
                                            <option value="EEE">Electrical</option>
                                            <option value="PT">Printing Technology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="passing" style="font-weight: bold;color: black;">Year of passing <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="pass_y" id="pass_y" class="form-control" placeholder="Enter Year of passing" maxlength="4" type="number" autocomplete="OFF" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="" style="font-weight: bold;color: black;">Your Photo <span style="color: red; font-weight: bold;">*</span> <span style="font-weight: lighter; font-size:12px; color: red">(Type: JPEG , JPEG. Size < 200kb)</span> </label>
                                         <input name="a_pic" id="a_pic" class="form-control" type="file" required>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="preview_tPhoto col-6 col-sm-2 d-flex justify-content-center" id="preview_tPhoto">
                                        <img src="" id="profileDisplay" style="width: 100%;">
                                    </div>
                                    <img src="./images/blank.png" class="col-6 col-sm-4 img-thumbnail" id="a_photo" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="passing" style="font-weight: bold;color: black;">Fee Amount:- </label>
                                        <span><b>&#8377; 500</b></span>
                                        <br>
                                        <span style="color:red"><b>Note:-</b></span>
                                        <ul>
                                            <li>money will be deducted from ....................................................</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="cash_dtl" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" style="font-weight: bold;color: black;">Payment Date <span style="color: red; font-weight: bold;">*</span></label>
                                        <input name="dd_date" id="dd_date" class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">&nbsp;</div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-content-center text-center">
                                        <button type="submit" id="save-button" name="add_alm" class="btn btn-primary text-uppercase mt-20">Submit</button>
                                        <button type="reset" id="reset-button" name="reset_alm" class="btn btn-danger text-uppercase mt-20">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-dark  justify-content-center" style="background-color:#512da8">
            <span class="navbar-brand">Navbar</span>
        </nav>
    <?php } ?>
    <?php
    if (@$_GET['q'] == 2) {
    ?><div class="row">
            <div class="col-md-12">
                <table class="table table-responsive">
                    <tr class="text-center">
                        <td class="text-center" id="table-data">
                        </td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function() {

                            // Displaying and search 

                            function loadTable() {
                                $.ajax({
                                    url: "class/functions.php",
                                    type: "POST",
                                    data: {
                                        method: 'load',
                                    },
                                    success: function(data) {
                                        $("#table-data").html(data);
                                    }
                                });
                            }
                            loadTable(); // Load Table Records on Page Load


                        });
                    </script>

            </div>
        </div>

    <?php

    } ?>

    <script type="text/javascript">
        $(document).ready(function() {
            // photo validation
            // Validate Uploaded Pphotos size and extension
            $("#a_pic").change(function() {
                // echo("groot");
                readURL(this);
            });

            function readURL(input) {
                var a = (input.files[0].size);
                var name = input.files[0].name;
                var ext = name.split('.').pop().toLowerCase();
                if ($.inArray(ext, ['jpg', 'jpeg']) == -1) {
                    alert('invalid extension!');
                    input.value = "";
                } else {
                    if (a > 2000000) {
                        alert("Image size too large");
                        input.value = "";
                    } else {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                // alert(e.target.result);
                                $('#a_photo').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                }
            }
            // validate phone no
            $("#a_mobile").on("blur", function() {
                var mobNum = $(this).val();
                var filter = /^\d{10}$/;
                if (mobNum != "") {
                    if (!mobNum.match(filter)) {
                        $("#a_mobile").focus();
                        alert("must required 10 digit ");
                    }
                }
            });
            // validated Email
            // Email Validation
            // data_dissmiss
            $('input[type=text').on("keyup", function() {
                $(this).val($(this).val().toUpperCase());
            });
            $('#success').on("click", function() {
                $("#success-message").hide();

            });
            $('#error').on("click", function() {
                // alert("hide");
                $("#error-message").hide();

            });
            //Populate form 
            $("#a_roll").on("blur", function() {
                // alert("test1");
                var filter_term = $(this).val();
                if (filter_term != '') {
                    $.ajax({
                        url: "class/functions.php",
                        type: "POST",
                        data: {
                            method: 'getData',
                            roll: filter_term
                        },
                        dataType: "html",
                        success: function(response) {
                            // alert(response);
                            var result = JSON.parse(response);
                            if (result.response == true) {
                                var data = result.rows;
                                $('#a_name').val(data[0].Student_Name)
                                $('#branch').val(data[0].Branch)
                                $('#a_name').attr('readonly', true)
                                $('#branch').attr('readonly', true)
                            } else if (result.response == false) {
                                // alert("fails");
                                $("#error-alert").show();
                                $("#error-message").html("No Record Found").show();
                                // $("#error-message").show();

                                $('#a_name').val('')
                                $('#a_roll').val('')
                                $('#a_name').attr('readonly', false)
                                $('#branch').attr('readonly', false)
                                $('#branch').val('')
                            }
                        }
                    });
                }
            });
            // save data to database
            $("#save-button").on("click", function(e) {
                e.preventDefault();
                var form_data = new FormData();
                // if (tName == "" || tDesig == "" || tDOJ == "" || tPho == "" || tQualif == "") {
                //     $("#error-message").html("All fields are required.").slideDown();
                //     $("#success-message").slideUp();
                // } else {
                // var form_data = new FormData();
                form_data.append("file", $('input[name=a_pic]')[0].files[0]);
                form_data.append("Roll", $('input[name=a_roll]').val());
                form_data.append("name", $('input[name=a_name]').val());
                form_data.append("Email", $('input[name=a_email]').val());
                form_data.append("Achievment", $('textarea[name=a_achiev]').val());
                form_data.append("Address", $('textarea[name=p_addr]').val());
                form_data.append("State", $('select[name=a_state]').val());
                form_data.append("City", $('select[name=a_cty]').val());
                form_data.append("Pin", $('input[name=a_pin]').val());
                form_data.append("Mobile", $('input[name=a_mobile]').val());
                form_data.append("wMobile", $('input[name=a_Wno]').val());
                form_data.append("OcnC", $('input[name=o_code]').val());
                form_data.append("OcnN", $('input[name=a_phone]').val());
                form_data.append("Occupation", $('select[name=occp]').val());
                form_data.append("Organization", $('input[name=org]').val());
                form_data.append("Designation", $('input[name=desig]').val());
                form_data.append("Branch", $('select[name=branch]').val());
                form_data.append("Pass_year", $('input[name=pass_y]').val());
                form_data.append("method", "add");
                // form_data.append("tPho", $('input[name=tPho]').val());
                $.ajax({
                    url: "class/functions.php",
                    type: "POST",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // $("#success-message").html(data);
                        if (response == 1) {
                            // $("#addForm").trigger("reset");
                            bootbox.alert("User has been added successfully.", function() {
                                window.location.href = "allumuni?q=2";
                            });
                            loadTable();

                            // $("#success-message").html("Data Inserted Successfully.").slideDown();
                            // $("#error-message").slideUp();   
                        } else if (response == 0) {
                            $("#error-alert").show();
                            $("#error-message").html("Can't Save Record.").show();
                            // $("#success-message").slideUp();
                        } else if (response == 3) {
                            $("#error-alert").show();
                            $("#error-message").html("Record already saved").show();
                            // $("#success-message").slideUp();
                        } else {
                            $("#success-message").html(data);
                        }
                    }
                });
                //    }
            });
        });
        $('#success').on("click", function() {
            $("#success-alert").hide();

        });
        $('#error').on("click", function() {
            // alert("hide");
            $("#error-alert").hide();

        });
    </script>

</body>

</html>