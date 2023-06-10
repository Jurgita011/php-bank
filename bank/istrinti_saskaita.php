<?php
$ieskomoji = $_GET['saskaita'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $duomenys = file_get_contents('duomenys.json');
    $saskaitos = json_decode($duomenys, true);
    $saskaitos = array_filter($saskaitos, fn($a)=>$a["saskaita"]!=$ieskomoji);
    $naujiDuomenys = json_encode($saskaitos);
   



    file_put_contents('duomenys.json', $naujiDuomenys);
    header("Location:http://localhost/php-bank/bank/saskaitu_sarasas.php");
    exit;

}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>istrinti</title>
    
</head>

<body style="background:#E3DAC9;">

<div>
   
</div>
   <form action="istrinti_saskaita.php?saskaita=<?php echo $ieskomoji; ?>" method="post"><button type="submit">trinti</button> </form>
</body>

</html>

