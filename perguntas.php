<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="login administrativo">
    <meta name="author" content="manga softs">
    <title>Manga Informática</title>
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="assitencia tecnica, computadores, conserto, sites, web, desenvolvimento, html, design, redes, notebooks, cpu, consertos em geral">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="recursos/css/bootstrap.css">
    <link rel="stylesheet" href="recursos/css/menu.css">
    <link rel="stylesheet" href="recursos/css/perguntas.css">
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


<div class="container perguntas" style="margin-bottom: 200px;">
    <h3 class="text-center" style="color: white">Perguntas Frequentes - FAQ</h3>
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                        O que é a Manga Informática ?
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">A Manga Informática é uma empresa que presta manutenção de computadores e criação
                    de sistemas para web.
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                    Como é feito o atendimento ?
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">O atendimento é feito por um técnico especializado que ira se deslocar para o seu
                local informado no cadastro na hora e datas agendadas.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">Posso levar meu equipamento<br/>
                    <p class="text-left">até vocês ?</p></button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">Não, todo atendimento é feito no local do cliente, em casos de manutenção complexa
                possa ser necessário o recolhimento do equipamento.
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour">
                        Métodos de Pagamento
                    </button>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">O pagamento pode ser feito:<br/>Á vista<br/>Cartão de Credito em até 2x -
                    Aceitamos todos os cartões<br/>Deposito bancário.
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                            aria-expanded="false" aria-controls="collapseFive">
                        Garantia dos Serviços
                    </button>
                </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">Todos os serviços possuem um mês de garantia.<br/> A garantia cobre:<br/>
                    <ol>
                        <li>Defeitos ocasionados pelo técnico.</li>
                        <li>Erros de aplicação.</li>
                    </ol>
                    A garantia não cobre:<br/>
                    <ol>
                        <li>Duvidas sobre programas ou funções.</li>
                        <li>Instalação de programas adicionais não solicitados na presença do técnico.</li>
                        <li>Problemas ocasionados pelo ambiente,terceiros ou estado atual do aparelho.</li>
                    </ol>
                    Observações:<br/>
                    <p>Caso seja solicitada a garantia é não seja constatado defeito de responsibilidade
                        da empresa ou não seja constatado defeito será cobrado uma taxa de R$ 30,00 pela visita.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingSix">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"
                        aria-expanded="false" aria-controls="collapseSix">
                    Garantia dos Produtos
                </button>
            </h5>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">A Garantia Cobre:
                <ol>
                    <li>Defeitos de Fabricação em geral</li>
                </ol>
                A Garantia não cobre:
                <ol>
                    <li>Defeitos causados pelo ambiente como chuva,tempesdades,descargas elétricas.</li>
                    <li>Mal uso ou uso que não condiz com a natureza do produto.</li>
                </ol>
                Observações:
                <ol>
                    <li>Todo produto será recolhido para a avaliação de um técnico especializado</li>
                    <li>Prazo maximo de resolução: 30 dias</li>
                    <li>Caso não exista o produto em estoque será devolvido o valor monetário pago pelo mesmo.</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingSeven">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven"
                        aria-expanded="false" aria-controls="collapseSeven">
                    Informações Gerais
                </button>
            </h5>
        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
            <div class="card-body">
                <ol>
                    <li>A cada visita é cobrado um valor de R$30,00, caso seja contratado algum serviço não será cobrado
                        o valor de visita.
                    </li>
                    <li>Os Produtos possuem frete de R$10,00, caso seja contratado algum serviço não será cobrado o
                        valor do frete.
                    </li>
                </ol>
            </div>
        </div>
    </div>

</div>
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