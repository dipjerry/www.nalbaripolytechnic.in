<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["logout2"])) {
		session_destroy();
		header("location: ./index.php");
		exit();
	}
}
