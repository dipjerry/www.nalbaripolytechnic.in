<?php
require("../admin/server.php");
// $conn = mysqli_connect('localhost', 'root', '', 'collge_website');
$tab = "AllumuniInfo";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $methods = $_POST['method'];
    if ($methods == "getData") {
        getData($_POST['roll'], $conn);
    } elseif ($methods == "add") {
        add($_POST['Roll'], $_POST['name'], $_POST['Email'], $_POST['Achievment'], $_POST['Address'], $_POST['State'], $_POST['City'], $_POST['Pin'], $_POST['Mobile'], $_POST['wMobile'], $_POST['OcnC'], $_POST['OcnN'], $_POST['Occupation'], $_POST['Organization'], $_POST['Designation'], $_POST['Branch'], $_POST['Pass_year'], $_FILES["file"]["name"], $tab, $conn);
    } elseif ($methods == "branch") {
        filter($_POST['filter'], $_POST['batch'], $conn);
    } elseif ($methods == "batch") {
        batch($_POST['batch'], $conn);
    } elseif ($methods == "load") {
        load($tab, $conn);
    }
}

function getData($roll, $conn)
{
    ob_start();

    $query = "SELECT * FROM  studentinfo WHERE Roll_No ='$roll'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ob_end_clean();
        echo json_encode(['rows' => $data, 'response' => true]);
    } else {
        echo json_encode(['response' => false]);
        // echo "Error: " . $query . "<br>" . $conn->error;
    }
    exit();
}

function add($roll, $name, $email, $achiev, $add, $state, $city, $pin, $mobile, $wNo, $oCod, $oCop, $occp, $org, $desig, $branch, $pass_y, $ImgName, $tab, $conn)
{
    // Create the table to store the data if it doesnot exist from before
   
    // if (mysqli_query($conn, $sql1)) {
    // echo "Table MyGuests created successfully";
    // } else {
    // echo "Error creating table: " . mysqli_error($conn);
    // echo $tab;
    // }
    // Copy images

    // $f_name = $_FILES["Img_name"]["name"];
    $sql2 = "SELECT * FROM $tab WHERE A_Roll = '$roll'";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
        echo 3;
        // echo "You have already registered";
    } else {
        $test = explode('.', $ImgName);
        $roll_no = explode('/', $roll);
        $ext = end($test);
        $Img_loc =  'Allumuni' . $roll_no[1] . $roll_no[2] . $roll_no[3] . '.' . $ext;
        // echo ("$roll_no[1] . $roll_no[1] . $roll_no[2] . $roll_no[3]");
        $location =  '../upload/';
        $uploadfile = $location . basename($Img_loc);
        $target_file = pathinfo($location . basename($Img_loc), PATHINFO_FILENAME);
        if (file_exists($target_file)) {
            unlink($target_file);
            move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile);
            // echo $target_file;
            // echo "image replaced" . $target_file . ' ';
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile);
            // echo $target_file;
            // echo $uploadfile;
        }



        $sql = "INSERT INTO $tab (A_Name, A_Roll, Email, Achiev, Adrs, State, City, Pin, Mob, wNo, OcnC, OcnN, Occu, Org, Desig, Branch, Pass_year, Photo) VALUES ('$name','$roll', '$email','$achiev','$add','$state','$city', '$pin', '$mobile', '$wNo', '$oCod', '$oCop','$occp' ,'$org', '$desig', '$branch', '$pass_y', ' $Img_loc')";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
        // if (mysqli_query($conn, $sql)) {
        //     echo "success successfully $oCod, $oCop,";
        // } else {
        //     echo "Error creating table: " . mysqli_error($conn);
        // }
    }
}

function load($tab, $conn)
{
    $sql = "SELECT * FROM $tab";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $output = "";
    if (mysqli_num_rows($result) > 0) {

?>

        <table class="table">
            <tr>
                <th>Id</th>
                <th>Allumuni</th>
                <!-- <th>Roll no</th> -->
                <th>Achievment</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Current occupation</th>
                <th>Photo</th>
            </tr>
    <?php

        while ($row = mysqli_fetch_assoc($result)) {
            $clean_img = ltrim($row["photo"]);
            $output .= "<tr>
            <td >{$row["id"]}</td>
            <td>
            {$row["A_Name"]}
            <br>
            {$row["A_Roll"]}
            </td>
             <td> {$row["Achiev"]}</td>
            <td> 
            {$row["Adrs"]}
            <br>
            {$row["State"]}
            {$row["City"]}
            <br>
            {$row["Pin"]}
            </td>
            <td> 
            {$row["Mob"]} <br>
            {$row["wNo"]} <br>
            {$row["Email"]}<br>
            {$row["OcnC"]}
            {$row["OcnN"]}
            </td>
            <td></td>
            <td width='10%'>
            <img src='./upload/{$clean_img}' class='img-thumbnail' >
            </td>
            </tr>";
        }
        $output .= "</table>";

        mysqli_close($conn);

        echo $output;
    } else {
        echo "<h2>No Record Found.</h2>";
    }
}
