<!-- <?php
// Nuskaityti sąskaitos numerį ir sumą iš POST užklausos
$saskaitosNumeris = $_POST['saskaitos_numeris'];
$suma = $_POST['suma'];

// Įkelti JSON duomenis iš failo
$duomenys = file_get_contents('duomenys.json');
$saskaitos = json_decode($duomenys, true);

// Patikrinti, ar sąskaita egzistuoja
if (array_key_exists($saskaitosNumeris, $saskaitos)) {
    // Pridėti sumą prie sąskaitos likučio
    $saskaitos[$saskaitosNumeris]['likutis'] += $suma;
    
    // Išsaugoti atnaujintus duomenis į JSON failą
    file_put_contents('duomenys.json', json_encode($saskaitos));
    
    // Peradresuoti į sąskaitų sąrašo puslapį su pranešimu apie sėkmingą pridėjimą
    header('Location:http://localhost/php-bank/bank/saskaitu_sarasas.php?pranesimas=Pridėta lėšų sėkmingai');
    exit();
} else {
    // Peradresuoti į sąskaitų sąrašo puslapį su pranešimu apie klaidą
    header('Location: http://localhost/php-bank/bank/saskaitu_sarasas.php?klaida=Sąskaita nerasta');
    exit();
}
?> -->
