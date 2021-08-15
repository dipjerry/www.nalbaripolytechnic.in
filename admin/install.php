
<?php
$conn = mysqli_connect('localhost', 'root', '', 'collge_website');
$tab1 = "AllumuniInfo";
$tab2 = 'Teachers_list';
$tab3 = "StudentInfo";
$sql1 = "CREATE TABLE IF NOT EXISTS $tab1(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                A_Name VARCHAR(30) NOT NULL,
                A_Roll VARCHAR(40) NOT NULL,
                Email VARCHAR(30) NOT NULL,
                Achiev VARCHAR(100) NOT NULL,
                Adrs VARCHAR(40) NOT NULL,
                State VARCHAR(40) NOT NULL,
                City VARCHAR(40) NOT NULL,
                Pin int(40) NOT NULL,
                Mob BIGINT NOT NULL,
                wNo BIGINT NOT NULL,    
                OcnC INT(4) NOT NULL,
                OcnN INT(7) NOT NULL,
                Occu VARCHAR(20) NOT NULL,
                Org VARCHAR(20) NOT NULL,
                Desig VARCHAR(20) NOT NULL,
                Branch VARCHAR(3) NOT NULL,
                Pass_year INT(4) NOT NULL,
                photo varchar(20) NOT NULL,
                status varchar(20) NOT NULL,
               Register_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
mysqli_query($conn, $sql1);

$sql2 = "CREATE TABLE IF NOT EXISTS $tab2(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        Teacher_Name VARCHAR(30) NOT NULL,
        Designation VARCHAR(40) NOT NULL,
        email VARCHAR(30) NOT NULL,
        Mobile VARCHAR(10) NOT NULL,
        Qualification VARCHAR(40) NOT NULL,
        DOJ DATE NOT NULL,
        DOL DATE,
        Dept VARCHAR(10) NOT NULL,
        img_loc VARCHAR(20) NOT NULL
        )";
mysqli_query($conn, $sql2);

$sql3 = "CREATE TABLE IF NOT EXISTS $tab3(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Student_Name VARCHAR(30) NOT NULL,
		Roll_No VARCHAR(30) NOT NULL,
		Branch VARCHAR(10) NOT NULL,
		Batch VARCHAR(10) NOT NULL
        )";
mysqli_query($conn, $sql3);


$sql4 = "CREATE TABLE IF NOT EXISTS register(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			user_name VARCHAR(30) NOT NULL,
			user_password VARCHAR(300) NOT NULL,
			user_email VARCHAR(30) NOT NULL
			)";
mysqli_query($conn, $sql4);
?>