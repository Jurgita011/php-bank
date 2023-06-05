<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vardas = $_POST['vardas'];
    $pavarde = $_POST['pavarde'];
    $asmens_kodas = $_POST['asmens_kodas'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> Nauja sąskaita</title>
</head>
 ;
<body style="background:#B57EDC">
    <h1>Nauja sąskaita</h1>
    <form method="POST" action="create_account_handler.php">
        <label for="vardas">Vardas:</label>
        <input type="text" name="vardas" required>
        <br>
        <label for="pavarde">Pavardė:</label>
        <input type="text" name="pavarde" required>
        <br>
        <label for="asmens_kodas">Asmens kodas:</label>
        <input type="text" name="asmens_kodas" required>
        <br>
        <input type="submit" value="Sukurti sąskaitą">
    </form>
</body>
</html>