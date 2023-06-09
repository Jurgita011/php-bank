<?php

if ($_POST) {
    // Duomenų įrašymas
    $vardas = $_POST['vardas'];
    $pavarde = $_POST['pavarde'];
    $saskaita = $_POST['saskaitosNumeris'];
    $asmensKodas = $_POST['asmensKodas'];


    // Atsidaryti failą
    $duomenys = file_get_contents('duomenys.json');
    $saskaitos = json_decode($duomenys);
    // Iššifruoti duomenis json_decode()
    // Papildyti masyvą su duomenimis
    // Užšifruoti duomenis json_encode()
    // Vėl įrašyti duomenis į failą

    $naujaSaskaita = array(
        'vardas' => $vardas,
        'pavarde' => $pavarde,
        'saskaita' => $saskaita,
        'asmensKodas' => $asmensKodas,
        'likutis' => 0

    );
    $saskaitos[] = $naujaSaskaita;


    $naujiDuomenys = json_encode($saskaitos);
    file_put_contents('duomenys.json', $naujiDuomenys);
    header("Location:http://localhost/php-bank/bank/saskaitu_sarasas.php");
    exit;
}

function generuotiSaskaitosNumeri()
{
    // Nurodykite šalies kodą ir kontrolinį skaitmenį
    $salyjeKodas = 'LT';
    $kontrolinisSkaitmuo = '10'; // Pvz., galite naudoti fiksuotą kontrolinį skaitmenį

    // Sugeneruokite atsitiktine skaitmenų seka sąskaitos numerio dalims
    $bankoKodas = generuotiAtsitiktiniSeka(3);
    $filialoKodas = generuotiAtsitiktiniSeka(3);
    $asmenineSaskaita = generuotiAtsitiktiniSeka(10);

    // Sudėkite visus dalis 
    $saskaitosNumeris = $salyjeKodas . $kontrolinisSkaitmuo . $bankoKodas . $filialoKodas . $asmenineSaskaita;

    return $saskaitosNumeris;
}

function generuotiAtsitiktiniSeka($ilgis)
{
    $seka = '';
    $galimiSkaitmenys = '0123456789';

    for ($i = 0; $i < $ilgis; $i++) {
        $seka .= $galimiSkaitmenys[rand(0, strlen($galimiSkaitmenys) - 1)];
    }

    return $seka;
}


//return 'LT012345678901234567';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Sukurti nauja saskaita</title>

</head>

<body style="background: #00FF00;">
    <h1>Sukurti nauja saskaita</h1>

    <form method="post" action="sukurti_saskaita.php">
        <label for="vardas">Vardas:</label>
        <input type="text" name="vardas" id="vardas" required>

        <label for="pavarde">Pavardė:</label>
        <input type="text" name="pavarde" id="pavarde" required>

        <label for="saskaitos_numeris">Sąskaitos numeris:</label>
        <input type="text" name="saskaitosNumeris" id="saskaitosNumeris" readonly value="<?php echo generuotiSaskaitosNumeri(); ?>">

        <label for="asmens_kodas">Asmens kodas:</label>
        <input type="text" name="asmensKodas" id="asmensKodas" required>

        <button type="submit">Sukurti saskaita</button>
    </form>

    <a href="http://localhost/php-bank/bank/saskaitu_sarasas.php">Gizti i saskaitu sarasa</a>
</body>

</html>