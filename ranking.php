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
        <script src="https://kit.fontawesome.com/8946387bf5.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="langs">
            <a  id="bt1" href="?lang=es"><img src="imgs/esp.png" alt="" srcset=""></a>
            <a  id="bt1" href="?lang=cat"><img src="imgs/cat.png" alt="" srcset=""></a>
            <a  id="bt1" href="?lang=eng"><img src="imgs/eng.png" alt="" srcset=""></a>
        </div>
        <div class="borderRanking">
            <div class="backHome">
                <a href="./"><i class="fa-regular fa-circle-left"></i></a>
            </div>
            <div class="ranking">
                <h1><?php echo $lang['titRanking'] ?></h1>
                <div class="topRank">
                    <div class="namePlayerRank">
                        <p><?php echo $lang['namePlayer'] ?></p>
                        <br>
                        <p>Top 1</p>
                        <p>Top 2</p>
                        <p>Top 3</p>

                    </div>
                    <div class="pointsPlayerRank">
                        <p><?php echo $lang['pointsPlayer'] ?></p>
                        <br>
                        <p>X</p>
                        <p>X</p>
                        <p>X</p>

                    </div>
                    <div class="timePlayerRank">
                        <p><?php echo $lang['timePlayer'] ?></p>
                        <br>
                        <p>X</p>
                        <p>X</p>
                        <p>X</p>

                    </div>
                    <div class="totalPlayerRank">
                        <p><?php echo $lang['totalPlayer'] ?></p>
                        <br>
                        <p>X</p>
                        <p>X</p>
                        <p>X</p>
    
                    </div>
                </div>
            </div>
        </div>


    </body>
    </html>