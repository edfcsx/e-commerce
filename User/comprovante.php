<?php
require_once '../codes/Credenciais.php';
require_once '../codes/User.php';
$a = new Credenciais();
$a->usuario();
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$b = new User();
$b->carregarComprovante($dados['id']);
$cliente = $b->resultado;

if(!isset($dados['id'])){
    header("location:minhasCompras.php") or die('Erro de direcionamento');
}

if (isset($dados['sair'])){
    unset($dados['sair']);
    $a = new User();
    $a->deslogar();
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Manga Informática assistencia técnica de computadores.">
    <meta name="author" content="Manga Informatica">
    <link rel="stylesheet" href="../recursos/css/bootstrap.css">
    <link rel="stylesheet" href="../recursos/css/menu.css">
    <link rel="stylesheet" href="../recursos/css/menu_lateral.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <title>Manga Informática</title>
    <link rel="shortcut icon" href="../recursos/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../recursos/favicon/favicon.ico" type="image/x-icon">
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
                        <a class="nav-link" href="../index.php"><i class="fas fa-home"></i>
                            Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-store"></i>
                            Loja
                        </a>
                        <div class="dropdown-menu menusub" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item menusub" href="../index.php?categoria=teclados"><i class="fas fa-keyboard"></i> Teclados</a>
                            <a class="dropdown-item menusub" href="../index.php?categoria=mouses"><i class="fas fa-mouse-pointer"></i> Mouses</a>
                            <a class="dropdown-item menusub" href="../index.php?categoria=rede"><i class="fas fa-wifi"></i> Redes</a>
                            <a class="dropdown-item menusub" href="../index.php?categoria=baterias"><i class="fas fa-battery-three-quarters"></i> Pilhas e Baterias</a>
                            <a class="dropdown-item menusub" href="index.php?categoria=leitores"><i class="fas fa-life-ring"></i> Leitores</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../servicos.php"><i class="fas fa-wrench"></i>
                            Serviços</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-angle-double-down"></i>
                            Outros
                        </a>
                        <div class="dropdown-menu menusub" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item menusub" href="../contato.php"><i class="far fa-envelope-open"></i> Contato</a>
                            <a class="dropdown-item menusub" href="../perguntas.php"><i class="fas fa-question-circle"></i> Perguntas Frequentes</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../compras.php"><i class="far fa-credit-card"></i> Compras</a>
                    </li>
                </ul>
                <a class='nav-link' href="../login.php"><i class="fas fa-key"></i>
                    Acesso para clientes</a>
                <a href="https://www.instagram.com/manga_informatica/" target="_blank" class="instagram nav-link"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid menu-lateral" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12 col-md-4">
            <h5 class="text-center">Bem vindo(a), <?php echo $_SESSION['nome']?></h5>
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse"                                                     data-target="#collapseOne" aria-expanded="false"                                                      aria-controls="collapseOne">
                                Meus Dados
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"                                data-parent="#accordion">
                        <div class="card-body">
                            <a href="" style="color: black;">Alterar Dados[EM MANUTENCAO]</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Exibir
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <a href="minhasCompras.php" style="color: black;">Minhas Compras / Ordens de Serviço</a>
                    </div>
                </div>
            </div>
            <br/>
            <form method="post" action="">
                <input type="submit" class="btn btn-danger btn-block" value="Sair" name="sair">
            </form>
        </div>
        <br/>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <h5>Pedido #<?php echo $cliente['id'];?></h5>
                        </div>
                        <div class="col-md-1">
                            <a target="_blank" href="print.php?id=<?php echo $cliente['id'];?>" class="btn btn-danger"><i class="fas fa-print"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-title">Manga Informática</h5>
                            <p class="card-text" style="margin-bottom: -8px;">27.893.963/0001-18</p>
                            <p class="card-text" style="margin-bottom: -8px;">mangasuporte@gmail.com</p>
                            <p class="card-text">81 99803-0671</p>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title">Cliente</h5>
                            <p class="card-text" style="margin-bottom: -8px;"><?php echo $cliente['cliente'];?></p>
                            <p class="card-text" style="margin-bottom: -8px;"><?php echo $cliente['email'];?></p>
                            <p class="card-text"><?php echo $cliente['telefone'];?></p>
                        </div>
                    </div>
                    <hr/>
                    <h5 class="card-title text-center">Produtos</h5>
                    <table class="table table-striped table-sm table-bordered">
                        <thead class="table-active">
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Qtd</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $a = new User();
                        $a->exibirProdutos($dados['id'])?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan='4'>Valor Total em R$: <?php echo $cliente['total'];?></td>
                        </tr>
                        <tr>
                            <td colspan='4'>Forma de pagamento: <?php echo $cliente['pagamento'];?></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-bottom: 50px; margin-top: 50px;"></div>



<script src="../recursos/js/jquery-3.2.1.slim.min.js"></script>
<script src="../recursos/js/popper.min.js"></script>
<script src="../recursos/js/bootstrap.min.js"></script>
</body>
</html>
