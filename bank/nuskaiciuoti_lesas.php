

<?php

$saskaitosNumeris = $_POST['saskaitos_numeris'];
$suma = $_POST['suma'];

$duomenys = file_get_contents('duomenys.json');
$saskaitos = json_decode($duomenys, true);

// Patikrinti, ar sąskaita egzistuoja
if (array_key_exists($saskaitosNumeris, $saskaitos)) {
    // Patikrinti, ar sąskaitoje yra pakankamai lėšų
    if ($saskaitos[$saskaitosNumeris]['likutis'] >= $suma) {
        // Nuskaityti sumą nuo sąskaitos likučio
        $saskaitos[$saskaitosNumeris]['likutis'] -= $suma;

        // Išsaugoti atnaujintus duomenis į JSON failą
        file_put_contents('duomenys.json', json_encode($saskaitos));

        // Peradresuoti į sąskaitų sąrašo puslapį su pranešimu apie sėkmingą nuskaitymą
        header('Location: saskaitu_sarasas.php?pranesimas=Suma nuskaityta sėkmingai');
        exit();
    } else {
        // Peradresuoti į sąskaitų sąrašo puslapį su pranešimu apie nepakankamas lėšas
        header('Location: saskaitu_sarasas.php?klaida=Nepakankamas sąskaitos likutis');
        exit();
    }
} else {
    // Peradresuoti į sąskaitų sąrašo puslapį su pranešimu apie klaidą
    header('Location: saskaitu_sarasas.php?klaida=Sąskaita nerasta');
    exit();
}
?>
