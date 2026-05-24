-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql106.infinityfree.com
-- Tempo de geração: 01/06/2025 às 10:17
-- Versão do servidor: 10.6.19-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if0_36899048_scciptv`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `dataCreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `usuario`, `email`, `senha`, `dataCreate`) VALUES
(1, 'MAURICIO FRANCA', 'mauriciodossantosfranca@hotmail.com', '130121', '2024-07-29 00:25:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `fk_idAdmin` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(60) NOT NULL,
  `contato` varchar(30) NOT NULL,
  `ultimoPag` date NOT NULL,
  `conta` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `dataCreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `fk_idAdmin`, `nome`, `UF`, `cidade`, `bairro`, `logradouro`, `numero`, `complemento`, `contato`, `ultimoPag`, `conta`, `senha`, `dataCreate`) VALUES
(13, 1, 'RIVALDO', 'BA', 'Juazeiro', 'Joao paulo ll', 'Quadra 7', '19', 'Casa', '74981523796', '2025-04-22', '761056448823', '760671343540', '2024-08-04 13:31:44'),
(14, 1, 'JOAIS DA UVA', 'BA', 'Juazeiro', 'Joao paulo ll', 'Rua do cemiterio', '0', 'Casa', '74123312314', '2025-05-10', '941499169862', '149282899172', '2024-08-04 13:33:58'),
(16, 1, 'INACIO FELIPE DASMACENO', 'BA', 'Juazeiro', 'Res. Juazeiro ll', 'Bloco:17, Ap:103', 'Ap:103', 'Casa', '74981558012', '2024-07-18', '0', '0', '2024-08-12 17:15:29'),
(17, 1, 'SEBASTIÃƒO GOMES', 'BA', 'Juazeiro', 'Brisa da serra', 'Rua: T, Quadra:U, bloco:06, Ap:2A', 'Ap:2A', 'Casa', '7491032751', '2025-04-23', '358294994401', '198758811761', '2024-08-12 17:17:14'),
(19, 1, 'CONTA LIVRE', 'BA', 'Juazeiro', 'Brisa da serra', 'Rua:A, Quadra: H, Bloco: 05, Ap:101A (Ao lado da lan house)', ' Ap:10', 'casa', '74981353060', '2024-10-18', '906630494008', '721006099802', '2024-08-12 17:20:24'),
(20, 1, 'CONTA LIVRE', 'BA', 'Juazeiro', 'Praia do rodeadouro', 'Rua: Ilha do jatoba', 'NÂº:69', 'Casa', '74981462673', '2024-07-18', '924228275961', '257432681890', '2024-08-12 17:22:34'),
(22, 1, 'CONTA LIVRE', 'BA', 'Juazeiro', 'Brisa da Serra', 'Rua: P Quadra: K Bloco: 02 AP: 02a', ' 02A', 'Casa', '74988365239', '2024-10-18', '404856985567', '550092486744', '2024-08-12 17:26:02'),
(23, 2, 'USUARIO TESTE', 'BA', 'Juazeiro', 'Res. Juazeiro 2', 'Rua B Bloco 45', 'Ap 102A', 'Apartamento', '74981343286', '2024-10-02', '828828383838', '838338388393', '2024-10-02 04:45:37'),
(24, 1, 'ALISSON EDVALDO', 'BA', 'Juazeiro', 'Dr. Humberto 3', 'Rua B', '39a', 'Casa', '74981343286', '2024-10-18', '164277811738', '036796593149', '2024-10-11 06:52:50'),
(26, 1, 'CONTA LIVRE', 'BA', 'Juazeiro', 'Vila Nova FÃ©', 'Rua: 1', '116', 'Casa, Atras da Buatano', '11946815378', '2024-10-19', '578914195988', '490081221171', '2024-10-12 07:52:53'),
(27, 1, 'MANUELA', 'BA', 'Juazeiro', 'Praia do Rodeadouro', 'Rua:Ilha de nossa sra.', '86', 'Casa', '74991229668', '2024-10-18', '533819587661', '496234341063', '2024-10-12 07:56:00'),
(28, 1, 'CONTA LIVRE', 'BA', 'Juazeiro', 'Tabuleiro', 'Rua: SÃ£o Jorge', '1234', 'casa', '11988535447', '2024-10-20', '427751677022', '035798553531', '2024-10-12 08:10:14'),
(29, 1, 'FRANCISCO GONSALVES', 'BA', 'Juazeiro', 'Res. Juazeiro 1', 'Rua: K, Bloco: 180', 'AP: 03', 'Apartamento', '74988101462', '2024-09-16', '0', '0', '2024-10-12 08:14:18'),
(31, 1, 'WILIANE SOUSA', 'BA', 'Juazeiro', 'Alto da AlianÃ§a', 'Rua EstÃ¡cio de SÃ¡', '465', 'Casa', '11946815378', '2024-09-16', '0', '0', '2024-10-13 08:31:28'),
(32, 1, 'ANDRESA SOUZA', 'BA', 'Juazeiro', 'Argemiro', 'Rua: None', '100', 'casa', '74988589837', '2024-10-19', '070782614147', '496234341063', '2024-10-18 17:35:49'),
(33, 1, 'ADRIANO ANSELMO DE SOUZA', 'BA', 'Juazeiro', 'Argemiro', 'Rua da conceiÃ§Ã£o', '0', 'Casa', '7491906007', '2024-10-20', '778270569112', '232123743979', '2024-10-20 07:08:19');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_idAdmin` (`fk_idAdmin`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`fk_idAdmin`) REFERENCES `administrador` (`idAdmin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
