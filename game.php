<?php
require_once "idioma.php";
if(isset($_POST['chngdif'])){
    $_SESSION['diff'] = $_SESSION['diff'] + 1;
}else{
    $_SESSION['diff'] = 1;
}

function selquest($numeropregunta){
    $file = fopen("quest/".$_SESSION['idioma']."_"."$numeropregunta".".txt","r");
    if ($_SESSION['diff'] == 7) {
        header('Location:win.php');
        
    }
    while(! feof($file)) {
        $line = "";
        while(!feof($file)){
            $txt = trim(fgets($file));
            if(!empty($txt)){
                $line .= $txt."\n";
            }
        }
    }
    $dats = explode("*",$line);
    unset($dats[0]);
    $quests = [];
    foreach($dats as $v){
        array_push($quests,$v);
    }
    $quest = [];
    foreach($quests as $q){
        $qd = explode("\n",$q);
        array_push($quest,$qd);
    }
    echo $quest[0][5];
    $defq = [];
    foreach($quest as $f){
        $da = "";
        $qs = [];
        $as = [];
        foreach($f as $d){
            trim($d);
            if(!empty($d)){
                if(!str_starts_with($d,"-") && !str_starts_with($d,"+")){
                    array_push($as,$d);
                }else{
                    array_push($qs,$d);
                }
            }
        }
        $qss = array_merge($as,$qs);
        array_push($defq,$qss);
    }
    return $defq;
}
$countdif = $_SESSION['diff'];
$countpr = 1;
$defq = selquest($countdif);
$arlong = count($defq);
function randq($al){
    $nq = [];
    do {
        if(empty($nq)){
            $randn = rand(0,$al - 1);
            array_push($nq,$randn);
        }else{
            $randn = rand(0,$al - 1);
            if(!in_array($randn , $nq)){
                array_push($nq,$randn);
            }
        }
    } while (count($nq) < 3);
    return $nq;
}
function showq($numb,$qu,$rn){
    $numb += 1;
    $cr = [];
    echo "<div id='quests".$numb."' class='quests".$numb." questsPrincip'>";
    echo "Pregunta de dificultad ". $_SESSION['diff'];

    echo "<h3>".$qu[$rn][0]."</h3>";

    for ($i=1; $i < 5 ; $i++) { 
        $quf = trim($qu[$rn][$i]);
        if (str_starts_with($quf,"+")){
            $quf = substr($quf,1);
            array_push($cr,$quf);
        }
    }
    echo '<div class="answers">';

    for ($i=1; $i < 5 ; $i++) { 
        $quf = trim($qu[$rn][$i]);
            $quf = substr($quf,1);
            echo '<input type="button" class="btnpr" onclick="checkans(this, \''.$quf.'\', \''.$cr[0].'\', \''.$numb.'\')" value="'.$quf.'">';
        }
        echo "</div></div>";
    return $cr;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['titpag'] ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        #quests2,#quests3{
            display:none;
        }
        .return,.next{
            display:none;
        }
    </style>
</head>
<body>
    <?php
    $numq = randq($arlong);
    for ($i=0; $i < 3; $i++) { 
        showq($i,$defq,$numq[$i],);
        
    }
    ?>
    <div class= "quests">
         <a href='lose.php' class='return'><?php echo $lang['loseText'] ?></a>
        <form action="game.php" class="next" method="POST">
            <input type="hidden" name="chngdif" value="1">
            <input type="submit" value="Avanzar al siguiente nivel" class="submitt">
        </form>
    </div>
    <script src="./app.js"></script>
</body>
</html>