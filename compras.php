<?php
session_start();
require_once 'codes/config.php';
require_once 'codes/conexao_especial.php';
require_once 'codes/Compras.php';

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
} //adiciona produto

if(isset($_GET['acao'])){
    //ADICIONAR CARRINHO
    if($_GET['acao'] == 'add'){
        $id = intval($_GET['id']);
        if(!isset($_SESSION['carrinho'][$id])){
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    } //REMOVER CARRINHO

    if($_GET['acao'] == 'del'){
        $id = intval($_GET['id']);
        if(isset($_SESSION['carrinho'][$id])){
            unset($_SESSION['carrinho'][$id]);
            unset($_SESSION['total']);
        }
    } //ALTERAR QUANTIDADE
    if($_GET['acao'] == 'up'){
        if(is_array($_POST['prod'])){
            foreach($_POST['prod'] as $id => $qtd){
                $id  = intval($id);
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0){
                    $_SESSION['carrinho'][$id] = $qtd;
                }else{
                    $_SESSION['carrinho'][$id] = 1;
                }
            }
        }
    }
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
    <link rel="stylesheet" href="recursos/css/footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <title>Manga Informática</title>
    <link rel="shortcut icon" href="recursos/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="recursos/favicon/favicon.ico" type="image/x-icon">
</head>
<script language=javascript>
    function submeter(){
        document.forms.formcompras.submit();
    }
</script>
<body class="bg-light">
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
<div style="margin-bottom: 25px"></div>

<?php
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if(isset($dados['btnFinalizar'])){
    if(isset($dados['radioPagamento'])){
        $control = new Compras();
        $control->pagar($dados['radioPagamento']);
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Selecione um método de Pagamento.</div>";
    }
}
?>
<div class="loja" style="margin-top: 50px;margin-bottom: 500px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4" style="margin-top: 20px">
                <?php
                    if(isset($_SESSION['nome'])){
                        $nome = explode(' ',$_SESSION['nome']);
                        $nome = $nome[0];
                        echo "<h5>Bem vindo(a) $nome</h5>";
                    }else{
                        echo "<div class='text-center'>";
                        echo "<div class='rounded alert alert-dark' role='alert' style='margin-top: 100px;'>É necessario realizar o login para continuar <a href='login.php' class='alert-link'>Clique aqui</a> para realizar o login.
</div>";
                        echo "</div>";
                    }
                ?>

            </div>
            <div class="col-12 col-md-8" style="margin-top: 20px">

                <?php if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }?>

            <form action="?acao=up" method="post" class="form-control" name="formcompras" id="formcompras" oninput="submeter()">
                <?php
            if(count($_SESSION['carrinho']) == 0){
                echo "<h4 class='d-flex justify-content-between align-items-center mb-3'>";
                echo "<span class='text-muted'>Compras</span>";
                echo "</h4>";
                echo "<ul class='list-group mb-3'>";
                echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>";
                echo "<div>";
                echo "<h6 class='my-0'>Carrinho de compras Vazio</h6>";
                echo "</div>";
                echo "</li>";
                echo "</ul>";
            } else {
                $total = 0;
                echo "<h4 class='d-flex justify-content-between align-items-center mb-3'>";
                echo "<span class='text-muted'>Compras</span>";
                echo "</h4>";
                echo "<ul class='list-group mb-3'>";
                foreach ($_SESSION['carrinho'] as $id => $qtd) {

                    $sql = "SELECT preco,descricao,id FROM produtos WHERE id= '$id'";
                    $qr = mysqli_query($conn, $sql);
                    $ln = mysqli_fetch_assoc($qr);
                    if ($ln['preco'] == 'Solicite um Orçamento') {
                        $ln['preco'] = 0;
                    }
                    $nome = $ln['descricao'];
                    $preco = number_format($ln['preco'], 2, ',', '.');
                    $sub = $ln['preco'] * $qtd;
                    $total += $ln['preco'] * $qtd;

                    echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>";
                    echo "<div>";
                    echo "<h6 class='my-0'>$nome</h6>";
                    echo "<small class='text-muted\'>Quantidade</small>";
                    echo "<input type='number' class='form-control' name='prod[$id]' style='width: 100px;' value='$qtd'>";
                    echo "<small class='text-muted\'>Total R$</small>";
                    echo "<input type='number' class='form-control' style='width: 100px;' value='$sub' readonly>";
                    echo "<a href='?acao=del&id=$id' class='btn btn-danger' style='margin-top: 10px; width: 200px;'>Remover Produto</a>";
                    echo "</div>";
                    echo "<span class='text-muted'>R$ $preco</span>";
                    echo "</li>";
                }
                $total = number_format($total, 2, ',', '.');
                echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>";
                echo "<div>";
                echo "<h6 class='my-0'>Total dos Produtos: R$ $total</h6>";
                $_SESSION['total'] = $total;
                echo "</div>";
                echo "</li>";
                echo "</ul>";
                echo "</div>";
                echo "<div class='col-12 col-md-2'>";
                echo "</div>";
                echo "<div class='col-12 col-md-8'>";
                    echo "<br/>";
                    echo "<blockquote class='blockquote'>";
                    echo "<p class='mb-0 text-center'>Pagamento</p>";
                    echo "<footer class='blockquote-footer text-center'>Selecione uma forma de pagamento</footer>";
                    echo "<br/>";
                    echo "<form class='form-control' action='' method='post'>";
                    echo "<div class='custom-control custom-radio'>";
                    echo "<input type='radio' id='a vista' name='radioPagamento' value='a vista' class='custom-control-input'>";
                    echo " <label class='custom-control-label' for='a vista'>Á Vista</label>";
                    echo "</div>";
                    echo "<div class='custom-control custom-radio'>";
                    echo "<input type='radio' id='debito' value='debito' name='radioPagamento' class='custom-control-input'>";
                    echo "<label class='custom-control-label' for='debito'>Cartão de Débito</label>";
                    echo "</div>";
                    echo "<div class='custom-control custom-radio'>";
                    echo "<input type='radio' id='credito' value='credito' name='radioPagamento' class='custom-control-input'>";
                    echo "<label class='custom-control-label' for='credito'>Cartão de Credito em até 2x(parcela minima de R$50,00)</label>";
                    echo "</div>";
                    echo "<br/>";
                    echo "<blockquote class='blockquote'>";
                    echo "<p class='mb-0 text-center'>Frete</p>";
                    echo "<footer class='blockquote-footer text-center'>Contrate um serviço é ganhe frete grátis</footer>";
                    echo "<h5>Frete</h5>";
                    echo "<h5>Prazo de entrega: 24H (apenas dias úteis).</h5>";
                    echo "<h5>Nas compras sem contratação de serviço de manutenção o frete é obrigatório.</h5>";
                    echo "<h5>Serviços de manutenção não necessitam de frete.</h5>";
                    echo "<h5>Valor: R$ 10,00</h5>";
                    echo "<br/>";
                    echo "<a href='?acao=add&id=15' class='btn btn-primary btn-block' style='color:white;'>Adicionar Frete R$10,00</a>";

                    if(isset($_SESSION['nome'])){
                        echo "<h5 class='text-center' style='font-size: 12pt; margin-top: 50px;'>Clicando em finalizar compra você concorda com todos os termos descritos a cima.</h5>";
                        echo "<input type='submit' class='btn btn-success btn-block' value='Finalizar Compra' name='btnFinalizar'>";
                    }else{
                        echo "<div class='alert alert-dark' role='alert' style='margin-top: 100px;'>É necessario realizar o login para continuar <a href='login.php' class='alert-link'>Clique aqui</a> para realizar o login.
</div>";
                    }
                echo "</form>";
                echo "</div>";
            }
                ?>
            </form>
        </div>
    </div>
        <script src="recursos/js/jquery-3.2.1.slim.min.js"></script>
        <script src="recursos/js/popper.min.js"></script>
        <script src="recursos/js/bootstrap.min.js"></script>
</body>
</html>