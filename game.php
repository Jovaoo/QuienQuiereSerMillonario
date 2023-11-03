<script src="./app.js"></script>
<?php
require_once "idioma.php";
if(isset($_SESSION['finished'])){
    header('Location:index.php');
}else{
    if(isset($_POST['chngdif'])){
    $_SESSION['diff'] = $_SESSION['diff'] + 1;
}else{
    $_SESSION['diff'] = 1;
    resetTime();
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
    echo "<h1 id='cronoLimite".$numb."'>01:00</h1>";
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
}

# -- Funciones cronómetro --

$inicio = 0;
$timeout = 0;

function empezarDetener() {
    global $inicio, $timeout;
    if ($timeout == 0) {
        $storedInicio = isset($_COOKIE["inicio"]) ? (int)$_COOKIE["inicio"] : null;

        if ($storedInicio !== null) {
            $inicio = $storedInicio;
        } else {
            $inicio = time();
            setcookie("inicio", $inicio, time() + 3600); // La cookie expira en una hora
        }

        funcionando();

    } else {
        unset($_COOKIE["inicio"]);
        $timeout = 0;
    }
}

function funcionando() {
    global $inicio, $timeout;
    $actual = time();
    $diff = $actual - $inicio;
    $result = LeadingZero($diff);   

    if ($timeout === 0) {
        $timeout = 1;
        ob_flush();
        flush();
    }
}

function LeadingZero($time) {
    return ($time < 10) ? "0" . $time : $time;
}

function resetTime() {
    if (isset($_COOKIE["inicio"])) {
        // Si la cookie "inicio" existe, se elimina para reiniciar el contador
        unset($_COOKIE["inicio"]);
    } else {
        // Si la cookie "inicio" no existe, se inicia el contador
        $inicio = time() * 1000; // Multiplicamos por 1000 para obtener milisegundos
        setcookie("inicio", $inicio, time() + 3600); // La cookie expira en una hora
    }
}

if (isset($_COOKIE["inicio"])) {
    $inicio = (int)$_COOKIE["inicio"];
    funcionando();
}

function saveTime() {
    global $inicio;
    $actual = time();
    $diff = $actual - $inicio;
    $result = LeadingZero($diff);
    return $result;
}


resetTime(); // Inicia el cronómetro
empezarDetener();


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
    <style>
        #quests2,#quests3{
            display:none;
        }
        .return,.next{
            display:none;
        }
    </style>

</head>


<body onload="empezarDetener();startCountdown();">
    <div class="cronoStatic">
            <div class="static25">
            </div>
            <div class="static50">
                <h2 id='crono'>00:00</h2 > 
            </div>
            <div class="static25">
                <i class="fa-regular fa-circle-question"></i>
                <i class="fa-solid fa-percent"></i>  
                <i class="fa-regular fa-hourglass-half" onclick="comodinTiempo()"></i>
            </div>
    </div>


    <?php
    $numq = randq($arlong);
    $contadorDivs = 1;
    $primerDiv = true;
    
    for ($i = 0; $i < 3; $i++) {
        if ($contadorDivs <= 3) {
            showq($i, $defq, $numq[$i]);
        }
    }   
    ?>  
    
    <div class= "quests">
    <form action="lose.php" method="post" class="return" >
            <input type="hidden" name="prac" id = "pregac" value="">
            <input type="hidden" name="totalTime" id = "totalTime" value="">
            <input type="submit" value="<?php echo $lang['next'] ?>" class="submitt">
        </form>
        <form action="game.php" class="next" method="POST">
            <input type="hidden" name="chngdif" value="1">
            <input type="hidden" name="prac" id = "pregac"value="">
            <input type="hidden" name="totalTime" id = "totalTime" value="">
            <input type="submit" value="Siguiente" class="submitt">
        </form>
    </div>


</body>
</html>
