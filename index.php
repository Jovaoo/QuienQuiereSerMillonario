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
            <!-- <div class="top3main">
                <?php
                    # echo "<h3>".$lang['bestPlayers']."</h3>";
                    # echo "<p>".$lang['top1']."</p>";
                    # echo "<p>".$lang['top2']."</p>";
                    # echo "<p>".$lang['top3']."</p>";
                    # echo "<a href='./ranking.php'>".$lang['viewRanking']."</a>";

                ?>
            </div> -->
        </div>
        <div class="right">
                <img id="juanra" src="imgs/juanra.webp" alt="" srcset="">
            <div class="play">
            <?php
            echo "<h2>".$lang['start']."</h2>";
            ?>
            <a href="game.php" class="btnplay"><?php echo $lang['btn'] ?></a>
            </div>
        </div>
    </div>


</body>
</html>