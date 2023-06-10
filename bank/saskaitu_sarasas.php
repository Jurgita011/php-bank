<?php


// Nuskaityti sąskaitų duomenis iš JSON failo
$duomenys = file_get_contents('duomenys.json');
$saskaitos = json_decode($duomenys, true);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Saskaitu sarasas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#E3DAC9;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
        }
   

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f9f9f9;
            align-items: center;
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
                    <?php if($saskaita['likutis'] ==0):?>
                    <a href="istrinti_saskaita.php?saskaita=<?php echo $saskaita['saskaita']; ?>">Istrinti</a> 
                    <?php endif?>
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