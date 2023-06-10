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
    <style>
        body {
            font-family: Arial, sans-serif;
            background:#E3DAC9;
            padding: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #555555;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #C0C0C0;
            color: #fff;
        }

        a {
            color: #333;
            text-decoration: none;
            margin-left: 10px;
        } 
        a:hover{
            background-color: #C0C0C0;
            color: #fff;
        }
    </style>
</head>

<body >
    <form method="post" action="prideti_lesas.php?saskaita=<?php echo $ieskomoji; ?>">



        <label for="pridedamaSuma"> kokia suma norite prideti ?</label>
        <input type="number" name="pridedamaSuma" id="pridedamaSuma" required>

        <button type="submit">prideti</button>
    </form>
    <a href="http://localhost/php-bank/bank/saskaitu_sarasas.php">Gizti i saskaitu sarasa</a>
</body>

</html>











