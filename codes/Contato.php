<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 05/06/2018
 * Time: 16:10
 */
require_once 'config.php';
require_once 'Conexao.php';
class Contato extends Conexao{

    private $dados,$resultado,$nome,$email,$telefone,$assunto,$mensagem;

    private function getDados(){
        return $this->dados;}
    private function setDados($dados){
        $this->dados = $dados;}
    private function getResultado(){
        return $this->resultado;}
    private function setResultado($resultado){
        $this->resultado = $resultado;}
    private function getNome(){
        return $this->nome;}
    private function setNome($nome){
        $this->nome = $nome;}
    private function getEmail(){
        return $this->email;}
    private function setEmail($email){
        $this->email = $email;}
    private function getTelefone(){
        return $this->telefone;}
    private function setTelefone($telefone){
        $this->telefone = $telefone;}
    private function getAssunto(){
        return $this->assunto;}
    private function setAssunto($assunto){
        $this->assunto = $assunto;}
    private function getMensagem(){
        return $this->mensagem;}
    private function setMensagem($mensagem){
        $this->mensagem = $mensagem;}

    public function enviarContato(array $dados){
        $this->setDados($dados);
        $this->limparDados();
        $this->conectar();
        $this->setNome($this->dados['nome']);
        $this->setEmail($this->dados['email']);
        $this->setTelefone($this->dados['telefone']);
        $this->setAssunto($this->dados['assunto']);
        $this->setMensagem($this->dados['mensagem']);
        $query = "INSERT INTO contato(nome, email, telefone, assunto, mensagem, data, lido) VALUES
        ('$this->nome','$this->email','$this->telefone','$this->assunto','$this->mensagem',NOW(),'0')";
        $query_result = mysqli_query($this->conexao,$query);

        if(mysqli_insert_id($this->conexao)){
            $_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\">Mensagem do sistema: Seu contato foi enviado com sucesso, retornaremos o mais breve possível. 
</div>";

        }else{
            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\">Mensagem do sistema: Erro ao enviar mensagem.
</div>";
        }
    }
    public function limparDados(){
        $this->setDados(array_map('strip_tags',$this->getDados()));
        $this->setDados(array_map('trim',$this->getDados()));
    }

}