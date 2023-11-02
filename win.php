<?php
require_once "idioma.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["puntuacionTotal"])) {
    $_SESSION["puntuacionTotal"] = 0;
}

if (!isset($_SESSION["totalTimeCounter"])) {
    $_SESSION["totalTimeCounter"] = 0;
}

$ses = session_id();

if (!isset($_SESSION["totalTime"])) {
    $_SESSION["totalTime"] = $_POST["totalTime"];
}

function sendrank($idus, $preac, $name) {
    $reg = [$idus, $preac, $name];
    $file2 = fopen("records/records.txt", "a");
    fwrite($file2, PHP_EOL . implode(',', $reg));
    fclose($file2);
}

$_SESSION['finished'] = 1;

if (isset($_POST['prac'])) {
    $pracValue = $_POST['prac'];

    $_SESSION["puntuacionTotal"] += $pracValue * 30;
} else {
    $pracValue = 'NULL';
}

if (isset($_SESSION['startTime'])) {
    $startTime = $_SESSION['startTime'];
    $currentTime = time();

    // tiempo transcurrido
    $elapsedTime = $currentTime - $startTime;

    if ($elapsedTime >= 30) {
        $_SESSION["totalTimeCounter"] += 15;
        $_SESSION['startTime'] = $currentTime;
    }
} else {
    $_SESSION['startTime'] = time();
}

# Puntuación total:
if (!isset($_SESSION['ptTotal'])) {
    $ptTotal = $_SESSION["puntuacionTotal"] - $_SESSION["totalTimeCounter"];
    if ($ptTotal < 0) {
        $ptTotal = 0;
    }
    $_SESSION["ptTotal"] = $ptTotal;
}

if (isset($_POST['sendr'])) {
    $vpa = $_POST['pac'];
    $nusr = $_POST['nameusr'];
    $totaltime =  $_POST['totalTime'];
    sendrank($ses, $nusr, $vpa);
    $_SESSION['hecho'] = 1;
    header('Location: lose.php');
}


?>
    <!DOCTYPE html>
    <html lang="en">

    <script src="./app.js"></script>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $lang['titpag'] ?></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="audioWinGame()">
        <div class="langs">
            <a  id="bt1" href="?lang=es"><img src="imgs/esp.png" alt="" srcset=""></a>
            <a  id="bt1" href="?lang=cat"><img src="imgs/cat.png" alt="" srcset=""></a>
            <a  id="bt1" href="?lang=eng"><img src="imgs/eng.png" alt="" srcset=""></a>
        </div>
        <div class="msgFinal">
            <?php echo "<h1>" . $lang['winTit'] . "</h1>"; ?>
            <?php echo "<h4>" . $lang['winTit2'] . "</h4>"; ?>
        </div>
        <div class="main">
            <div class="stats">
                <?php echo "<h2>" . $lang['statsTit'] . "</h2>"; ?>
                <div class="circle"></div>
                <div style="display:flex"><?php echo "<p>" . $lang['ans1'] . "</p>"; ?> <p class="rtc"></p><?php echo "<p>" . $lang['ans2'] . "</p>"; ?></div>

                <?php echo "<p>" . $lang['timeSpent'] . $_SESSION["totalTime"] . "s<p>" ?>
                <?php echo "<p>" . $lang['totalPoints'] . $_SESSION["ptTotal"] . "<p>" ?>

            </div>
            <div class="finalRight">
            <div class="rank">
                <?php echo "<p>" . $lang['registerN'] . "</p>"; ?>
                <?php
                    if(!isset($_SESSION['hecho'])){
                        echo '<form action="" method="post">';
                        echo '<input type="hidden" name="sendr">';
                        echo '<input type="text" name="nameusr">';               
                        echo '<input type="hidden" name="pac" value="'.$_SESSION["ptTotal"].'">';
                        echo '<input type="submit" value="'.$lang['registerName'].'">';
                        echo '</form>';
                    }else{
                        echo "<p>" . $lang['sentResults'] . "</p>";
                    }
                        ?>
                    <?php echo "<a href='./hallfame.php'>" . $lang['seeHallFame'] . "</a>"; ?>
                </div> 
                    <img id="juanra" src="imgs/juanra.png" alt="" srcset="">
                <div class="play">
                <?php
                echo "<h2>".$lang['start']."</h2>";
                ?>
                    <form action="./" method="post">
                        <input type="hidden" name="destroyses">
                        <input type="submit"  id="btnplayind" class= "btnpr" value="<?php echo $lang['btn'] ?>" > 
                    </form>
                </div>

            </div>
            </div>
        </div>

        <script>totalCorrectAnswers()</script>


    </body>
    </html>