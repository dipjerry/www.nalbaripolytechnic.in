<?php
// $conn = mysqli_connect('localhost', 'root', '', 'collge_website');
require("../admin/server.php");
$tab = "StudentInfo";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $methods = $_POST['method'];
  if ($methods == "live_search") {
    Search($_POST['search'], $tab, $conn);
  } elseif ($methods == "filter") {
    filter($_POST['filter'], $_POST['batch'], $tab, $conn);
  } elseif ($methods == "branch") {
    filter($_POST['filter'], $_POST['batch'], $tab, $conn);
  } elseif ($methods == "batch") {
    batch($_POST['batch'], $tab, $conn);
  } elseif ($methods == "load") {
    load($tab, $conn);
  }
}
function load($tab, $conn)
{
  $sql = "SELECT * FROM $tab";
  $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
  $output = "";
  $i = 1;
  if (mysqli_num_rows($result) > 0) {
?>
    <table class="table">
      <tr>
        <th>Sl</th>
        <th>Name</th>
        <th>Roll no</th>
        <th>Branch</th>
      </tr>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr><td >{$i}</td><td>{$row["Student_Name"]}</td><td> {$row["Roll_No"]}</td><td> {$row["Branch"]}</td></tr>";
        $i++;
      }
      $output .= "</table>";
      mysqli_close($conn);
      echo $output;
    } else {
      echo "<h2>No Record Found.</h2>";
    }
  }
  function filter($filter_term, $filter_batch, $tab, $conn)
  {

    $sql = "SELECT * FROM $tab WHERE Batch = '$filter_batch' and Branch = '$filter_term'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed." . $filter_batch . $tab);
    $output = "";
    $i = 1;
    if (mysqli_num_rows($result) > 0) {
      ?><table class="table">
        <tr>
          <th>Sl</th>
          <th>Name</th>
          <th>Roll no</th>
          <th>Branch</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          $output .= "<tr><td >{$i}</td><td>{$row["Student_Name"]}</td><td> {$row["Roll_No"]}</td><td> {$row["Branch"]}</td></tr>";
          $i++;
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
      $sql = "SELECT * FROM  $tab WHERE Student_Name LIKE '%{$search_value}%' OR Roll_No LIKE '%{$search_value}%'";
      $result = mysqli_query($conn, $sql) or die("SQL Query Failed sss.");
      $output = "";
      $i = 1;
      if (mysqli_num_rows($result) > 0) {
        ?><table class="table">
          <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Roll no</th>
            <th>Branch</th>
          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<tr><td >{$i}</td><td>{$row["Student_Name"]}</td><td> {$row["Roll_No"]}</td><td> {$row["Branch"]}</td></tr>";
            $i++;
          }
          $output .= "</table>";
          mysqli_close($conn);
          echo $output;
        } else {
          echo "<h2>No Record Found.</h2>";
        }
      }
      // For Batch
      function batch($filter_term, $tab, $conn)
      {
        // $tab = 'batch' . choose_batch($filter_term);
        $sql = "SELECT * FROM $tab where Batch = '$filter_term'";
        $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
        $output = "";
        $i = 1;
        if (mysqli_num_rows($result) > 0) {
          ?><table class="table">
            <tr>
              <th>Sl</th>
              <th>Name</th>
              <th>Roll no</th>
              <th>Branch</th>
            </tr>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<tr><td >{$i}</td><td>{$row["Student_Name"]}</td><td> {$row["Roll_No"]}</td><td> {$row["Branch"]}</td></tr>";
            $i++;
          }
          $output .= "</table>";
          mysqli_close($conn);
          echo $output;
        } else {
          echo "<h2>No Record Found.</h2>";
        }
      }
