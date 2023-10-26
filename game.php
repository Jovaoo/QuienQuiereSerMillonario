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
        
    }else{
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
    echo "<div id='quests".$numb."' class='quests".$numb." questsPrincip'>\n";
    # echo "<h2>Pregunta".$numb."</h2>\n";
    echo "<h3>".$qu[$rn][0]."</h3>\n";

    for ($i=1; $i < 5 ; $i++) { 
        $quf = trim($qu[$rn][$i]);
        if (str_starts_with($quf,"+")){
            $quf = substr($quf,1);
            array_push($cr,$quf);
        }
    }
    echo '<div class="answers">';
    for ($i=1; $i < 5; $i++) { 
        $quf = trim($qu[$rn][$i]);
        $quf = substr($quf, 1);
    
        $encodedQuf = base64_encode($quf);
        $encodedCr = base64_encode($cr[0]);
        $encodedNumb = base64_encode($numb);
        $encodedDiff = base64_encode($_SESSION['diff']);
    
        echo '<input type="button" class="btnpr" onclick="checkans(this, \''.$encodedQuf.'\', \''.$encodedCr.'\', \''.$numb.'\',\''.$_SESSION['diff'].'\')" value="'.$quf.'">';
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
    <link rel="icon" type="image/x-icon" href="imgs/favicon.ico">
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
        showq($i,$defq,$numq[$i]);
        
    }
    ?>
    <div class= "quests">
        <form action="lose.php" method="post" class="return" >
            <input type="hidden" name="prac" id = "pregac" value="">
            <input type="submit" value="<?php echo $lang['next'] ?>" class="submitt">
        </form>
        <form action="game.php" class="next" method="POST">
            <input type="hidden" name="chngdif" value="1">
            <input type="hidden" name="prac" id = "pregac"value="">
            <input type="submit" value="Siguiente" class="submitt">
        </form>
    </div>
    <script src="./app.js"></script>
</body>
</html>