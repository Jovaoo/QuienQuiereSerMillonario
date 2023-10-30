<?php
require_once "idioma.php";
$ses = session_id();
echo $ses;
function sendrank($idus, $preac, $name){
    $reg = [$idus, $preac, $name];
    $file2 = fopen("records/records.txt", "a");
    fwrite($file2, implode(',', $reg). PHP_EOL);
    fclose($file2);
}
$_SESSION['finished'] = 1;   
if(isset($_POST['prac'])){
    $pracValue = $_POST['prac'];
} else {
    $pracValue = 'NULL';
}
if(isset($_POST['sendr'])){
    $vpa = $_POST['pac'];
    $nusr = $_POST['nameusr'];
    sendrank($ses,$vpa,$nusr);
    $_SESSION['hecho'] = 1;
    header('Location: lose.php');
}
    

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
                <form action="index.php" method="post">
                    <input type="hidden" name="destroyses">
                    <input type="submit" value="<?php echo $lang['btn'] ?>" class= "btnplay"> 
                </form>
                </div>
            </div>
            <div class="rank">
                
                <?php
                if($_SESSION['hecho'] != 1){
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="sendr">';
                    echo '<input type="hidden" name="pac" value="'.$pracValue.'">';
                    echo '<input type="text" name="nameusr">';               
                    echo '<input type="submit" value="Enviar">';
                    echo '</form>';
                }else{
                    echo "Se ha enviado los datos al ranking";
                }
                    ?>
            </div> 

        </div>
    </div>


</body>
</html>