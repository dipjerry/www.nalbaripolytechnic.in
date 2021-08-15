<?php
require("../../server.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $methods = $_POST['method'];
    if ($methods == "live_search") {
        Search($_POST['search'], $conn);
    } elseif ($methods == "filter") {
        filter($_POST['filter'], $_POST['batch'], $conn);
    } elseif ($methods == "branch") {
        filter($_POST['filter'], $_POST['batch'], $conn);
    } elseif ($methods == "batch") {
        batch($_POST['batch'], $conn);
    } elseif ($methods == "load") {
        load($conn);
    } elseif ($methods == "update") {
        edit($_POST['batch'], $_POST['id'], $conn);
    } elseif ($methods == "remove") {
        remove($_POST['batch'], $_POST['id'], $conn);
    } elseif ($methods == "uEdit") {
        update_edit($_POST['id'], $_POST['name'], $_POST['branch'], $_POST['batch'], $_POST['roll'], $conn);
    } elseif ($methods == "add") {
        add($_POST['name'], $_POST['branch'], $_POST['batch'], $_POST['roll'], $conn);
    }
}

function choose_batch($filter_batch)
{
    if ($filter_batch == 1) {
        $batch_year = "2019";
    } elseif ($filter_batch == 2) {
        $batch_year = "2018";
    } elseif ($filter_batch == 3) {
        $batch_year = "2017";
    } else {
        $batch_year = "2018";
    }
    return $batch_year;
}

function choose_branch($filter_branch)
{
    if ($filter_branch == 1) {
        $branch = 'CSE';
    } elseif ($filter_branch == 2) {
        $branch = 'EEE';
    } elseif ($filter_branch == 3) {
        $branch = 'PT';
    }
    return  $branch;
}

function load($conn)
{
    $sql = "SELECT * FROM batch2018";
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
                <td >
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
    function add($student_name, $Student_branch, $Student_Batch, $student_roll, $conn)
    {
        $branch = choose_branch($Student_branch);
        $tab = choose_batch($Student_Batch);
        // $batch_year = choose_batch_year($Student_Batch);


        $sql = "INSERT INTO $tab (Student_Name, Roll_No, Branch, Batch) VALUES ('$student_name','$student_roll', '$branch','$Student_Batch')";

        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    function filter($filter_branch, $filter_batch, $conn)
    {
        $branch = choose_branch($filter_branch);
        $tab = 'batch' . choose_batch($filter_batch);

        $sql = "SELECT * FROM $tab WHERE Branch = '$branch'";
        $result = mysqli_query($conn, $sql) or die("SQL Query Failed." . $branch . $tab);
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
        function Search($search_value, $conn)
        {
            $sql = "
                    SELECT * FROM  batch2017 WHERE Student_Name LIKE '%{$search_value}%' OR Roll_No LIKE '%{$search_value}%' 
                    UNION 
                    SELECT * FROM  batch2018 WHERE Student_Name LIKE '%{$search_value}%' OR Roll_No LIKE '%{$search_value}%'
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
            function batch($filter_batch, $conn)
            {
                $tab = 'batch' . choose_batch($filter_batch);
                $sql = "SELECT * FROM $tab";

                $result = mysqli_query($conn, $sql) or die("SQL Query Failed.$tab");
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
            function edit($filter_batch, $student_id, $conn)
            {

                $tab = 'batch' . $filter_batch;
                $sql = "SELECT * FROM $tab WHERE id = {$student_id}";
                $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
                $output = "";

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $Branch_id = $row["Branch"];
                        if ($Branch_id == "CSE") {
                            $B_id = '1';
                        } elseif ($Branch_id == 'EEE') {
                            $B_id = '2';
                        } elseif ($Branch_id == 'PT') {
                            $B_id = '3';
                        }
                        $output .= "<tr>
                        
                          <td width='90px'>First Name</td>
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
                            <option value='$B_id' selected> {$row["Branch"]}</option>
                            <option value='1'>CSE</option>
                            <option value='2'>EEE</option>
                            <option value='3'>PT</option>
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
                $branch = choose_branch($Student_branch);


                $sql = "UPDATE $tab SET Student_Name = '$student_name' ,Roll_No = '$student_roll' ,Branch = '$branch' WHERE id = '$student_id'";

                if (mysqli_query($conn, $sql)) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
            function remove($filter_batch, $student_id, $conn)
            {
                $tab = 'batch' . $filter_batch;

                $sql = "DELETE FROM $tab WHERE id = '$student_id'";
                // $result = mysqli_query($conn, $sql) or die("SQL Query Failed. $tab ");
                if (mysqli_query($conn, $sql)) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
