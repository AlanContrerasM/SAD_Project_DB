<!doctype html>
<html>
<head>
	<title>Insert Data Into a Database</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<h1>Inserting the value into the SAD database</h1>
<?php
$servername ="localhost";
$dbname = "SAD";
$username = "root";
$password = "";

/* Try MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password).
If the connection was tried and it was successful the code between braces after try is executed, if any error happened while running the code in try-block, 
the code in catch-block is executed. */
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password );
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Connection Was Successful</p>";
}
catch (PDOException $err) {
	echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
}


try {
	$sql="INSERT INTO Student(StudentID, SFirstName, SLastName, SDoB, Alumnus) VALUES (:stdId, :fname, :lname, :bdate, :alumnus);";   // all the names variable names must start with colon (:)
	$stmnt = $conn->prepare($sql);    // read about prepared statement here: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
	$stmnt->bindParam(':stdId', $_POST['stdId']);   // stdId in $_POST['stdId'] in the exact name of the input element in HTML. if any typo, your code does not work   
	$stmnt->bindParam(':fname', $_POST['fname']);   // note the single quotes, If you foregt to put single quotes, your code does not work.
	$stmnt->bindParam(':lname', $_POST['lname']);
	$stmnt->bindParam(':bdate', $_POST['bdate']);
	$stmnt->bindParam(':alumnus', $_POST['alumnus']);

	$stmnt->execute();

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Data Inserted Into Table Successfully</p>";
}
catch (PDOException $err ) {
	echo "<p style='color:red'>Data Insertion Failed: " . $err->getMessage() . "</p>\r\n";
}
// Close connection
unset($conn);

echo "<a href='../insertData.html'>Insert More Values</a> <br />";

echo "<a href='../index.html'>Back to the homepage</a>";

?>

</body>
</html>