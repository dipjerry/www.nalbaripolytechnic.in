<?php
require("../server.php");
//table name to work on
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $methods = $_POST['method'];
    $tab = "StudentInfo";
    if ($methods == "live_search") {
        Search($_POST['search'], $tab, $conn);
    } elseif ($methods == "filter") {
        filter($_POST['filter'], $_POST['batch'], $tab, $conn);
    } elseif ($methods == "batch") {
        batch($_POST['batch'], $tab, $conn);
    } elseif ($methods == "load") {
        load($conn, $tab);
    } elseif ($methods == "update") {
        edit($_POST['id'], $tab, $conn);
    } elseif ($methods == "remove") {
        remove($_POST['id'], $tab, $conn);
    } elseif ($methods == "uEdit") {
        update_edit($_POST['id'], $_POST['name'], $_POST['branch'], $_POST['batch'], $_POST['roll'], $conn);
    } elseif ($methods == "add") {
        add($_POST['name'], $_POST['branch'], $_POST['batch'], $_POST['roll'], $tab, $conn);
    }
}
function load($conn, $tab)
{
    $sql = "SELECT * FROM $tab ORDER BY id;";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $output = "";
    if (mysqli_num_rows($result) > 0) {
?>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Roll no</th>
                <th>Branch</th>
                <th>Operation</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr>
                <td align='center'>{$row["id"]}</td>
                <td>{$row["Student_Name"]}</td>
                <td> {$row["Roll_No"]}</td>
                <td> {$row["Branch"]}</td>
                <td>
                <button class='edit-btn btn btn-success btn-sm' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Edit</button>
                <button Class='delete-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Delete</button>
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
    function add($student_name, $Student_branch, $Student_Batch, $student_roll, $tab, $conn)
    {
        $branch = choose_branch($Student_branch);
        $sql = "INSERT INTO $tab (Student_Name, Roll_No, Branch, Batch) VALUES ('$student_name','$student_roll', '$Student_branch','$Student_Batch')";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    function filter($filter_branch, $filter_batch, $tab, $conn)
    {
        $sql = "SELECT * FROM $tab WHERE Branch = '$filter_branch' and Batch = '$filter_batch'  ";
        $result = mysqli_query($conn, $sql) or die("SQL Query Failed." . $filter_branch . $tab);
        $output = "";
        if (mysqli_num_rows($result) > 0) {
            ?><table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Roll no</th>
                    <th>Branch</th>
                    <th>Operation</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $output .= "<tr>
                    <td align='center'>{$row["id"]}</td><td>{$row["Student_Name"]}</td>
                    <td> {$row["Roll_No"]}</td><td> {$row["Branch"]}</td><td >
                    <button class='edit-btn btn btn-success btn-sm' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Edit</button>
                    <button Class='delete-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Delete</button></td>
                    </tr>";
                }
                $output .= "</table>";
                mysqli_close($conn);
                echo $output;
            } else {
                echo "<h2>No Record Found.</h2>";
            }
        }
        //For live Search
        function Search($search_value, $tab, $conn)
        {
            $sql = "
                    SELECT * FROM  $tab WHERE Student_Name LIKE '%{$search_value}%' OR Roll_No LIKE '%{$search_value}%' 
                   ";
            $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
            $output = "";
            if (mysqli_num_rows($result) > 0) {
                ?><table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Roll no</th>
                        <th>Branch</th>
                        <th>Operation</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $output .= "<tr>
                        <td align='center'>{$row["id"]}</td>
                        <td>{$row["Student_Name"]}</td>
                        <td> {$row["Roll_No"]}</td><td> {$row["Branch"]}</td>
                        <td ><button class='edit-btn btn btn-success btn-sm' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Edit</button>
                        <button Class='delete-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Delete</button></td>
                        </tr>";
                    }
                    $output .= "</table>";
                    mysqli_close($conn);
                    echo $output;
                } else {
                    echo "<h2>No Record Found.</h2>";
                }
            }
            // For Batch
            function batch($filter_batch, $tab, $conn)
            {
                $sql = "SELECT * FROM $tab where Batch = '$filter_batch'";
                $result = mysqli_query($conn, $sql) or die("SQL Query Failed. $filter_batch");
                $output = "";
                if (mysqli_num_rows($result) > 0) {
                    ?><table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Roll no</th>
                            <th>Branch</th>
                            <th>Operation</th>
                        </tr>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $output .= "<tr>
                        <td align='center'>{$row["id"]}</td>
                        <td>{$row["Student_Name"]} </td>
                        <td> {$row["Roll_No"]}</td>
                        <td> {$row["Branch"]}</td>
                        <td ><button class='edit-btn btn btn-success btn-sm' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Edit</button>
                        <button Class='delete-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' data-batch='{$row["Batch"]}'>Delete</button></td>
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
            function edit($student_id, $tab, $conn)
            {
                $sql = "SELECT * FROM $tab WHERE id = {$student_id}";
                $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
                $output = "";
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $Branch_id = $row["Branch"];
                        $output .= "<tr>
                          <td width='90px'>Name</td>
                          <td><input type='text' id='edit_name' value='{$row["Student_Name"]}'>
                          </td>
                        </tr>
                        <tr>
                        <td>
                        <input type='text' id='edit_id' hidden value='{$row["id"]}'>
                        <input type='text' id='edit_batch' hidden value='$tab'>
                        </tr>
                        <tr>
                        <td width='90px'>Roll No</td>
                        <td>
                        <input type='text' id='edit_roll' value='{$row["Roll_No"]}'>
                        </td>
                        </tr>
                        <tr>
                          <td>Branch</td>
                          <td>
                          <select class='form-control' value='{$row["Branch"]}' id='edit_branch'>
                            <option value='$Branch_id' selected> {$row["Branch"]}</option>
                            <option value='CSE'>CSE</option>
                            <option value='EEE'>EEE</option>
                            <option value='PT'>PT</option>
                            </select>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input type='submit' id='edit_submit' value='save'></td>
                          </tr>";
                    }
                    mysqli_close($conn);
                    echo $output;
                } else {
                    echo "<h2>No Record Found.</h2>";
                }
            }
            function update_edit($student_id, $student_name, $Student_branch, $tab, $student_roll, $conn)
            {
                // $branch = choose_branch($Student_branch);
                $sql = "UPDATE $tab SET Student_Name = '$student_name' ,Roll_No = '$student_roll' ,Branch = '$Student_branch' WHERE id = '$student_id'";
                if (mysqli_query($conn, $sql)) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
            function remove($student_id, $tab, $conn)
            {
                $sql = "DELETE FROM $tab WHERE id = '$student_id'";
                if (mysqli_query($conn, $sql)) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
