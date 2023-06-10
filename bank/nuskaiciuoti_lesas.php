<?php
session_start();

$ieskomoji = $_GET['saskaita'] ?? 0;

if ($_POST) {
    $suma = $_POST['nuskaiciuotiSuma'];
    $duomenys = file_get_contents('duomenys.json');
    $saskaitos = json_decode($duomenys, true);
    foreach ($saskaitos as &$s) {
        if ($s['saskaita'] == $ieskomoji) {

            if ($s['likutis'] >= $suma) {
                $s['likutis'] = $s['likutis'] - $suma;
            }
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
<html>

<head>
    <title>nuskaiciuoti lesas</title>
    <style>
        body {
            
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #E3DAC9;
            ;
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

        button{
            background-color: #555555;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        button:hover {
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

<body>
    <form method="post" action="nuskaiciuoti_lesas.php?saskaita=<?php echo $ieskomoji; ?>">

        <label for="nuskaiciuotiSuma"> Kokia suma norite issiimti</label>
        <input type="number" name="nuskaiciuotiSuma" id="nuskaiciuotiSuma" required>


        <button>Nuskaiciuoti lesas</button>
    </form>
    <a href="http://localhost/php-bank/bank/saskaitu_sarasas.php">Gizti i saskaitu sarasa</a>


</body>

</html>