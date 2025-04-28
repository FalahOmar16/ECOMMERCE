<?php
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

// Add user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'add') {
    $id = $_POST['id'];
    $psw = $_POST['psw'];

    if (!empty($id) && !empty($psw)) {
        $insert = "INSERT INTO CLIENTE (id, psw) VALUES ('$id', '$psw')";
        mysqli_query($conn, $insert);
    }
}

// Delete user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $n = $_POST['n_delete'];

    if (!empty($n)) {
        $delete = "DELETE FROM CLIENTE WHERE n = '$n'";
        mysqli_query($conn, $delete);
        
    }
}

// Get all users
$query = "SELECT * FROM CLIENTE";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestione Clienti</title>
</head>
<body>

<h2>Lista Clienti</h2>
<table border="1">
    <thead>
        <tr>
            <th>n</th>
            <th>ID</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['n']); ?></td>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['psw']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<hr>

<h3>Aggiungi Utente</h3>
<form method="post" action="">
    <input type="hidden" name="action" value="add">
    
    <input type="text" name="id" id="id" placeholder="id" required><br><br>

    <input type="text" name="psw" id="psw" placeholder="psw" required><br><br>

    <input type="submit" value="Aggiungi Utente">
</form>

<hr>

<h3>Elimina Utente</h3>
<form method="post" action="">
    <input type="hidden" name="action" value="delete">
    
    <label for="n_delete">n dell'utente da eliminare:</label>
    <input type="number" name="n_delete" id="n_delete" required>
    <input type="submit" value="Elimina Utente">
    
</form>

</body>
</html>
