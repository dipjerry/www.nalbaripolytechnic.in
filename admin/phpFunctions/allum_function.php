<?php
// $conn = mysqli_connect('localhost', 'root', '', 'collge_website');
include '../server.php';
$tab = "AllumuniInfo";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $methods = $_POST['method'];
    if ($methods == "getData") {
        getData($tab, $_POST['roll'], $conn);
    } elseif ($methods == "remove") {
        Reject($_POST['id'], $tab, $conn);
    } elseif ($methods == "load_r") {
        loadR($tab, $conn);
    } elseif ($methods == "load_p") {
        loadP($tab, $conn);
    } elseif ($methods == "live_search") {
        Search($_POST['search'], $tab, $conn);
    } elseif ($methods == "batch") {
        batch($_POST['batch'], $tab, $conn);
    } elseif ($methods == "accept") {
        accept($_POST['id'], $tab, $conn);
    }
}
function Reject($id, $tab, $conn)
{
    $sql = "DELETE FROM $tab WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
function accept($id, $tab, $conn)
{
    $sql = "UPDATE $tab SET status ='Accepted' WHERE  id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
function loadR($tab, $conn)
{
    $sql = "SELECT * FROM $tab where status = 'Accepted'";
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
                <th>Operation</th>
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
            <img src='../upload/{$clean_img}' class='img-thumbnail' >
            </td>
            <td>
                <button Class='reject-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' >Delete</button>
            </td>
            </tr>
            ";
            }
            $output .= "</table>";
            mysqli_close($conn);
            echo $output;
        } else {
            echo "<h2>No Record Found.</h2>";
        }
    }

    function loadP($tab, $conn)
    {
        $sql = "SELECT * FROM $tab where status = 'Pending'";
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
                    <th>Operation</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $clean_img = ltrim($row["photo"]);
                    $output .= "<tr>
                <td>{$row["id"]}</td>
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
                <td style='text-align:left;'> 
                <i style='font-size:20px' class='fa'>&#xf10b;</i> {$row["Mob"]} <br>
                <i class='fa fa-whatsapp' aria-hidden='true'></i> {$row["wNo"]} <br>
                <i style='font-size:20px' class='fa fa-envelope'></i> {$row["Email"]}<br>
                <i style='font-size:20px' class='fa'>&#9742;</i>{$row["OcnC"]}-{$row["OcnN"]}
                </td>
                <td></td>
                <td width='10%'>
                <img src='../upload/{$clean_img}' class='img-thumbnail' >
                </td>
                <td>
                <button class='approve-btn btn btn-success btn-sm' data-eid='{$row["id"]}' >Approve</button>
                <button Class='reject-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' >Reject</button>
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
        function Search($search_value, $tab, $conn)
        {
            $sql = "
                SELECT * FROM  $tab WHERE A_Name LIKE '%{$search_value}%' OR A_Roll LIKE '%{$search_value}%' 
               ";
            $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
            $output = "";
            if (mysqli_num_rows($result) > 0) {
                ?> <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Allumuni</th>
                        <!-- <th>Roll no</th> -->
                        <th>Achievment</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Current occupation</th>
                        <th>Photo</th>
                        <th>Operation</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $clean_img = ltrim($row["photo"]);
                        $output .= "<tr>
                <td>{$row["id"]}</td>
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
                <td style='text-align:left;'> 
                <i style='font-size:20px' class='fa'>&#xf10b;</i> {$row["Mob"]} <br>
                <i class='fa fa-whatsapp' aria-hidden='true'></i> {$row["wNo"]} <br>
                <i style='font-size:20px' class='fa fa-envelope'></i> {$row["Email"]}<br>
                <i style='font-size:20px' class='fa'>&#9742;</i>{$row["OcnC"]}-{$row["OcnN"]}
                </td>
                <td></td>
                <td width='10%'>
                <img src='../upload/{$clean_img}' class='img-thumbnail' >
                </td>
                <td>
                <button class='approve-btn btn btn-success btn-sm' data-eid='{$row["id"]}' >Approve</button>
                <button Class='reject-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' >Reject</button>
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
            function batch($search_value, $tab, $conn)
            {
                $sql = "
                SELECT * FROM  $tab WHERE Pass_year = '$search_value'";
                $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
                $output = "";
                if (mysqli_num_rows($result) > 0) {
                    ?> <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Allumuni</th>
                            <!-- <th>Roll no</th> -->
                            <th>Achievment</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Current occupation</th>
                            <th>Photo</th>
                            <th>Operation</th>
                        </tr>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $clean_img = ltrim($row["photo"]);
                        $output .= "<tr>
                <td>{$row["id"]}</td>
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
                <td style='text-align:left;'> 
                <i style='font-size:20px' class='fa'>&#xf10b;</i> {$row["Mob"]} <br>
                <i class='fa fa-whatsapp' aria-hidden='true'></i> {$row["wNo"]} <br>
                <i style='font-size:20px' class='fa fa-envelope'></i> {$row["Email"]}<br>
                <i style='font-size:20px' class='fa'>&#9742;</i>{$row["OcnC"]}-{$row["OcnN"]}
                </td>
                <td></td>
                <td width='10%'>
                <img src='../upload/{$clean_img}' class='img-thumbnail' >
                </td>
                <td>
                <button class='approve-btn btn btn-success btn-sm' data-eid='{$row["id"]}' >Approve</button>
                <button Class='reject-btn btn btn-sm btn-danger' data-eid='{$row["id"]}' >Reject</button>
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
