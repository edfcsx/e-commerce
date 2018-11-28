<?php
require_once '../codes/User.php';
$dados = filter_input_array(INPUT_GET,FILTER_DEFAULT);
$b = new User();
$b->carregarComprovante($dados['id']);
$cliente = $b->resultado;

if (!$_SESSION['acesso']){
    header("location:../index.php");
}else{
    if ($_SESSION['acesso'] == 1){
        if ($_SESSION['email'] != $cliente['email']){
            header("location:../index.php");
        }
    }
}

if(!isset($dados['id'])){
    header("location:minhasCompras.php") or die('Erro de direcionamento');
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
<div class="container" style="margin-top: 30px;">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <h5>Pedido #<?php echo $cliente['id'];?></h5>
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

<script>
    window.print();
</script>

</body>
</html>



