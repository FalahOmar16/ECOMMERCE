<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb"; // your desired database name

// Connect to MySQL server (without selecting a database yet)
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if database exists
$sql = "SHOW DATABASES LIKE '$database'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Database '$database' exists.";
} else {
    // Database does not exist, so create it
    $sql = "CREATE DATABASE `$database`";
    if (mysqli_query($conn, $sql)) {
        echo "Database '$database' created successfully.";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }
}
// sql to create table
$sqlA = "CREATE TABLE IF NOT EXISTS ADMINISTRATOR (
    id VARCHAR(10) PRIMARY KEY,
    psw VARCHAR(30) NOT NULL
)";

$sqlC = "CREATE TABLE IF NOT EXISTS CLIENTE (
    id VARCHAR(10) PRIMARY KEY,
    psw VARCHAR(30) NOT NULL
)";

$sqlF = "CREATE TABLE IF NOT EXISTS FORNITORE (
    id VARCHAR(10) PRIMARY KEY,
    psw VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sqlA)) {
  echo "Table A OK \n";
} else {
  echo "Error creating tableA: " . mysqli_error($conn);
}
if (mysqli_query($conn, $sqlC)) {
    echo "Table C OK \n";
  } else {
    echo "Error creating tableC: " . mysqli_error($conn);
  }
  if (mysqli_query($conn, $sqlF)) {
    echo "Table F OK \n";
  } else {
    echo "Error creating tableF: " . mysqli_error($conn);
  }

  $sqlInsert = "INSERT INTO ADMINISTRATOR (id, psw)
    VALUES ('ADMIN', 'ADMIN')";

if ($conn->query($sqlInsert) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
  }

 
// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="check.php">
    <select name="selectJob">
        <option name="amministratore" value="1">Amministratore</option>
        <option name="cliente" value="2">Cliente</option>
        <option name="fornitore" value="3">Fornitore</option>
    </select>

    <input type="text" name="id" placeholder="id">
    <input type="text" name="psw" placeholder="psw">
    <input type="submit">
    </form>
    <a href="sign-up.php">Sei un cliente e non hai un account?</a>
</body>
</html>