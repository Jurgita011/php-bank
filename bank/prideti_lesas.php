<?php
session_start();


$saskaitosNumeris = $_POST['saskaitos_numeris'];
$suma = $_POST['suma'];

// Ikelti JSON duomenis is failo
$duomenys = file_get_contents('duomenys.json');
$saskaitos = json_decode($duomenys, true);

// Patikrinti, ar saskaita egzistuoja
if (array_key_exists($saskaitosNumeris, $saskaitos)) {
    // Prideti suma prie saskaitos likučio
    $saskaitos[$saskaitosNumeris]['likutis'] += $suma;
    
    // Issaugoti atnaujintus duomenis i JSON faila
    file_put_contents('duomenys.json', json_encode($saskaitos));
    
    // Peradresuoti i saskaitu saraso puslapi su pranesimu apie sekminga pridejima
    header('Location:http://localhost/php-bank/bank/saskaitu_sarasas.php?pranesimas=Pridėta lėšų sėkmingai');
    exit();
} else {
    // Peradresuoti i saskaitu saraso puslapi su pranesimu  apie klaidą
    header('Location: http://localhost/php-bank/bank/saskaitu_sarasas.php?klaida=Sąskaita nerasta');
    exit();
}
?>













<!DOCTYPE html>
<html>
<head>
    <title>Prideti lesas</title>
</head>
<body>
    <h1>Prideti lesas</h1>
    
    <form method="post" action="ivykdyti_prideti_lesas.php">
        <label for="saskaitos_numeris">Saskaitos numeris:</label>
        <input type="text" name="saskaitos_numeris" id="saskaitos_numeris" required>
        
        <label for="suma">Suma:</label>
        <input type="number" name="suma" id="suma" required>
        
        <button type="submit">Prideti lesas</button>
    </form>
    
    <a href="saskaitu_sarasas.php">Grizti i saskaitu sarasa</a>
</body>
</html>