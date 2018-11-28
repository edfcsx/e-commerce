<?php
require_once '../codes/Credenciais.php';
require_once '../codes/Dashboard.php';
$a = new Credenciais();
$a->adm();
$options = filter_input_array(INPUT_GET,FILTER_DEFAULT);
$b = new Dashboard();
$b->exibirContato($options['id']);
$dados = $b->resultado;

//Deslogar do sistema
$btn = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($btn['sair'])) {
    $b->deslogar();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Painel Administrativo">
    <meta name="author" content="Manga Informática">
    <title>Manga Informática</title>
    <link href="../recursos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../recursos/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../recursos/css/sb-admin-2.css" rel="stylesheet">
    <link href="../recursos/morrisjs/morris.css" rel="stylesheet">
    <link href="../recursos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="shortcut icon" href="../recursos/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../recursos/favicon/favicon.ico" type="image/x-icon">
</head>
<body>

<div id="wrapper">

    <!-- MENU HORIZONTAL -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Manga Informática</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                    <li>
                        <form action="" method="post">
                            <input type="submit" name="sair" value="Sair" class="btn btn-danger btn-block">
                        </form>
                    </li>
                    <li class="divider"></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!--FIM DO MENU HORIZONTAL -->

        <!--Menu Lateral -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fas fa-globe"></i> Painel de Controle</a>
                    </li>

                    <li>
                        <a href="contatos.php"><i class="far fa-envelope"></i> Contatos</a>
                    </li>

                    <li>
                        <a href="clientes.php"><i class="fas fa-user"></i> Clientes</a>
                    </li>

                    <li>
                        <a href="produtos.php"><i class="fas fa-box"></i> Produtos</a>
                    </li>

                    <li>
                        <a href=""><i class="fas fa-tasks"></i> Pedidos</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="pedidos.php"><i class="fas fa-list-ol"></i> Visualizar Pedidos</a>
                            </li>
                            <li>
                                <a href="inserirPedido.php"><i class="fas fa-chevron-right"></i> Lançar Pedidos</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="index.php"><i class="far fa-arrow-alt-circle-up"></i> Terceirização</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- FIM Menu Lateral -->

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <?php echo "Contato: ".$dados['data']?>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control" value="<?php echo $dados['nome']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" value="<?php echo $dados['email']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Assunto</label>
                                <input class="form-control" value="<?php echo $dados['assunto']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Mensagem</label>
                                <textarea class="form-control" readonly><?php echo $dados['mensagem']?></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- jQuery -->
<script src="../recursos/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../recursos/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../recursos/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../recursos/dist/js/sb-admin-2.js"></script>
</body>
</html>