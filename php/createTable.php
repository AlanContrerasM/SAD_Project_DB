<!doctype html>
<html>

<head>
	<title>Create a Table</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
	<h1>Creating Table Student</h1>
	<?php

	$servername = "localhost";
	$dbname = "SAD";
	$username = "root";
	$password = "";

	/* Try MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password).
If the connection was tried and it was successful the code between braces after try is executed, if any error happened while running the code in try-block, 
the code in catch-block is executed. */
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Connection Was Successful</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
	}

	$sql = "CREATE TABLE Student (
		StudentID INT,
		SFirstName VARCHAR(25) NOT NULL,
		SLastName VARCHAR(25) NOT NULL,
		SDoB DATE NOT NULL,
		Alumnus bool,
		PRIMARY KEY (StudentID)
	);";

	try {
		$conn->exec($sql);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Table Created Successfully</p><p>Following query was run: </p><p><span>CREATE TABLE Student<span> (<br/>
			StudentID INT,<br>
			SFirstName VARCHAR(25) NOT NULL,<br/>
			SLastName VARCHAR(25) NOT NULL,<br/>
			SDoB DATE NOT NULL,<br/>
			Alumnus bool,<br/>
			PRIMARY KEY (StudentID)<br/>
		);</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
	}

	// Close connection
	unset($conn);

	echo "<a href='../index.html'>Back to the homepage</a>";

	?>

</body>

</html>


