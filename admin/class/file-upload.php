<?php
include '../server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$t_name = $_POST['BatchYear'];
	$tableName = "StudentInfo";

	$pMonth = date('M', strtotime('-1 months'));
	$uploadfile = $_FILES['uploadfile']['tmp_name'];
	$exceldata = array();
	require_once '../../vendor/phpoffice/phpexcel/Classes/PHPExcel/Autoloader.php';
	// require '../../vendor/phpoffice/phpexcel/Autoloader.php';
	require_once '../../vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
	$objExcel = PHPExcel_IOFactory::load($uploadfile);
	foreach ($objExcel->getWorksheetIterator() as $worksheet) {
		$highestrow = $worksheet->getHighestRow();
		$highestColumn = $worksheet->getHighestColumn();
		for ($row = 3; $row <= $highestrow; $row++) {
			$StudentName = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
			$Roll_No = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			$Branch = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
			$Batch = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
			$query = "SELECT * FROM $tableName where Roll_No = '$Roll_No'";
			$result = mysqli_query($conn, $query);
			if (mysqli_num_rows($result) > 0) {
				print("Already existed username $StudentName skipped");
				echo "<br>";
			} else {
				$rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
				$insertqry = "INSERT INTO $tableName( Student_Name, Roll_No, Branch, Batch) VALUES('$StudentName','$Roll_No','$Branch', '$Batch')";
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
	<th>Roll no</th>
	<th>Branch</th>
	<th>Batch</th>
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

	$conn->close();
}
