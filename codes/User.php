<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 06/06/2018
 * Time: 09:38
 */
session_start();
require_once 'config.php';
require_once 'Conexao.php';
class User extends Conexao{

    public $email,$resultado;
    public function getEmail(){
        return $this->email;}
    public function setEmail($email){
        $this->email = $email;}


    public function exibirCompras(){
        $this->conectar();
        $email = $_SESSION['email'];
        $sql = "SELECT id,total,status FROM pedidos WHERE email='$email'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);

        if(empty($row)){
            echo "<tr>";
            echo "<td class='text-center' colspan='4'>Não existem pedidos ou ordens de serviço registrados.</td>";
            echo "</tr>";
        }else{
            $run = mysqli_query($this->conexao,$sql);
            while ($row = mysqli_fetch_assoc($run)){
                $id = $row['id'];
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>"."R$ ".$row['total']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "<td><form action='comprovante.php' method='post'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='submit' class='btn-success btn' value='Detalhes' name='btn'>";
                echo "</form></td>";
                echo "</tr>";
            }
        }
        unset($id,$email,$run,$sql,$row);
    }

    public function deslogar(){
        unset($_SESSION['email']);
        unset($_SESSION['acesso']);
        unset($_SESSION['nome']);
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Deslogado com sucesso.</div>";
        header("location:../login.php"); die("erro");
    }

    public function carregarComprovante($id){
        $this->conectar();
        $sql = "SELECT * FROM pedidos WHERE id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row;
    }

    public function exibirProdutos($id){
        $this->conectar();
        $sql = "SELECT * FROM pedidos_itens WHERE pedido_id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        while ($row = mysqli_fetch_assoc($run)){
            echo "<tr>";
            echo "<td>".$row['produto']."</td>";
            echo "<td>R$".number_format($row['preco'], 2, ',', '.')."</td>";
            echo "<td>".$row['quantidade']."</td>";
            echo "<td>R$".number_format($row['total'],2,',','.')."</td>";
            echo "</tr>";
        }
    }

}