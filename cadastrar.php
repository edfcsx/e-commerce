<?php
session_start();
require_once 'codes/Cadastro.php';

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

    if (isset($dados['btn'])){
        unset($dados['btn']);
        $a = new Cadastro();
        $a->cadastrar($dados);
    }

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Manga Informática assistencia técnica de computadores.">
    <meta name="author" content="Manga Informatica">
    <link rel="stylesheet" href="recursos/css/bootstrap.css">
    <link rel="stylesheet" href="recursos/css/menu.css">
    <link rel="stylesheet" href="recursos/css/cadastro_pf_pj.css">
    <title>Manga Informática</title>
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

<div class="container" style="margin-top: 80px;">
    <div class="row">
        <div class="col-12">
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <form method="POST" action="" enctype="multipart/form-data" oninput="verificarSenha()">
        <h5>Dados</h5>
        <div class="form-row">
            <div class="col-md-6">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome"                            required>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="col-md-6">
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone" placeholder="(99) 99999-9999">
            </div>
            <div class="col-md-6">
                <label>Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Senha" required
                id="primeiraSenha">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <label>Confirme a Senha</label>
                <input type="password" class="form-control" name="senha2" placeholder="Senha" required
                id="segundaSenha">
            </div>
            <br/>
            <div class="col-md-12">
                <br/>
                <input type="text" readonly name="cSenha" id="confirmacaoSenha" class="form-control text-center" placeholder="Verificação de senha" style="border-radius: 0rem; background-color: lightgray">
            </div>
            <br/>
            <div class="col-12">
                <br/>
                <h5>Endereço</h5>
                <br/>
            </div>
            <div class="col-md-10">
                <label>Endereço</label>
                <input type="text" class="form-control" name="endereco" placeholder="Rua/Av/Logradouro" required>
            </div>
            <div class="col-md-2">
                <label>Nº</label>
                <input type="text" class="form-control" name="numero" placeholder="Nº" required>
            </div>
            <div class="col-md-6">
                <label>Bairro</label>
                <input type="text" class="form-control" name="bairro" placeholder="Bairro" required>
            </div>
            <div class="col-md-6">
                <label>Cidade</label>
                <input type="text" class="form-control" name="cidade" placeholder="Cidade" required>
            </div>
            <div class="col-12">
                <br/>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar" name="btn" onSclick="erro()">
                <br/><br/>
            </div>
        </div>
    </form>
</div>


<script src="recursos/js/senhaCadastro.js"></script>
<script src="recursos/js/jquery-3.2.1.slim.min.js"></script>
<script src="recursos/js/popper.min.js"></script>
<script src="recursos/js/bootstrap.min.js"></script>
</body>
</html>