-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2018 às 00:25
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'servicos'),
(2, 'mouses'),
(3, 'rede'),
(4, 'baterias'),
(5, 'teclados'),
(6, 'leitores'),
(7, 'frete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) CHARACTER SET latin1 NOT NULL,
  `email` varchar(220) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(520) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(220) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(220) CHARACTER SET latin1 NOT NULL,
  `numero` varchar(220) CHARACTER SET latin1 NOT NULL,
  `bairro` varchar(220) CHARACTER SET latin1 NOT NULL,
  `cidade` varchar(220) CHARACTER SET latin1 NOT NULL,
  `acesso` varchar(220) CHARACTER SET latin1 NOT NULL,
  `criado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `assunto` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `lido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `pagamento` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_itens`
--

CREATE TABLE `pedidos_itens` (
  `id` int(11) NOT NULL,
  `pedido_id` int(220) NOT NULL,
  `produto` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `total` varchar(220) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `foto` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `preco` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `desc1` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc2` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc3` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc4` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc5` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc6` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc7` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc8` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc9` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc10` varchar(520) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitrine` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `miniatura_foto` varchar(220) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `foto`, `preco`, `descricao`, `categoria`, `desc1`, `desc2`, `desc3`, `desc4`, `desc5`, `desc6`, `desc7`, `desc8`, `desc9`, `desc10`, `vitrine`, `miniatura_foto`) VALUES
(1, 'recursos/imagens/formatacao.jpg', '45.00', 'Formatação e instalação de programas essenciais', 'servicos', '1 mes de garantia', 'Antivirus', 'Pacote Office', 'Drivers e gráficos Essenciais', 'Leitor de PDF', 'Instalação de Impressoras', 'Otimizador de Sistema', '', '', '', 'nao', ''),
(2, 'recursos/imagens/servicos2.png', '40.00', 'Manutenção Preventiva de computadores e notebooks', 'servicos', '1 mes de garantia', 'Remoção de Virus', 'Otimização do Sistema', 'Atualização do sistema', 'Limpeza física de poeira e resíduos', '', '', '', '', '', 'nao', ''),
(3, 'recursos/imagens/manutencao.jpg', 'Solicite um Orçamento', 'Manutenção Corretiva de computadores e notebooks', 'servicos', 'A manutenção consiste no diagnóstico, reparo ou substituição dos componentes afetados.', '', '', '', '', '', '', '', '', '', 'nao', ''),
(4, 'recursos/imagens/suporte_dedicado.png', '60.00', 'Suporte Dedicado ', 'servicos', 'Valor cobrado por máquina', 'Suporte especializado para quem não pode parar, com esse suporte você terá atendimento exclusivo tendo direitos a :', 'Manutenção preventiva mensal', 'Manutenções corretivas', 'Instalação de softwares', 'Suporte para qualquer problema via acesso remoto', 'Prazo minimo de contratação : 3 meses', '', '', '', 'nao', ''),
(6, 'recursos/imagens/rede.png', 'Solicite um Orçamento', 'Instalação e Configuração de redes', 'servicos', 'Instalação e configuração de roteadores', 'Cabeamento', 'Instalação de pontos físicos', 'VPN', 'Servidor de Dados', 'Bloqueador de sites indevidos', '', '', '', '', 'nao', ''),
(7, 'recursos/imagens/sistema.png', 'Solicite um Orçamento', 'Desenvolvimento de Sistemas', 'servicos', 'Desenvolvimento de sistemas WEB', 'Transforme suas planilhas em um único sistema de gestão', '', '', '', '', '', '', '', '', 'nao', ''),
(8, 'recursos/imagens/produtos/mouse_usb_hardline_FM-04.png', '15.00', 'Mouse USB Hard Line fm-04 óptico preto box', 'mouses', 'Marca: Hard Line', 'Modelo: FM-04', 'Cor: Preta', 'Plug & Play - Sim', 'Cabo -1,20m', 'Resolução- 800 dpi', 'Roda de rolagem (scroll) - Sim', 'Conteúdo da embalagem - 1 Mouse FM04', '', '', 'sim', 'recursos/imagens/produtos/miniatura_mouse_usb_hardline_FM-04.png'),
(9, 'recursos/imagens/produtos/emenda_rj45_femeaXfemea.png', '5.00', 'Emenda RJ45 Femea x Femea', 'rede', 'Marca: Dmix', 'Modelo: RJ45', 'Utilizável para emendar cabos de rede', 'Compacto, Resistente e de Qualidade', 'Terminais: 8 Vias', '', '', '', '', '', 'sim', 'recursos/imagens/produtos/miniatura_emenda_rj45_femeaXfemea.png'),
(10, 'recursos/imagens/produtos/rj45.png', '1.00', 'Conector RJ45', 'rede', 'Marca: Dmix', 'Modelo: RJ45M', '', '', '', '', '', '', '', '', 'nao', 'recursos/imagens/produtos/miniatura_rj45.png'),
(11, 'recursos/imagens/produtos/bateria_3v_lithium_140mah.png', '3.00', 'Bateria 3V Lithium 140mAh FX-CR2025', 'baterias', 'Marca: Dmix', 'Modelo: FX- CR2025', 'Bateria para :', 'Calculadoras', 'Agendas Eletronicas', 'Placa mãe de computadores', 'Controle Remoto', 'Chaves de carro', '', '', 'sim', 'recursos/imagens/produtos/miniatura_bateria_3v_lithium_140mah.png'),
(12, 'recursos/imagens/produtos/teclado_usb_hardline.png', '30.00', 'Teclado Standard USB ABNT2', 'teclados', 'Marca: Hard Line', 'Modelo: 8153', 'Conexão: USB', 'Plug & Play', 'ABNT2 – Brasil', '', '', '', '', '', 'sim', 'recursos/imagens/produtos/miniatura_teclado_usb_hardline.png'),
(13, 'recursos/imagens/produtos/adaptador_wifi.png', '35.00', 'Adaptador 150 MBPS WIRELESS-WI-FI', 'rede', 'Marca: Dmix', 'Modelo: Dongle82', 'Suporte IEEE802.11n padrão', 'Transmissão mais rápida', 'Faixa de freqüência: 2,4-2,4835 GHz', '', '', '', '', '', 'sim', 'recursos/imagens/produtos/miniatura_adaptador_wifi.png'),
(14, 'recursos/imagens/produtos/leitor_cartao_memoria_maxtech_stw.png', '45.00', 'Leitor de Cartão de Memoria', 'leitores', 'Marca: Xtrad', 'Modelo: STW ICR 007', 'Fornecer a interface USB 2.0 totalmente compatível com dispositivos USB1.1', 'Suporta taxa de transferência de dados de alta velocidade até 480Mbps', 'Forneça dois indicadores LED para o estado em uso', '', '', '', '', '', 'sim', 'recursos/imagens/produtos/miniatura_leitor_cartao_memoria_maxtech_stw.png'),
(15, '', '10.00', 'Frete', 'frete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos_itens`
--
ALTER TABLE `pedidos_itens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pedidos_itens`
--
ALTER TABLE `pedidos_itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
