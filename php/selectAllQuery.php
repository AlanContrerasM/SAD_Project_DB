<!doctype html>
<html>

<head>
    <title>Display Records of a table</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div id="container">
		
    <?php
    $servername = "localhost";
    $dbname = "SAD";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p style='color:green'>Connection Was Successful</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'> Connection Failed: " . $err . getMessage() . "</p>\r\n";
    }

    try {
        $sql = "SELECT  StudentID,SFirstName,SLastName,SDoB,Alumnus FROM Student";
        $stmnt = $conn->prepare($sql);    // read about prepared statement here: https://www.w3schools.com/php/php_mysql_prepared_statements.asp

        $stmnt->execute();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $row = $stmnt->fetch();  // fetches the first row of the table
        if ($row) {      // if there is any result from the query
            echo '<table>';
            echo '<tr> <th>StudentID</th> <th>First Name</th> <th>Last Name</th> <th>Birth Date</th> <th>Alumnus</th></tr>';
            do {
                echo '<tr><td>' . $row['StudentID'] . '</td><td>' . $row['SFirstName'] . '</td><td>' . $row['SLastName'] . '</td><td>' . $row['SDoB'] . '</td><td>' . $row['Alumnus'] . '</td></tr>';
            } while ($row = $stmnt->fetch());     // fetches another row from the query result, until we reach to the end of the result
            echo '</table>';
        } else {
            echo "<p> No Record Found!</p>";
        }
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Delete Failed: " . $err->getMessage() . "</p>\r\n";
    }
    // Close connection
    unset($conn);

    echo "<a href='../index.html'>Back to the homepage</a>";

    ?>
    </div>
</body>

</html>