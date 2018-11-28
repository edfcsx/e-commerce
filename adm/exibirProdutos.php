<?php
require_once '../codes/Credenciais.php';
require_once '../codes/Dashboard.php';
$a = new Credenciais();
$a->adm();
$options = filter_input_array(INPUT_GET,FILTER_DEFAULT);
$b = new Dashboard();
$b->exibirProduto($options['id']);
$dados = $b->resultado;
//Deslogar do sistema
$btn = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($btn['sair'])) {
    $b->deslogar();
}
//Alterar Categoria
if (isset($btn['alterarCategoria'])){
    unset($btn['alterarCategoria']);
    $b->alterarCategoriaProduto($options['id'],$btn['categoria']);
    $b->exibirProduto($options['id']);
    $dados = $b->resultado;

}
//Alterar info produtos
if (isset($btn['alterarProduto'])){
    unset($btn['alterarProduto']);
    $b->alterarDescProduto($options['id'],$btn);
    $b->exibirProduto($options['id']);
    $dados = $b->resultado;
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
                        <?php echo "Produto: ".$dados['descricao']?>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">

                            <div class="col-md-8">
                                <label for="descricao">Descricao</label>
                                <input id="descricao" name="descricao" type="text" class="form-control" value="<?php echo $dados['descricao']?>">
                            </div>

                            <div class="col-md-4">
                                <label for="preco">Preço</label>
                                <input class="form-control" id="preco" name="preco" value="<?php echo $dados['preco']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc1">Descrição 1</label>
                                <input class="form-control" id="desc1" name="desc1" value="<?php echo $dados['desc1']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc2">Descrição 2</label>
                                <input class="form-control" id="desc2" name="desc2" value="<?php echo $dados['desc2']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc3">Descrição 3</label>
                                <input class="form-control" id="desc3" name="desc3" value="<?php echo $dados['desc3']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc4">Descrição 4</label>
                                <input class="form-control" id="desc4" name="desc4" value="<?php echo $dados['desc4']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc5">Descrição 5</label>
                                <input class="form-control" id="desc5" name="desc5" value="<?php echo $dados['desc5']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc6">Descrição 6</label>
                                <input class="form-control" name="desc6" id="desc6" value="<?php echo $dados['desc6']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc7">Descrição 7</label>
                                <input class="form-control" id="desc7" name="desc7" value="<?php echo $dados['desc7']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc8">Descrição 8</label>
                                <input class="form-control" id="desc8" name="desc8" value="<?php echo $dados['desc8']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="desc9">Descrição 9</label>
                                <input class="form-control" id="desc9" name="desc9" value="<?php echo $dados['desc9']?>">
                            </div>

                            <div class="col-md-6" style="margin-bottom: 20px;">
                                <label for="desc10">Descrição 10</label>
                                <input class="form-control" id="desc10" name="desc10" value="<?php echo $dados['desc10']?>">
                            </div>
                            <input type="submit" name="alterarProduto" value="alterar" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        Alterar Foto
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <img src="<?php echo '../'.$dados['foto'];?>" class="img-responsive" style="margin-bottom: 10px;">
                            <form action="" method="post">
                                <input type="file" name="imagem" class="form-control" style="margin-bottom: 20px;">
                                <input type="submit" name="alterarFoto" value="Alterar Foto" class="btn btn-primary">
                            </form>

                            <form class="form-group" action="" method="post">
                                <label for="categoria">Alterar Categoria</label>
                                <select id="categoria" name="categoria" class="form-control" style="margin-bottom: 10px">
                             <?php $categoria = $dados['categoria']; echo "<option value='$categoria'>".$dados['categoria']."</option>";
                             $b->exibirCategorias($categoria);
                             ?>

                                </select>
                                <input type="submit" value="Alterar Categoria" class="btn btn-primary" name="alterarCategoria">
                            </form>
                        </div>
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