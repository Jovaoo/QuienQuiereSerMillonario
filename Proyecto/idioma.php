<?php
session_start();
if (isset($_GET['lang'])){
    if ($_GET['lang']=="es")
        $_SESSION['idioma']="es";
    else if ($_GET['lang']=="eng")
        $_SESSION['idioma']="eng";
    else{
        $_SESSION['idioma']="cat";
    } 

}else if (!isset($_SESSION['idioma'])) {
    $_SESSION['idioma']= "cast";

}
require_once "langs/".$_SESSION['idioma'].".php";
?>