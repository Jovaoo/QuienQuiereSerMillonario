<?php
    require_once "idioma.php";
    
function compararSegundoElemento($a, $b) {
        if ($a[2] == $b[2]) {
            return 0;
        }
        return ($a[2] > $b[2]) ? -1 : 1;
}  
$file = fopen("records/records.txt", "r");
$arrayrank = [];      

while(! feof($file)) {
    $line = fgets($file);
    if (!empty(trim($line))) {
        $dats = explode(",", $line);
        array_push($arrayrank, $dats);
    }
}

usort($arrayrank, 'compararSegundoElemento');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['titpag'] ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="imgs/favicon.ico">
    <script src="https://kit.fontawesome.com/8946387bf5.js" crossorigin="anonymous"></script>

</head>
<body>

    <div class="returnDiv">
        <a href="./" class="returnHall"><i class="fa fa-solid fa-arrow-left-long"></i></a>
    </div>
    <div class="rankingMain">
    <h1>Ranking Hall of Fame</h1>

    <?php echo "<table class='rankingTable'>";
    echo "<tr class='rankingTr firstRankTr'><td class='firstRank'>Sesión&nbsp;&nbsp;<i class='fa-solid fa-id-badge'></i></td><td></td><td class='firstRank'>Nombre&nbsp;&nbsp;<i class='fa-solid fa-file-signature'></i></td><td></td><td class='firstRank'>Total</td><td></td>";
    foreach($arrayrank as $k){
        echo "<tr class='rankingTr'>";
        foreach($k as $j){
            echo "<td>$j<td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

</div>
</body>