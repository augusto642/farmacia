-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2019 às 00:50
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmacia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `dataNascimento` date NOT NULL,
  `endereco` varchar(55) NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(55) NOT NULL,
  `telefone` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `cpf`, `nome`, `dataNascimento`, `endereco`, `numero`, `bairro`, `telefone`, `celular`, `email`) VALUES
(1, 2147483647, 'joao', '2019-09-11', 'julio de castilho', 36, 'centro', 37244567, 999280448, 'a@a.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedores`
--

CREATE TABLE `tb_fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `cnpj` int(20) NOT NULL,
  `inscricao` int(20) NOT NULL,
  `endereco` varchar(55) NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(55) NOT NULL,
  `cidade` varchar(55) NOT NULL,
  `cep` int(20) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_fornecedores`
--

INSERT INTO `tb_fornecedores` (`id`, `nome`, `cnpj`, `inscricao`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `uf`, `telefone`, `email`) VALUES
(1, 'fornecedor1', 2147483647, 2147483647, 'julio de castilho', 836, 'centro', 'cachoeira do sul', 96501, 'RS', 37244567, 'a@a.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lembrete`
--

CREATE TABLE `tb_lembrete` (
  `id` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_lembrete`
--

INSERT INTO `tb_lembrete` (`id`, `texto`, `data`, `usuario`) VALUES
(1, 'Recado 01', '2019-09-23', 2),
(2, 'recado 2', '2019-09-23', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(55) NOT NULL,
  `codInterno` int(20) NOT NULL,
  `codBarras` int(11) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `custo` int(11) NOT NULL,
  `venda` int(11) NOT NULL,
  `principio` varchar(55) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `descricao`, `codInterno`, `codBarras`, `fornecedor`, `custo`, `venda`, `principio`, `quantidade`) VALUES
(1, 'remedio ', 1, 777898888, 1, 10, 18, 'axxxxx', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `usuario` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `cargo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `usuario`, `senha`, `cargo`) VALUES
(1, 'admin', 'admin', '12345', '0'),
(2, 'augusto', 'augusto', '12345', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vendas`
--

CREATE TABLE `tb_vendas` (
  `id` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data` date NOT NULL,
  `vendedor` int(11) NOT NULL,
  `cliente` varchar(55) DEFAULT NULL,
  `n_NotaFiscal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_venda_produtos`
--

CREATE TABLE `tb_venda_produtos` (
  `id` int(11) NOT NULL,
  `n_nota_fiscal` int(11) NOT NULL,
  `codBarras` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `quant` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fornecedores`
--
ALTER TABLE `tb_fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lembrete`
--
ALTER TABLE `tb_lembrete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_venda_produtos`
--
ALTER TABLE `tb_venda_produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_fornecedores`
--
ALTER TABLE `tb_fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lembrete`
--
ALTER TABLE `tb_lembrete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_lembrete`
--
ALTER TABLE `tb_lembrete`
  ADD CONSTRAINT `tb_lembrete_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `tb_usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
