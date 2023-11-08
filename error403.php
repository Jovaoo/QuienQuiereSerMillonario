<?php
require_once "idioma.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="imgs/favicon.ico">
    <title>Forbidden</title>
</head>
<body id="bodyError">
    <div class="langs">
        <a  id="bt1" href="?lang=es"><img src="imgs/esp.png" alt="" srcset=""></a>
        <a  id="bt1" href="?lang=cat"><img src="imgs/cat.png" alt="" srcset=""></a>
        <a  id="bt1" href="?lang=eng"><img src="imgs/eng.png" alt="" srcset=""></a>
    </div>
    <div class="error403">
        <h1>Error 403</h1>
        <?php echo "<h2>".$lang['forbidden']."</h2>"; ?>  
        <?php echo "<p>".$lang['forbiddenText']."</p>"; ?>  
    </div>
</body>
</html>