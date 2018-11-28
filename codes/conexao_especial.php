<?php
require_once 'config.php';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);

if(!$conn){
    die("Falha na oonexão<br/>".mysqli_connect_error());
}

$conn->select_db(DBNAME);
$conn->query("SET NAMES 'utf8");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');
$conn->set_charset('utf-8');

