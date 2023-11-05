<?php
if(isset($_POST['destroyses'])){
    session_destroy();
    require_once "idioma.php";
    session_id();
    session_regenerate_id();
    echo session_id();
    unset($_SESSION['hecho']);
    header('Location:index.php');
    unset($_SESSION["totalTime"]);
    unset($_SESSION["totalTimeCounter"]);
    unset($_SESSION["puntuacionTotal"]);
    unset($_SESSION["ptTotal"]);
}else{
    require_once "idioma.php";
    unset($_SESSION["finished"]);
    unset($_SESSION["totalTime"]);
    unset($_SESSION["totalTimeCounter"]);
    unset($_SESSION["puntuacionTotal"]);
    unset($_SESSION["ptTotal"]);



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
</head>
<body>
    <div class="langs">
        <a  id="bt1" href="?lang=es"><img src="imgs/esp.png" alt="" srcset=""></a>
        <a  id="bt1" href="?lang=cat"><img src="imgs/cat.png" alt="" srcset=""></a>
        <a  id="bt1" href="?lang=eng"><img src="imgs/eng.png" alt="" srcset=""></a>
    </div>
    <?php
            echo "<h1 class='titPrincip'>".$lang['tit']."</h1>";
            ?>
    <div class="main">
        <div class="left">
            <div class="instructions">
                <?php
                    echo "<h3>".$lang['ins']."</h3>";
                    echo "<p>".$lang['ins1']."</p><br>";
                    echo "<p>".$lang['ins2']."</p><br>";
                    echo "<p>".$lang['ins3']."</p>";
                ?>
            </div>
        </div>
        <div class="right">
                <img id="juanra" src="imgs/juanra.png" alt="" srcset="">
            <div class="play">
            <?php
            echo "<h2>".$lang['start']."</h2>";
            ?>
            <a href="game.php" id="btnplayindjs" onclick="resetTime();establecerComodines();"><?php echo $lang['btn']?></a>
            <p id="jsno"><?php echo $lang['js']?></p>
            <?php echo "<a href='./hallfame.php' class='rankingMainR'>" . $lang['seeHallFame'] . "</a>"; ?>
            </div>
        </div>
    </div>
    <script src="./app.js"></script>

</body>
</html>