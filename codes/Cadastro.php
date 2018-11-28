<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 05/06/2018
 * Time: 16:56
 */
require_once 'config.php';
require_once 'Conexao.php';
class Cadastro extends Conexao {

    private $dados,$pesquisa,$email,$senha,$nome,$telefone,$endereco,$numero,$bairro,$cidade;

    private function setDados($dados){
        $this->dados = $dados;}
    private function setPesquisa($pesquisa){
        $this->pesquisa = $pesquisa;}
    private function setEmail($email){
        $this->email = $email;}
    private function setSenha($senha){
        $this->senha = $senha;}
    private function setNome($nome){
        $this->nome = $nome;}
    private function setTelefone($telefone){
        $this->telefone = $telefone;}
    private function setEndereco($endereco){
        $this->endereco = $endereco;}
    private function setNumero($numero){
        $this->numero = $numero;}
    private function setBairro($bairro){
        $this->bairro = $bairro;}
    private function setCidade($cidade){
        $this->cidade = $cidade;}
    private function getSenha(){
        return $this->senha;}

    public function cadastrar($dados){
        $this->setDados($dados);
        $this->limparDados();
        $this->setPesquisa(false);
        $this->setEmail($this->dados['email']);
        $this->verificarEmail($this->email);

        if($this->pesquisa == true){
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Email já cadastrado, por favor utilize outro email ou recupere a senha.</div>";
        }else{
            $this->inserir();
        }
    }

    private function inserir(){
        $this->setNome($this->dados['nome']);
        $this->setEmail($this->dados['email']);
        $this->setSenha(md5($this->dados['senha']));
        $this->setTelefone($this->dados['telefone']);
        $this->setEndereco($this->dados['endereco']);
        $this->setNumero($this->dados['numero']);
        $this->setBairro($this->dados['bairro']);
        $this->setCidade($this->dados['cidade']);
        $this->conectar();
        $sql = "INSERT INTO clientes(nome, email, senha, telefone, endereco, numero, bairro, cidade, acesso, criado) VALUES ('$this->nome','$this->email','$this->senha','$this->telefone','$this->endereco','$this->numero','$this->bairro','$this->cidade','1',NOW())";
        $run = mysqli_query($this->conexao,$sql);
        if (mysqli_insert_id($this->conexao)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Cadastro realizado com sucesso.</div>";
            header("location:login.php"); die('erro');
        }else{
            $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Mensagem do sistema: Não foi possivel cadastrar, por favor entre em contato com um administrador do sistema.</div>";
        }
    }

    private function verificarEmail($email){
        $this->conectar();
        $sql = "SELECT email FROM clientes WHERE email='$email' LIMIT 1";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        if(empty($row)){
            $this->setPesquisa(false);
        }else{
            $this->setPesquisa(true);
        }
        unset($sql,$row,$run,$email);
    }

    private function limparDados(){
        $this->setDados(array_map('strip_tags',$this->dados));
        $this->setDados(array_map('trim',$this->dados));
    }
}