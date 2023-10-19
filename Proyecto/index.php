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
    <?php
            echo "<h1>".$lang['tit']."</h1>";
            ?>
    <div class="main">
        <div class="left">
            <h2>Instrucciones</h2>
            <?php
                echo "<p>".$lang['ins1']."</p>";
                echo "<p>".$lang['ins2']."</p>";
                echo "<p>".$lang['ins3']."</p>";
                echo "<p>".$lang['ins4']."</p>";
            ?>
        </div>
        <div class="right">
                <img id="juanra" src="/imgs/juanra.webp" alt="" srcset="">
            <div class="play">
            <?php
            echo "<h2>".$lang['start']."</h2>";
            ?>
                <input type="button" class="btnplay" value="<?php echo $lang['btn'] ?>">
            </div>
        </div>
    </div>


</body>
</html>