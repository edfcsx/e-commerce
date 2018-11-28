<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 05/06/2018
 * Time: 19:03
 */
session_start();
require_once 'config.php';
class Credenciais{

    public function usuario(){
        $credenciais = false;
        if (isset($_SESSION['acesso']) && $_SESSION['acesso'] == '1'){
            $credenciais = true;
        }
        if ($credenciais == false){
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Faça o login para acessar a página.</div>";
            header("location:../login.php");
        }
    }

    public function adm(){
        $credenciais = false;
        if (isset($_SESSION['acesso']) && $_SESSION['acesso'] == '12'){
            $credenciais = true;
        }
        if ($credenciais == false){
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Faça o login para acessar a página.</div>";
            header("location:../login.php");
        }
    }
}