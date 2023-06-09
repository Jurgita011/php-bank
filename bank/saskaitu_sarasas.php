<?php


// Nuskaityti sąskaitų duomenis iš JSON failo
$duomenys = file_get_contents('duomenys.json');
$saskaitos = json_decode($duomenys, true);
//print_r($saskaitos);
// Patikrinti, ar buvo paspaustas trynimo mygtukas
// if (iisset($_POST['trynimo-mygtukas'])) {
//     $saskaitosNumeris = $_POST['saskaitos-numeris'];

// // Ištrinti sąskaitą su nurodytu sąskaitos numeriu
// foreach ($saskaitos as $indeksas => $saskaita) {
//     if ($saskaita['saskaitosNumeris'] == $saskaitosNumeris) {
//         unset($saskaitos[$indeksas]);
//         break;
//     }
// }

// // Išsaugoti atnaujintus sąskaitų duomenis JSON faile
// $atnaujintiDuomenys = json_encode(['saskaitos' => array_values($saskaitos)], JSON_PRETTY_PRINT);
// file_put_contents('duomenys.json', $atnaujintiDuomenys);

// // Peradresuoti į sąskaitų sąrašo puslapį
// header('Location: saskaitu_sarasas.php');
// exit();
// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Saskaitu sarasas</title>
</head>

<body style="background: #66FF00">
    <h1>Saskaitu sarasas</h1>

    <table>
        <thead>
            <tr>
                <th>Saskaitos numeris</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Likutis</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($saskaitos as $saskaita) : ?>
            <tr>
                <td><?= $saskaita['saskaita'] ?></td>
                <td><?= $saskaita['vardas'] ?></td>
                <td><?= $saskaita['pavarde'] ?></td>
                <td><?= $saskaita['likutis'] ?></td>
            
                <td>
                    <a href="?istrinti=<?php echo $saskaita['saskaita']; ?>">Istrinti</a> |
                    <a href="prideti_lesas.php?saskaita=<?php echo $saskaita['saskaita']; ?>">Prideti lesu</a> |
                    <a href="nuskaiciuoti_lesas.php?saskaita=<?php echo $saskaita['saskaita']; ?>">Nuskaiciuoti lesas</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="sukurti_saskaita.php">Prideti nauja saskaita</a>
</body>

</html>