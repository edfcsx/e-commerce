<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 05/06/2018
 * Time: 15:55
 */
require_once 'config.php';
require_once 'Conexao.php';
class Servicos extends Conexao {

    private $categoria,$foto,$preco,$descricao,$desc1,$desc2,$desc3,$desc4,$desc5,$desc6,$desc7,$desc8,$desc9,$desc10,$id;


    private function setCategoria($categoria){$this->categoria = $categoria;}
    private function setFoto($foto){$this->foto = $foto;}
    private function setPreco($preco){$this->preco = $preco;}
    private function setDescricao($descricao){$this->descricao = $descricao;}
    private function setDesc1($desc1){$this->desc1 = $desc1;}
    private function setDesc2($desc2){$this->desc2 = $desc2;}
    private function setDesc3($desc3){$this->desc3 = $desc3;}
    private function setDesc4($desc4){$this->desc4 = $desc4;}
    private function setDesc5($desc5){$this->desc5 = $desc5;}
    private function setDesc6($desc6){$this->desc6 = $desc6;}
    private function setDesc7($desc7){$this->desc7 = $desc7;}
    private function setDesc8($desc8){$this->desc8 = $desc8;}
    private function setDesc9($desc9){$this->desc9 = $desc9;}
    private function setDesc10($desc10){$this->desc10 = $desc10;}
    private function setId($id){$this->id = $id;}

    public function exibirServicos(){
        $this->conectar();
        $this->setCategoria("servicos");
        $query = "SELECT * FROM produtos WHERE categoria='$this->categoria'";
        $query_exe = mysqli_query($this->conexao,$query);
        while ($row = mysqli_fetch_assoc($query_exe)){
            $this->setFoto($row['foto']);
            $this->setPreco($row['preco']);
            $this->setDescricao($row['descricao']);
            $this->setDesc1($row['desc1']);
            $this->setDesc2($row['desc2']);
            $this->setDesc3($row['desc3']);
            $this->setDesc4($row['desc4']);
            $this->setDesc5($row['desc5']);
            $this->setDesc6($row['desc6']);
            $this->setDesc7($row['desc7']);
            $this->setDesc8($row['desc8']);
            $this->setDesc9($row['desc9']);
            $this->setDesc10($row['desc10']);
            $this->setId($row['id']);
            if($this->preco != "Solicite um Orçamento"){
                $p = "R$";
            }else{
                $p ="";
            }
            echo "<div class='card'>";
            echo "<img class='card-img-top' src='$this->foto'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title text-center'>"."$p"."$this->preco"."</h5>";
            echo "<p class='card-text text-center'>"."$this->descricao"."</p>";
            echo "</div>";
            echo "<ul class='list-group list-group-flush'>";
            if(!empty($this->desc1)){
                echo "<li class='list-group-item'>"."$this->desc1"."</li>";
            }
            if(!empty($this->desc2)){
                echo "<li class='list-group-item'>"."$this->desc2"."</li>";
            }
            if(!empty($this->desc3)){
                echo "<li class='list-group-item'>"."$this->desc3"."</li>";
            }
            if(!empty($this->desc4)){
                echo "<li class='list-group-item'>"."$this->desc4"."</li>";
            }
            if(!empty($this->desc5)){
                echo "<li class='list-group-item'>"."$this->desc5"."</li>";
            }
            if(!empty($this->desc6)){
                echo "<li class='list-group-item'>"."$this->desc6"."</li>";
            }
            if(!empty($this->desc7)){
                echo "<li class='list-group-item'>"."$this->desc7"."</li>";
            }
            if(!empty($this->desc8)){
                echo "<li class='list-group-item'>"."$this->desc8"."</li>";
            }
            if(!empty($this->desc9)){
                echo "<li class='list-group-item'>"."$this->desc9"."</li>";
            }
            if(!empty($this->desc10)){
                echo "<li class='list-group-item'>"."$this->desc10"."</li>";
            }
            echo "</ul>";
            echo "<div class='card-body'>";
            echo "<a class='btn btn-success btn-block' href='compras.php?acao=add&id=$this->id'>Contratar</a>";
            echo "</div></div>";
        }
    }

}