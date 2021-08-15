<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require("server.php");
	$sql = "CREATE TABLE IF NOT EXISTS register(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			user_name VARCHAR(30) NOT NULL,
			user_password VARCHAR(300) NOT NULL,
			user_email VARCHAR(30) NOT NULL
			)";
	$conn->query($sql);
	$erruser_name = $erruser_password  = $erruser_email  = "";
	$user_name = $user_password  = $user_email  = "";
	$user_name = $_POST["user_name"];
	$user_password = $_POST["user_password"];
	$user_email = $_POST["user_email"];

	$sql_u = "SELECT * FROM register WHERE user_name='$user_name'";
	$res_u = mysqli_query($conn, $sql_u);
	$sql_r = "SELECT * FROM register WHERE user_email='$user_email'";
	$res_r = mysqli_query($conn, $sql_r);

	if (mysqli_num_rows($res_u) > 0) {
		$name_error = "Sorry... username already taken";
	} else if (mysqli_num_rows($res_r) > 0) {
		$name_error2 = "There is already an account with this email ";
	} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$qry = "insert into register(user_name, user_password, user_email) values('$user_name', MD5('$user_password'), '$user_email')";
		$res = $conn->query($qry);
		if ($res) {
			header("location: index.php");
		} else {
			echo "<p>Error occurred, kindly try again later.</p>";
			exit();
		}
	}
}
