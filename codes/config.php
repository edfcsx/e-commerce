<?php

define('URL','https:www.mangainformatica.com.br/');

define('HOST', 'localhost');
define('USER', 'mangainf_root');
define('PASS', 'g31sdk');
define('DBNAME', 'mangainf_site');


function __autoload($class){
    $dirName = array(
        'codes',
    );

    foreach ($dirName as $diretorios) {
        if(file_exists("{$diretorios}/{$class}.php")){
           require ("{$diretorios}/{$class}.php");
        }
    }
}