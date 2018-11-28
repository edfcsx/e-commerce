<?php
require_once '../codes/Credenciais.php';
require_once '../codes/Dashboard.php';
$a = new Credenciais();
$a->adm();

$b = new Dashboard();

//Deslogar do sistema
$btn = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($btn['sair'])) {
    $b->deslogar();
}

//Painel de contatos
$b->qtdContatos();
$cont_n_lidos = $b->resultado;

//Painel de Clientes
$b->qtdClientes();
$qtdClientes = $b->resultado;

//Painel Pedidos
$b->pedidosAbertos();
$qtdPedidos = $b->resultado;

//Painel de Produtos
$b->qtdProdutos();
$qtdProdutos = $b->resultado;

//grafico
$meta_total = 1500; //META
//resumo do grafico

$dia_atual = date("j");
$mes = date('n');
switch ($mes) {
    case 1:
        $dias = 31;
        break;
    case 2:
        $dias = 28;
        break;
    case 3:
        $dias = 31;
        break;
    case 4:
        $dias = 30;
        break;
    case 5:
        $dias = 31;
        break;
    case 6:
        $dias = 30;
        break;
    case 7:
        $dias = 31;
        break;
    case 8:
        $dias = 31;
        break;
    case 9:
        $dias = 30;
        break;
    case 10:
        $dias = 31;
        break;
    case 11:
        $dias = 30;
        break;
    case 12:
        $dias = 31;
        break;
}
$meta_diaria = ($meta_total / $dias) * $dia_atual;

//Calcular o total faturado
$b->faturamento();
$faturamento = $b->resultado;

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


    <!--Paineis do topo -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Painel de Controle</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $cont_n_lidos; ?></div>
                                <div>Novos Contatos</div>
                            </div>
                        </div>
                    </div>
                    <a href="contatos.php">
                        <div class="panel-footer">
                            <span class="pull-left">Mostrar Contatos</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $qtdClientes; ?></div>
                                <div>Clientes</div>
                            </div>
                        </div>
                    </div>
                    <a href="clientes.php">
                        <div class="panel-footer">
                            <span class="pull-left">Mostrar Clientes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $qtdPedidos; ?></div>
                                <div>Pedidos em Aberto</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Mostrar Pedidos</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $qtdProdutos; ?></div>
                                <div>Produtos</div>
                            </div>
                        </div>
                    </div>
                    <a href="produtos.php">
                        <div class="panel-footer">
                            <span class="pull-left">Mostrar Produtos</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- fim PAINEL TOPO -->

        <div class="row">
            <div class="col-md-8">
                <div id="linechart_material"></div>
            </div>
            <div class="col-md-12">
                <h5>resumo</h5>
                <button class="btn btn-danger btn-lg">Meta : R$ <?php echo $meta_diaria; ?></button>
                <button class="btn btn-success btn-lg">Faturamento : R$ <?php echo $faturamento; ?></button>
                <br/><br/>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../recursos/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../recursos/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../recursos/metisMenu/metisMenu.min.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Dias');
        data.addColumn('number', 'Meta');
        data.addColumn('number', 'Faturamento');

        data.addRows([
            <?php

            $total = 0;
            $mes = date('n');
            switch ($mes) {
                case 1:
                    $dias = 31;
                    break;
                case 2:
                    $dias = 28;
                    break;
                case 3:
                    $dias = 31;
                    break;
                case 4:
                    $dias = 30;
                    break;
                case 5:
                    $dias = 31;
                    break;
                case 6:
                    $dias = 30;
                    break;
                case 7:
                    $dias = 31;
                    break;
                case 8:
                    $dias = 31;
                    break;
                case 9:
                    $dias = 30;
                    break;
                case 10:
                    $dias = 31;
                    break;
                case 11:
                    $dias = 30;
                    break;
                case 12:
                    $dias = 31;
                    break;
            }

            for ($w = 1; $w <= $dias; $w++) {

                if ($w <= 9) {
                    $dia = '0' . $w;
                } else {
                    $dia = $w;
                }
                $m = date("m");
                $a = date("Y");

                $data = $a . '-' . $m . '-' . $dia;
                $b->vendido($data);
                $total += $b->resultado;

                $meta[$w] = ($meta_total / $dias) * $w;
                echo "[$w, $meta[$w], $total],";
            }
            ?>
        ]);
        var options = {
            chart: {
                title: 'Meta Mensal de faturamento'
            },
            width: 800,
            height: 500,
            colors: ['red', 'green'],
            decimals: "2",
            yAxisValueDecimals: "3",
            xAxisValueDecimals: "3",
            forceDecimals: "2",
            formatNumber: "0",
            numberPrefix: "R$"
        };

        var chart = new google.charts.Line(document.getElementById('linechart_material'));

        chart.draw(data, google.charts.Line.convertOptions(options));
    }
</script>


<!-- Custom Theme JavaScript -->
<script src="../recursos/dist/js/sb-admin-2.js"></script>
</body>
</html>



