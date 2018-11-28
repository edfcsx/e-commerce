<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 05/06/2018
 * Time: 18:48
 */

require_once 'config.php';
require_once 'Conexao.php';

class Login extends Conexao {

    private $dados,$email,$senha;

    public function getDados(){
        return $this->dados;}
    private function setDados($dados){
        $this->dados = $dados;}
    private function setEmail($email){
        $this->email = $email;}
    private function setSenha($senha){
        $this->senha = $senha;}

    public function acessar($dados){
        $this->setDados($dados);
        $this->limparDados();
        $this->setSenha(md5($this->dados['senha']));
        $this->setEmail($this->dados['email']);
        $this->logar();
    }

    private function logar(){
        $this->conectar();
        $sql = "SELECT email,senha,nome,acesso FROM clientes WHERE email='$this->email' LIMIT 1";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        if(!empty($row)){
            if ($row['senha'] == $this->senha){
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['acesso'] = $row['acesso'];

                switch ($_SESSION['acesso']){
                    case 1:
                        header('location:../user/index.php');
                        break;
                    case 12:
                        header('location:../adm/index.php');
                        break;
                }
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Senha incorreta.</div>";
            }
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: E-mail ou senha incorretos.</div>";
        }
    }

    private function limparDados(){
        $this->setDados(array_map('strip_tags',$this->getDados()));
        $this->setDados(array_map('trim',$this->getDados()));
    }

}