<?php
require_once 'codes/Contato.php';
session_start();
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

if(isset($dados['btn'])){
    unset($dados['btn']);
    $a = new Contato;
    $a->enviarContato($dados);
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Contato">
    <meta name="author" content="manga softs">
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="assitencia tecnica, computadores, conserto, sites, web, desenvolvimento, html, design, redes, notebooks, cpu, consertos em geral">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Manga Informática</title>
    <link rel="stylesheet" href="recursos/css/bootstrap.css">
    <link rel="stylesheet" href="recursos/css/menu.css">
    <link rel="stylesheet" href="recursos/css/contato.css">
    <link rel="stylesheet" href="recursos/css/footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="shortcut icon" href="recursos/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="recursos/favicon/favicon.ico" type="image/x-icon">
</head>
<body>
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

<br/><br/><br/><br/>
<h3 class="text-center">Contato</h3>
<h5 class="text-center"><i class="fab fa-whatsapp"></i> (81) 99803-0671</h5>
<div class="container">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
</div>
<br/>
<div class="container">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-6">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome" required>
            </div>
            <div class="col-md-6">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
            </div>
            <div class="col-md-4">
                <label>Telefone para contato</label>
                <input type="text" class="form-control" name="telefone" placeholder="(99) 99999-9999" required>
            </div>
            <div class="col-md-8">
                <label>Assunto da mensagem</label>
                <input type="text" class="form-control" name="assunto" placeholder="Assunto da mensagem" required>
            </div>
            <div class="col-md-12">
                <label>Mensagem</label>
                <textarea class="form-control" name="mensagem" required rows="4" cols="4" maxlength="220"
                          placeholder="220 caracteres...."></textarea>
                <br/><br/>
                <input type="submit" class="btn btn-primary btn-lg float-right" value="Enviar" name="btn" style="width: 100px;">
            </div>
        </div>
    </form>
</div>
<br/>
<footer id="myFooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Páginas</h5>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="login.php">Acesso para o cliente</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Sobre</h5>
                <ul>
                    <li><a href="sobre.php">A empresa</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Suporte</h5>
                <ul>
                    <li><a href="perguntas.php">FAQ</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
            <div class="col-sm-3 info">
                <h5>Informações</h5>
                <p>Horario de Funcionamento</p>
                <p>08:00 as 18:00</p>
                <p>Segunda a Sexta</p>
                <br/>
                <p>Contato</p>
                <p>mangasuporte@gmail.com<br/>(81)99803-0671</p>
            </div>
        </div>
    </div>
    <div class="second-bar">
        <div class="container">
            <div class="social-icons">
                <a href="https://www.instagram.com/manga_informatica/" target="_blank" class="instagram nav-link"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

</footer>
<script src="recursos/js/jquery-3.2.1.slim.min.js"></script>
<script src="recursos/js/popper.min.js"></script>
<script src="recursos/js/bootstrap.min.js"></script>
</body>
</html>