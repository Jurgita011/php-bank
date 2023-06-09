<?php
session_start();

$ieskomoji = $_GET['saskaita'] ?? 0;

if ($_POST) {
    $suma = $_POST['pridedamaSuma'];
    $duomenys = file_get_contents('duomenys.json');
    $saskaitos = json_decode($duomenys, true);
    foreach($saskaitos as &$s){
        if($s['saskaita']==$ieskomoji){
            $s['likutis']=$s['likutis']+ $suma;
        }
    }
    $naujiDuomenys = json_encode($saskaitos);
    file_put_contents('duomenys.json', $naujiDuomenys);
    header("Location:http://localhost/php-bank/bank/saskaitu_sarasas.php");
    exit;

}
echo $ieskomoji


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prideti </title>
</head>

<body>
    <form method="post" action="prideti_lesas.php?saskaita=<?php echo $ieskomoji; ?>">



        <label for="pridedamaSuma"> kokia suma norite prideti ?</label>
        <input type="number" name="pridedamaSuma" id="pridedamaSuma" required>

        <button type="submit">prideti</button>
    </form>

</body>

</html>











<!-- <!DOCTYPE html>
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
</html> -->