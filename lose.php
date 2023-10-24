<?php
require_once "idioma.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['titpag'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="langs">
        <a  id="bt1" href="?lang=es"><img src="imgs/esp.png" alt="" srcset=""></a>
        <a  id="bt1" href="?lang=cat"><img src="imgs/cat.png" alt="" srcset=""></a>
        <a  id="bt1" href="?lang=eng"><img src="imgs/eng.png" alt="" srcset=""></a>
    </div>
    <div class="main">
        <div class="left">
            <div class="msgLose">
                <?php echo "<h1>".$lang['loseTit']."</h1>"; ?>
                <?php echo "<h4>".$lang['loseTit2']."</h4>"; ?>
            </div>

            <div class="top3players">
            <?php echo "<h1>".$lang['bestPlayers']."</h1>"; ?>
                <ul>
                    <?php echo "<li>".$lang['top1']."</li>"; ?> <!-- aqui van los nombres de los jugadores no el languaje /-->
                    <?php echo "<li>".$lang['top2']."</li>"; ?>
                    <?php echo "<li>".$lang['top3']."</li>"; ?>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="stats">
                <?php echo "<h2>".$lang['statsTit']."</h2>"; ?>
                <div class="circle"></div>
                <?php echo "<p>".$lang['percentageCompleted']."% ".$lang['percentageCompleted2']."</p>"; ?> <!-- aqui va el porcentage de aciertos no el languaje /-->
            </div>

            <div class="playAgain">
                <img id="juanra" src="./imgs/juanra.webp" alt="" srcset="">
                <div class="play">
                <?php echo "<h2>".$lang['start']."</h2>"; ?>
                <a href="game.php" class="btnplay"><?php echo $lang['btn'] ?></a>
                </div>
            </div>

        </div>
    </div>


</body>
</html>