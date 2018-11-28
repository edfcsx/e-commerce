<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 05/06/2018
 * Time: 14:25
 */
require_once 'Conexao.php';
require_once 'config.php';

class Home extends Conexao{

    public $id, $foto, $descricao, $preco ,$resultado;

    public function exibirProdutos($categoria = null){
        $this->conectar();

        if ($categoria == null) {
            $sql = "SELECT id,miniatura_foto,descricao,preco FROM produtos WHERE vitrine='sim'";
            $run = mysqli_query($this->conexao, $sql);
            while ($row = mysqli_fetch_assoc($run)) {
                $this->id = $row['id'];
                $this->foto = $row['miniatura_foto'];
                $this->descricao = $row['descricao'];
                $this->preco = $row['preco'];

                echo "<div class='card h-75'>";
                echo "<img class='card-img-top' src='$this->foto'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title text-center'>" . "R$ " . "$this->preco" . "</h5>";
                echo "<p class='card-text text-center'>" . "$this->descricao" . "</p>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<a class='btn btn-primary btn-block' href='compras.php?acao=add&id=$this->id'>Comprar</a>";
                echo "<a class='btn btn-danger btn-block' href='detalhes.php?id=$this->id'>+ Detalhes</a>";
                echo "</div></div>";
            }
        } else {
            $sql = "SELECT id,miniatura_foto,preco,descricao FROM produtos WHERE categoria='$categoria'";
            $run = mysqli_query($this->conexao, $sql);
            while ($row = mysqli_fetch_assoc($run)) {
                $this->id = $row['id'];
                $this->foto = $row['miniatura_foto'];
                $this->descricao = $row['descricao'];
                $this->preco = $row['preco'];

                echo "<div class='card h-75'>";
                echo "<img class='card-img-top' src='$this->foto'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title text-center'>" . "R$ " . "$this->preco" . "</h5>";
                echo "<p class='card-text text-center'>" . "$this->descricao" . "</p>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<a class='btn btn-primary btn-block' href='compras.php?acao=add&id=$this->id'>Comprar</a>";
                echo "<a class='btn btn-danger btn-block' href='detalhes.php?id=$this->id'>+ Detalhes</a>";
                echo "</div></div>";
            }
        }

    }
    public function detalhesProduto($id){
        $this->conectar();
        $sql = "SELECT foto,preco,descricao,desc1,desc2,desc3,desc4,desc5,desc6,desc7,desc8,desc9,desc10 FROM produtos WHERE id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        $this->resultado = mysqli_fetch_assoc($run);
    }

}