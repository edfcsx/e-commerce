<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 06/06/2018
 * Time: 11:23
 */
require_once 'config.php';
require_once 'Conexao.php';

class Compras extends Conexao {

    private $id,$cliente,$email,$endereco,$numero,$bairro,$cidade,$telefone,$pagamento,$status,$total,
        $descricao,$preco;

    public $resultado;

    private function setId($id){
        $this->id = $id;}
    private function setCliente($cliente){
        $this->cliente = $cliente;}
    private function setEmail($email){
        $this->email = $email;}
    private function setEndereco($endereco){
        $this->endereco = $endereco;}
    private function setNumero($numero){
        $this->numero = $numero;}
    private function setBairro($bairro){
        $this->bairro = $bairro;}
    private function setCidade($cidade){
        $this->cidade = $cidade;}
    private function setTelefone($telefone){
        $this->telefone = $telefone;}
    private function setPagamento($pagamento){
        $this->pagamento = $pagamento;}
    private function setStatus($status){
        $this->status = $status;}
    private function setTotal($total){
        $this->total = $total;}
    private function setDescricao($descricao){
        $this->descricao = $descricao;}
    private function setPreco($preco){
        $this->preco = $preco;}

        public function pagar($pagamento){
            $this->setEmail($_SESSION['email']);
            $this->conectar();
            $sql = "SELECT nome,email,telefone,endereco,numero,bairro,cidade FROM clientes WHERE email='$this->email' LIMIT 1";
            $run = mysqli_query($this->conexao,$sql);
            $row = mysqli_fetch_assoc($run);
            $this->setCliente($row['nome']);
            $this->setEmail($row['email']);
            $this->setEndereco($row['endereco']);
            $this->setNumero($row['numero']);
            $this->setBairro($row['bairro']);
            $this->setCidade($row['cidade']);
            $this->setTelefone($row['telefone']);
            $this->setPagamento($pagamento);
            $this->setStatus('Pedido Realizado');
            $this->setTotal($_SESSION['total']);

            //INSERIR PEDIDO
            $this->conectar();
            $sql = "INSERT INTO pedidos(cliente, email, endereco, numero, bairro, cidade, telefone, pagamento, status, total, data) VALUES ('$this->cliente','$this->email','$this->endereco','$this->numero','$this->bairro','$this->cidade','$this->telefone','$this->pagamento','$this->status','$this->total',NOW())";
            $run = mysqli_query($this->conexao,$sql);
            $id_pedido = mysqli_insert_id($this->conexao);
            //INSERIR ITENS DO PEDIDO
            foreach ($_SESSION['carrinho'] as $id => $qtd){
                $this->conectar();
                $sql = "SELECT * FROM produtos WHERE id='$id'";
                $run = mysqli_query($this->conexao,$sql);
                $row = mysqli_fetch_assoc($run);
                $this->setDescricao($row['descricao']);
                if($row['preco'] == "Solicite um Orçamento"){
                    $row['preco'] = 0;
                }
                $this->setPreco($row['preco']);
                $total = $qtd * $this->preco;
                $this->setTotal($total);

                $sql_inserir = "INSERT INTO pedidos_itens(pedido_id,produto,quantidade,preco,total) VALUES ('$id_pedido','$this->descricao','$qtd','$this->preco','$this->total')";
                $inserir_exe = mysqli_query($this->conexao,$sql_inserir);
            }
            //limpar
            unset($_SESSION['total']);
            unset($_SESSION['carrinho']);
            unset($id,$sql,$row,$inserir_exe,$sql_inserir);
            //Redirecionar
            header("location:agradecimento.php");
        }
}