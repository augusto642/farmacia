<?php

class Sistema
{


    public static function carregarPagina()
    {
        if (isset( $_GET['pg'] )) {
                include $_GET['pg'] . ".php";
            // onde 'pg' é a variavel passada pela URL (GET)
        }
        else{
            include 'home.php'; //primeiro acesso, padrao 'home.php'

        }
    }
    public static function logado(){
        return isset($_SESSION['login']) ? 1: 0;
    }
    public static function loggout(){
        session_destroy();
    }

}