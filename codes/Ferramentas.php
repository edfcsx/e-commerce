<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 18/06/2018
 * Time: 17:24
 */
require_once 'Conexao.php';
class Ferramentas extends Conexao {

    public function construirModal($body,$id){
        echo "<div class='modal fade' id='modal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='exampleModalLabel'></h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button></div>";
        echo "<div class='modal-body'>";
        echo "$body";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>Não</button>";
        echo "<button type='button' class='btn btn-success' onclick='ativarForm($id)'>Sim</button>";
        echo "</div></div></div></div>";

        echo "<form action='' method='post' id='$id'>";
        echo "<input type='hidden' name='btnApagar' value='$id'>";
        echo "</form>";
        unset($body,$id);
    }

    public function ativarModal(){
        $id = '$'.'id';
        echo "<script> function ativarForm($id) { document.getElementById($id).submit();}
</script>";
        unset($id);
    }

}