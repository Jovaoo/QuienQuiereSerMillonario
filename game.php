<?php
session_start();
$file = fopen("quest/".$_SESSION['idioma']."_1.txt","r");
while(! feof($file)) {
    $line = fgets($file);
    echo $line[0];
    
    echo "<br>";
    
}
fclose($file)

?>