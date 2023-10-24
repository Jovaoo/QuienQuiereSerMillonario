<?php
session_start();
if (isset($_GET['lang'])){
    if ($_GET['lang']=="es")
        $_SESSION['idioma']="spanish";
    else if ($_GET['lang']=="eng")
        $_SESSION['idioma']="english";
    else{
        $_SESSION['idioma']="catalan";
    } 

}else if (!isset($_SESSION['idioma'])) {
    $_SESSION['idioma']= "spanish";

}
require_once "langs/".$_SESSION['idioma'].".php";
?>