<?php
require("../server.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $methods = $_POST['method'];
    $tab = 'Teachers_list';
    if ($methods == "live_search") {
        Search($tab, $_POST['search'], $conn);
    } elseif ($methods == "load") {
        load($conn, $tab);
    } elseif ($methods == "update") {
        edit($_POST['id'], $conn, $tab);
    } elseif ($methods == "remove") {
        remove($_POST['id'], $tab, $conn);
    } elseif ($methods == "uEdit") {
        update_edit($_POST['id'], $_POST['name'], $_POST['desig'], $_POST['qualif'], $_POST['email'], $_POST['mobile'], $_POST['DOL'], $tab, $conn);
    } elseif ($methods == "add") {
        add($_POST['name'], $_POST['Desig'], $_POST['Email'], $_POST['Mobile'], $_POST['Qualif'], $_POST['DOJ'], $_POST['DOL'],  $_FILES["file"]["name"], $conn, $tab);
    }
}
function load($conn, $tab)
{
    $sql = "SELECT * FROM $tab";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $output = "";
    if (mysqli_num_rows($result) > 0) {
?>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Qualification</th>
                <th>Designation</th>
                <th>Contact</th>
                <th>Photo</th>
                <th>Operation</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr>
                <td align='center'>{$row["id"]}</td>
                <td>{$row["Teacher_Name"]} <br> {$row["DOJ"]} </td>
                <td> {$row["Qualification"]}</td>
                <td> {$row["Designation"]}</td>
                <td> <i style='font-size:20px' class='fa fa-envelope'></i> {$row["email"]} <br> <i style='font-size:24px' class='fa'>&#xf10b;</i> {$row["Mobile"]}</td>
                <td style='width: 15%'>
                <span class='img-div'>
                <div class='text-center img-placeholder ' id='SelectProfileImage'>
                <h4>Update image</h4>
                </div> 
                <img class='img-fluid'  src='upload/{$row["img_loc"]}'>
                <input type='file' name='EditProfileImage'  id='EditProfileImage' class='form-control' style='display: none;'>
                </span>
                </td>
                <td >
                <button class='edit-btn btn btn-success btn-sm' data-eid='{$row["id"]}'>Edit</button>
                <button Class='delete-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' >Delete</button>
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
    function add($teacher_name, $Designation, $email, $mobile, $Qualification, $DOJ, $DOL, $ImgName, $conn, $tab)
    {
        // Create the table to store the data if it doesnot exist from before
       
        // if (mysqli_query($conn, $sql1)) {
        //     echo "Table MyGuests created successfully";
        // } else {
        //     echo "Error creating table: " . mysqli_error($conn);
        //     echo $tab;
        // }
        // Copy images
        // $f_name = $_FILES["Img_name"]["name"];
        $sql2 = "SELECT * FROM $tab WHERE Mobile = $mobile or email = '$email'";
        $result = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result) > 0) {
            echo "Record already exist";
        } else {
            $test = explode('.', $ImgName);
            $ext = end($test);
            $Img_loc =  'Pic' . $mobile . '.' . $ext;
            $location = '../upload/';
            $target_file = pathinfo($location . basename($Img_loc), PATHINFO_FILENAME);
            if (file_exists($target_file)) {
                unlink($target_file);
                move_uploaded_file($_FILES["file"]["tmp_name"], $location . $Img_loc);
                // echo $image_display;
                echo "image replaced" . $target_file . ' ';
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $location . $Img_loc);
            }
            $sql = "INSERT INTO $tab (Teacher_Name, Designation, email, Mobile, Qualification, DOJ, DOL, img_loc) VALUES ('$teacher_name','$Designation', '$email','$mobile','$Qualification','$DOJ','$DOL', '$Img_loc')";
            if (mysqli_query($conn, $sql)) {
                echo 1;
            } else {
                echo 0;
            }
            // if (mysqli_query($conn, $sql)) {
            //     echo "Table MyGuests created successfully";
            // } else {
            //     echo "Error creating table: " . mysqli_error($conn);
            // }
        }
    }
    // For live Search
    function Search($tab, $search_value, $conn)
    {
        $sql = "
                    SELECT * FROM  $tab WHERE Teacher_Name LIKE '%{$search_value}%'";
        $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
        $output = "";
        if (mysqli_num_rows($result) > 0) {
            ?><table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Designation</th>
                    <th>Contact</th>
                    <th>Photo</th>
                    <th>Operation</th>
                </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr>
                    <td align='center'>{$row["id"]}</td>
                    <td>{$row["Teacher_Name"]} <br> {$row["DOJ"]} </td>
                    <td> {$row["Qualification"]}</td>
                    <td> {$row["Designation"]}</td>
                    <td> <i style='font-size:20px' class='fa fa-envelope'></i> {$row["email"]} <br> <i style='font-size:24px' class='fa'>&#xf10b;</i> {$row["Mobile"]}</td>
                    <td style='width: 15%'>
                    <span class='img-div'>
                    <div class='text-center img-placeholder ' id='SelectProfileImage'>
                    <h4>Update image</h4>
                    </div> 
                    <img class='img-fluid'  src='upload/{$row["img_loc"]}'>
                    <input type='file' name='EditProfileImage'  id='EditProfileImage' class='form-control' style='display: none;'>
                    </span>
                    </td>
                    <td >
                    <button class='edit-btn btn btn-success btn-sm' data-eid='{$row["id"]}'>Edit</button>
                    <button Class='delete-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' >Delete</button>
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
    // for update
    function edit($id, $conn, $tab)
    {
        $sql = "SELECT * FROM $tab WHERE id = {$id}";
        $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
        $output = "";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr>
                          <td width='90px'>Name</td>
                          <td><input type='text' id='edit_name' value='{$row["Teacher_Name"]}'>
                          </td>
                        </tr>
                        <tr>
                        <td width='90px'>Designation</td>
                        <td>
                        <input type='text' id='edit_desig' value='{$row["Designation"]}'>
                        </td>
                        </tr>
                        <tr>
                        <td width='90px'>Qualification</td>
                        <td>
                        <input type='text' id='edit_qualif' value='{$row["Qualification"]}'>
                        </td>
                        </tr>
                        <tr>
                        <td width='90px'>Email</td>
                        <td>
                        <input type='email' id='edit_email' value='{$row["email"]}'>
                        </td>
                        </tr>
                        <tr>
                        <td width='90px'>Mobile</td>
                        <td>
                        <input type='text' id='edit_mobile' value='{$row["Mobile"]}'>
                        </td>
                        </tr>
                        <tr>
                        <td width='90px'>Left work?</td>
                        <td>
                        <input type='checkbox' id='if_left'>
                        <input type='date' id='edit_DOL' hidden>
                        </td>
                        </tr>
                        <tr id='DOL_V' hidden>
                        <td width='90px'>Date of leaving</td>
                        <td>
                        </td>
                        </tr>
                        <tr>
                        <td>
                        <input type='text' id='edit_id' hidden value='{$row["id"]}'>
                        </tr>
                        <tr>
                          <td><input type='submit' id='edit_submit' value='save'></td>
                          </tr>          
                          ";
            }
            mysqli_close($conn);
            echo $output;
        } else {
            echo "<h2>No Record Found.</h2>";
        }
            ?>
            <script>
                $("#if_left").on("change", function() {
                    document.getElementById('edit_DOL').hidden = !this.checked;
                });
                $("#SelectProfileImage").on("click", function() {
                    document.querySelector('#EditProfileImage').click();
                });
            </script>
        <?php
    }

    function update_edit($t_id, $t_name, $t_desig, $t_qualif, $email, $mob, $doj, $tab,  $conn)
    {
        $sql = "UPDATE $tab SET Teacher_Name = '$t_name' ,Designation = '$t_desig' ,email = '$email', Mobile = '$mob',Qualification = '$t_qualif' , DOL = '$doj'  WHERE id = '$t_id'";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    function remove($id, $tab, $conn)
    {
        $sql = "DELETE FROM $tab WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }
        ?>