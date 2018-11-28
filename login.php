<?php
session_start();
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
require_once 'codes/Login.php';

if (isset($_SESSION['acesso'])){
    switch ($_SESSION['acesso']){
        case 1:
            header("location:user/index.php"); die("erro");
            break;
        case 12:
            header("location:adm/index.php"); die("erro");
            break;
    }
}

if (isset($dados['acessar'])){
    unset($dados['acessar']);
    $login = new Login();
    $login->acessar($dados);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="login">
    <meta name="author" content="manga softs">
    <title>Manga Informática</title>
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="assitencia tecnica, computadores, conserto, sites, web, desenvolvimento, html, design, redes, notebooks, cpu, consertos em geral">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="recursos/css/bootstrap.css">
    <link rel="stylesheet" href="recursos/css/signin.css">
    <link rel="stylesheet" href="recursos/css/menu.css">
    <link rel="shortcut icon" href="recursos/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="recursos/favicon/favicon.ico" type="image/x-icon">
</head>

<body class="text-center">

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top menu-topo">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i>
                            Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-store"></i>
                            Loja
                        </a>
                        <div class="dropdown-menu menusub" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item menusub" href="index.php?categoria=teclados"><i class="fas fa-keyboard"></i> Teclados</a>
                            <a class="dropdown-item menusub" href="index.php?categoria=mouses"><i class="fas fa-mouse-pointer"></i> Mouses</a>
                            <a class="dropdown-item menusub" href="index.php?categoria=rede"><i class="fas fa-wifi"></i> Redes</a>
                            <a class="dropdown-item menusub" href="index.php?categoria=baterias"><i class="fas fa-battery-three-quarters"></i> Pilhas e Baterias</a>
                            <a class="dropdown-item menusub" href="index.php?categoria=leitores"><i class="fas fa-life-ring"></i> Leitores</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="servicos.php"><i class="fas fa-wrench"></i>
                            Serviços</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-angle-double-down"></i>
                            Outros
                        </a>
                        <div class="dropdown-menu menusub" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item menusub" href="contato.php"><i class="far fa-envelope-open"></i> Contato</a>
                            <a class="dropdown-item menusub" href="perguntas.php"><i class="fas fa-question-circle"></i> Perguntas Frequentes</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="compras.php"><i class="far fa-credit-card"></i> Compras</a>
                    </li>
                </ul>
                <a class='nav-link' href="login.php"><i class="fas fa-key"></i>
                    Acesso para clientes</a>
                <a href="https://www.instagram.com/manga_informatica/" target="_blank" class="instagram nav-link"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
</header>

<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <form action="" method="post" enctype="multipart/form-data" class="form-signin">
        <h2 class="h3 mb-3 font-weight-normal" style="color: white">Bem Vindo</h2>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <div style="padding-bottom: 20px">
            <input type="text" name="email" placeholder="E-mail" class="form-control" autofocus required>
        </div>
        <input type="password" name="senha" placeholder="Senha" class="form-control" required><br/>
        <div style="margin-bottom: 10px; margin-top: -30px">
            <a href="#" class="badge badge-primary">Esqueceu a senha ?</a>
        </div>
        <input type="submit" value="Acessar" name="acessar" class="btn btn-lg btn-danger btn-block">
    </form>
    <div class="alert alert-dark" role="alert">
        Ainda não é cliente ? <a href="cadastrar.php" class="alert-link">Clique aqui para cadastrar</a>
    </div>
</div>


<script src="recursos/js/jquery-3.2.1.slim.min.js"></script>
<script src="recursos/js/popper.min.js"></script>
<script src="recursos/js/bootstrap.min.js"></script>
</body>
</html>