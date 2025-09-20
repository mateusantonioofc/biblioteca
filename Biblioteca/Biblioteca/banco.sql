-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23-Mar-2022 às 19:42
-- Versão do servidor: 10.5.12-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18666144_bibliotecaluz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestados`
--

CREATE TABLE `emprestados` (
  `id` int(11) NOT NULL,
  `livro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aluno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serie` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `dataR` date NOT NULL,
  `dataE` date NOT NULL,
  `informacoes` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `emprestados`
--

INSERT INTO `emprestados` (`id`, `livro`, `aluno`, `serie`, `dataR`, `dataE`, `informacoes`, `estado`) VALUES
(27, 'Guerra do Paraguai ', 'Yasmin ', '7B', '2022-03-16', '2022-03-18', '', 'atrasado'),
(28, 'A bailarina e outros poemas', 'Mateus Antônio ', '7C', '2022-03-09', '2022-03-17', '', 'No prazo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `livro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estante` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prateleira` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `informacoes` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `livro`, `autor`, `estante`, `prateleira`, `codigo`, `informacoes`) VALUES
(9, 'Pé de guerra', 'Sonia Robatto', '', '', '', 'memória de uma menina na guerra da Bahia'),
(10, 'Um assassinato um mistério e um casamento', 'Mark Twain', '', '', '', ''),
(11, 'Aprendendo a amar e a curar', 'Moacyr Scliar', '', '', '', ''),
(12, 'A arvore que dava dinheiro', 'Domingos Pellegrini', '', '', '', ''),
(13, 'Os contadores de histórias', 'Pedro bandeira', '', '', '', ''),
(14, 'Deixa que eu conto', 'Mario Quintana', '', '', '', ''),
(15, 'Eu sobrevivi ao Holocausto', 'Nanette Blitz Konig', '', '', '', ''),
(16, 'Dom Casmurro', 'Machado de Assis', '', '', '', ''),
(17, 'Luana Adolescente, Luana Crescente', 'Sylvia Orthof', '', '', '', ''),
(18, 'Mandela, o africano de todas as cores', 'Alain Serres e Zaü', '', '', '', ''),
(19, 'O homem ideal', 'Dean e Merril Buckhorm', '', '', '', ''),
(20, 'O carregador de notícias', '', '', '', '', ''),
(21, 'Uma missão de outro mundo', '', '', '', '', ''),
(22, 'O começo da cuca', 'Haroldo Maranhão', '', '', '', ''),
(23, 'A batalha dos Mamulengos', 'Rubem Rocha Filho', '', '', '', ''),
(24, 'A caixa azul madrugada', 'Tereza Hallinday', '', '', '', ''),
(25, 'Contos universais', 'Anton Tchekhov', '', '', '11', ''),
(26, 'Historias divertidas', 'Fernando sabino', '', '', '13', ''),
(27, 'Sombras no asfalto', 'Luís Dill', '', '', '', ''),
(28, 'Cenas Brasileiras', 'Rachel De Queiroz', '', '', '17', ''),
(29, 'O golpe do aniversariante', 'Walcyr  Carrasco', '', '', '20', ''),
(30, 'A bailarina e outros poemas', 'Roseana Murray', '', '', '', ''),
(31, 'O macaco malandro', 'Tatiana Belinky', '', '', '', ''),
(32, 'O urubo e o sapo', 'Ivan Coutinho', '', '', '', ''),
(33, 'O menino da rua da praia', 'Sergio Capparelli', '', '', '', ''),
(34, 'A nudez de verdade', 'Fernando Sabino', '', '', '', ''),
(35, 'Historias de fadas', 'Oscar Wilde', '', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestados`
--
ALTER TABLE `emprestados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestados`
--
ALTER TABLE `emprestados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
