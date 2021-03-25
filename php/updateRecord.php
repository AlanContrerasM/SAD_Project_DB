<!doctype html>
<html>

<head>
    <title>Update a record of a table</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>

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
        echo "<p style='color:red'> Connection Failed: " . $err->getMessage() . "</p>\r\n";
    }

    try {
        $sql = "UPDATE " . $dbname . ".Student SET SFirstName = :fname, SLastName = :lname WHERE StudentID = :stdId";
        $stmnt = $conn->prepare($sql);         // read about prepared statement here: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $stmnt->bindParam(':stdId', $_POST['stdId']);
        $stmnt->bindParam(':fname', $_POST['fname']);
        $stmnt->bindParam(':lname', $_POST['lname']);

        $stmnt->execute();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p style='color:green'>Record Updated Successfully</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Update Failed: " . $err->getMessage() . "</p>\r\n";
    }
    // Close connection
    unset($conn);

    echo "<a href='../index.html'>Back to the homepage</a>";

    ?>
</body>

</html>