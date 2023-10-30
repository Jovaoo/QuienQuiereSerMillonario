<?php
    function compararSegundoElemento($a, $b) {
        if ($a[1] == $b[1]) {
            return 0;
        }
        return ($a[1] > $b[1]) ? -1 : 1;
    }
$file = fopen("records/records.txt", "r");
$arrayrank = [];
while(! feof($file)) {
    $line = fgets($file);
    $dats = explode(",",$line);
    array_push($arrayrank,$dats);
}
usort($arrayrank, 'compararSegundoElemento');
echo "<table>";

foreach($arrayrank as $k){
    echo "<tr>";
    foreach($k as $j){
        echo "<td>$j<td>";
    }
    echo "</tr>";
}
echo "</table>";
?>