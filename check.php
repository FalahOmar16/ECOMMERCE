<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$id = $_SESSION['id']= $_POST['id'];
$psw = $_SESSION['psw']= $_POST['psw'];
$test = $_POST['selectJob'];
$pagina = "sito.php";


if(!isset($test)){
    $test=4;
    echo "TEST VALE: $test !!!";
}else{
    if($test == 1){
    $check = "ADMINISTRATOR";
}if($test == 2){
    $check = "CLIENTE";
}if($test == 3){
    $check = "FORNITORE";
}}

echo $id,$psw;
///////////////////////////////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

////////////////////////////////
if($test == 4){
    echo "ENTRATO NELL IF 4<br>";

    $sqlInsert = "INSERT INTO CLIENTE (id, psw) VALUES ('$id', '$psw')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "utente aggiunto<br>";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}
/////////////////////////////////////////////////////////////////
$check=null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo"$pagina"; ?>">
        <input type="submit" value="hai completato il login, puoi accedere al sito">
    </form>
</body>
</html>