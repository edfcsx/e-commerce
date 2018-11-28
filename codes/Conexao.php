<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 09/03/2018
 * Time: 00:09
 */

class Conexao{

    public $conexao;

    public function getConexao(){
        return $this->conexao;}
    public function setConexao($conexao){
        $this->conexao = $conexao;}

        public function conectar(){
            $this->setConexao(mysqli_connect(HOST,USER,PASS,DBNAME));
            if(!$this->conexao){
                die("Falha na oonexão<br/>".mysqli_connect_error());
            }
            else{

            }
            $this->conexao->select_db(DBNAME);
            $this->conexao->query("SET NAMES 'utf8");
            $this->conexao->query('SET character_set_connection=utf8');
            $this->conexao->query('SET character_set_client=utf8');
            $this->conexao->query('SET character_set_results=utf8');
            $this->conexao->set_charset('utf-8');
        }

}