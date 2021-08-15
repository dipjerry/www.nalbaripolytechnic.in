<?php
include '../../server.php';
function uploadFromExcel($tableName)
{
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$t_name = $_POST['BatchYear'];
	$tableName = "batch" . $t_name;
	$sql = "CREATE TABLE IF NOT EXISTS $tableName(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Student_Name VARCHAR(30) NOT NULL,
		Roll_No VARCHAR(30) NOT NULL,
		Branch VARCHAR(10) NOT NULL,
		Batch VARCHAR(10) NOT NULL
		)";
	if ($conn->query($sql) === TRUE) {
		$pMonth = date('M', strtotime('-1 months'));
		$uploadfile = $_FILES['uploadfile']['tmp_name'];
		$exceldata = array();
		require 'PHPExcel.php';
		require_once 'PHPExcel/IOFactory.php';
		$objExcel = PHPExcel_IOFactory::load($uploadfile);
		foreach ($objExcel->getWorksheetIterator() as $worksheet) {
			$highestrow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();
			for ($row = 2; $row <= $highestrow; $row++) {
				$StudentName = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
				$Roll_No = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$Branch = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$query = "SELECT * FROM $tableName where Roll_No = '$Roll_No'";
				$result = mysqli_query($conn, $query);
				if (mysqli_num_rows($result) > 0) {
					print("Already existed username $StudentName skipped");
					echo "<br>";
				} else {
					$rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
					$insertqry = "INSERT INTO $tableName( Student_Name, Roll_No, Branch) VALUES('$StudentName','$Roll_No','$Branch')";
					if (mysqli_query($conn, $insertqry)) {
						$exceldata[] = $rowData[0];
					} else {
						echo "Error: <br>" . mysqli_error($conn);
					}
				}
			}
			echo "<table class='table' border='1'>";
			echo "<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Branch</th>
	</tr>";
			foreach ($exceldata as $index => $excelraw) {
				echo "<tr>";
				foreach ($excelraw as $excelcolumn) {
					echo "<td>" . $excelcolumn . "</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
	} else {
		echo "Error creating table: " . $conn->error;
	}
	$conn->close();
}
