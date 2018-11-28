<?php
require_once '../codes/Credenciais.php';
require_once '../codes/Dashboard.php';
$btn = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$a = new Credenciais();
$a->adm();
$options = filter_input_array(INPUT_GET,FILTER_DEFAULT);
$b = new Dashboard();

if (isset($btn['corrigirValor'])){
    unset($btn['corrigirValor']);
    $b->corrigirValorPedido($options['id']);
}

if (isset($btn['alterarStatus'])){
    unset($btn['alterarStatus']);
    $b->alterarStatusPedido($options['id'],$btn['situacao']);
}

$b->exibirPedido($options['id']);
$dados = $b->resultado;

//Deslogar do sistema
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
            <?php
                if (isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <div class="col-md-8">
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <?php echo "Pedido: ".$dados['cliente'].'#'.$options['id'];?>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="col-md-6">
                                <label>Cliente</label>
                                <input class="form-control" value="<?php echo $dados['cliente']?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Situação</label>
                                <input class="form-control" value="<?php echo $dados['status']?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Total R$</label>
                                <input class="form-control" value="<?php echo $dados['total']?>" readonly>
                            </div>

                            <div class="col-md-3">
                                <label>Data</label>
                                <input class="form-control" value="<?php echo $dados['data']?>" readonly>
                            </div>

                            <div class="col-md-9">
                                <label>Pagamento</label>
                                <input class="form-control" value="<?php echo $dados['pagamento']?>" readonly>
                            </div>
                        </form>
                    </div>
                    <h4 class="text-center">Itens do Pedido</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Qtd</th>
                                <th>Valor</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $b->exibirItensPedido($options['id']);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        Menu
                    </div>
                    <div class="panel-body">

                        <h5>Imprimir Pedido</h5>
                        <a target="_blank" href="../user/print.php?id=<?php echo $_GET['id'];?>" class="btn btn-danger"><i class="fas fa-print"></i></a>

                        <form action="" method="post" style="margin-bottom: 20px;">
                            <h5>Valor total Incorreto ?</h5>
                            <input type="submit" value="Corrigir Total" name="corrigirValor" class="btn btn-success">
                        </form>
                        <form action="" method="post">
                            <label for="situacao">Alterar Status do Pedido</label>
                            <select id="situacao" name="situacao" class="form-control" style="margin-bottom: 10px">
                                <option value="Pedido Concluido">Pedido Concluido</option>
                                <option value="Pedido Realizado">Pedido Realizado</option>
                                <option value="Pedido Cancelado">Pedido Cancelado</option>
                            </select>
                            <input type="submit" class="btn btn-primary" value="Alterar Status" name="alterarStatus">
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