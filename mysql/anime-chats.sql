-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2023 às 11:16
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `anime-chats`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `idchat` int(11) NOT NULL,
  `tema_comunidade` int(11) NOT NULL COMMENT 'foreign key',
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`idchat`, `tema_comunidade`, `titulo`) VALUES
(1, 3, 'Jogos'),
(2, 3, 'mangá 2015'),
(3, 3, 'anime'),
(4, 3, 'anime2'),
(5, 2, 'boruto é fraco'),
(6, 2, 'Jogos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidade`
--

CREATE TABLE `comunidade` (
  `idcomunidade` int(11) NOT NULL,
  `idcriador` int(11) NOT NULL COMMENT 'foreign key',
  `nome` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `sistuacao` varchar(1) NOT NULL,
  `descricao` varchar(3000) NOT NULL,
  `idtema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comunidade`
--

INSERT INTO `comunidade` (`idcomunidade`, `idcriador`, `nome`, `foto`, `sistuacao`, `descricao`, `idtema`) VALUES
(2, 7, 'Fãs de Boruto', '../img/comunidades/trend-1.jpg', '1', 'amamos boruto', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `idmembro` int(11) NOT NULL,
  `idcomunidade` int(11) NOT NULL COMMENT 'foreign key',
  `idusuario` int(11) NOT NULL COMMENT 'foreign key',
  `tipo` varchar(100) NOT NULL,
  `situacao_membro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idmensagem` int(11) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `remetente` int(11) NOT NULL COMMENT 'foreign key',
  `chat` int(11) NOT NULL COMMENT 'foreign key',
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`idmensagem`, `conteudo`, `remetente`, `chat`, `data`, `hora`) VALUES
(1, 'aaaaaaaaaaaaa', 7, 1, '2023-05-02', '10:27:33'),
(2, 'bbbbbbbb', 7, 1, '2023-05-01', '16:33:17'),
(3, 'cccccccccc', 7, 1, '2023-05-02', '03:41:34'),
(4, 'al', 7, 5, '2023-05-30', '12:33:11'),
(5, 'oi', 7, 5, '2023-05-30', '12:49:59'),
(6, 'como esta?', 7, 5, '2023-05-30', '13:20:28'),
(7, 'oi', 7, 2, '2023-05-30', '13:25:04'),
(8, 'como vai?', 7, 2, '2023-05-30', '13:27:18'),
(9, 'voce', 7, 2, '2023-05-30', '13:27:22'),
(10, 'oi', 7, 2, '2023-05-30', '13:28:09'),
(11, 'oi', 7, 5, '2023-05-30', '15:05:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `moderador`
--

CREATE TABLE `moderador` (
  `idmoderador` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL COMMENT 'foreign key',
  `periodo` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `data_assinatura` date NOT NULL,
  `meio_pagamento` varchar(1) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `numero_cartao` int(16) DEFAULT NULL,
  `nome_cartao` varchar(100) DEFAULT NULL,
  `cod_cvv` varchar(3) DEFAULT NULL,
  `vencimento_cartao` date DEFAULT NULL,
  `chave_pix` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `moderador`
--

INSERT INTO `moderador` (`idmoderador`, `idusuario`, `periodo`, `valor`, `data_assinatura`, `meio_pagamento`, `cpf`, `numero_cartao`, `nome_cartao`, `cod_cvv`, `vencimento_cartao`, `chave_pix`) VALUES
(3, 14, 12, '15.92', '2023-05-28', 'C', 2147483647, 2147483647, 'Helen', '123', '2026-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

CREATE TABLE `tema` (
  `idtema` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sinopse` varchar(3000) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `ano_estreia` int(4) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `tipotema` varchar(50) NOT NULL,
  `fototema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tema`
--

INSERT INTO `tema` (`idtema`, `nome`, `sinopse`, `genero`, `ano_estreia`, `quantidade`, `estado`, `tipotema`, `fototema`) VALUES
(2, 'Boruto: Naruto Next Generations', 'Mais de 12 anos após a Quarta Grande Guerra Ninja, o mundo finalmente se encontra em paz, Naruto Uzumaki realizou seu sonho de se tornar Hokage, alguns anos após seu casamento com Hinata Hyuga, com quem teve dois filhosː Boruto e Himawari. Seu filho mais velho se tornou parte da equipe comanda por Konohamaru Sarutobi, junto com a filha de Sasuke Uchiha com Sakura, Sarada, além de Mitsuki, criação de Orochimaru. Boruto se sente distante de seu pai devido aos seus deveres como Hokage, quando Sasuke vem à vila para alertar um perigo a Naruto, ele é abordado por Boruto, que o convence a ser seu mestre, mas o Uchiha diz que só aceita se ele souber fazer o Rasengan, para obter atenção de seu pai, o jovem acaba trapaceando e adquirindo uma ferramenta ninja capaz de realizar qualquer jutsu de forma simples, mas durante o Exame Chunin, durante uma batalha contra Shinke, filho adotivo de Gaara, seu truque acaba sendo descoberto e ele é desclassificado do torneio, tendo sua bandana retirada pelo seu próprio pai. Momoshiki e Kinshiki, do clã do Otsutsuki, invadem a arena para capturar a Kurama de Naruto e assim revitalizar a Árvore Divina na dimensão de onde vieram. Após ver seu pai arriscar a vida pela vila, Boruto pede a ajuda de Sasuke e dos Cinco Kages para trazê-lo de volta. Eles chegam na outra dimensão através de um portal, e encontram o Sétimo Hokage, dando início a uma grande batalha. Kinshiki tem seu poder absorvido por Momoshiki. Após Sasuke o ter distraído, Naruto passa uma grande quantidade de chakra para seu filho, possibilitando a criação de um Rasengan gigante, para dar um fim a Momoshiki. Embora morrendo, notando o potencial inexplorado do seu assassino, Momoshiki vive o suficiente para ter uma discussão privada com Boruto e avisa que ele logo enfrentará muita adversidade e sofrimento em sua vida. Boruto adquiriu poderes divinos por derrotar Momoshiki. Sem saber o que o futuro lhe reserva, ele aceita seu destino.', 'Shonen', 2017, 293, 'Em andamento', 'Anime', '../img/temas/trend-1.jpg'),
(3, 'Ensemble Stars!', 'Yumenosaki Private Academy, uma escola localizada em uma colina de frente para o oceano. Especializada em treinamento de ídolos para meninos, a escola tem uma longa história de produção de gerações de ídolos para o mundo do entretenimento, com jovens talentosos, como as estrelas brilhando no céu. Devido a & quot; circunstâncias especiais & quot; você é um estudante de transferência na escola, bem como o único estudante do sexo feminino lá. De fato, você é escolhido para ser o primeiro aluno do curso \"produtor\", & quot; e sua tarefa é produzir esses ídolos & hellip; Esperamos que você aproveite sua jornada com os ídolos que encontra na academia, bem como o conjunto vigoroso que juntos vocês farão.', 'Shōjo', 2019, 24, 'Finalizado', 'Anime', '../img/temas/trend-2.jpg'),
(4, 'ID: INVADED', 'A história segue Sakaido, um detetive que se encontra em um mundo virtual estranho, onde decide investigar o assassinato de uma garota chamada Kaeru-chan.', 'Ficção Científica', 2020, 13, 'Finalizado', 'Anime', '../img/temas/trend-3.jpg'),
(5, 'Dragon Ball', 'Son Goku é um menino com um rabo de macaco que vive sozinho nas montanhas após a morte do seu avô. Um dia, uma lembrança do avô de Goku atrai Bulma, uma garota em busca das lendárias esferas do dragão, capazes de invocar o dragão Shenglong, que realiza qualquer desejo. Só que eles não sabiam que sua jornada vai ser regada a altas aventuras e perigos.', 'Shounen', 1986, 153, 'Finalizado', 'Anime', '../img/temas/257cdb6a1fdd566600a01eb0f9f73b22.jpg'),
(6, 'Naruto Shippuden', 'Naruto Shippuden é a segunda parte do anime Naruto, que adapta a continuação do mangá original escrito por Masashi Kishimoto e consiste em 500 episódios ao todo. Ambientada dois anos após os eventos da série original, Shippuden acompanha o ninja adolescente Naruto e seus aliados. Naruto retorna a Aldeia da Folha (Konoha), depois de passar os últimos tempos treinando com um dos três ninjas lendários: Jiraiya. Sasuke fugiu da Aldeia da Folha para se juntar a Orochimaru e matar seu irmão, Itachi Uchiha. Enquanto isso, Akatsuki começa a recrutar demônios, tendo como primeiro alvo Gaara da Aldeia da Areia. Por sua vez, Naruto decide tentar convencer Sasuke a voltar para casa mais uma vez, mas encontrando o dobro de inimigos no caminho e tendo que conquistar o respeito da Aldeia à medida que a protege. Apesar de existir a possibilidade de paz, o destino da Aldeia da Folha corre perigo.', 'Shounen', 2007, 500, 'Finalizado', 'Anime', '../img/temas/naruto.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `perfil` varchar(1) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nascimento` date NOT NULL,
  `situacaoUsuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `estado`, `cidade`, `genero`, `perfil`, `telefone`, `foto`, `nascimento`, `situacaoUsuario`) VALUES
(7, 'Daniel Souza de Lima', 'danielsouzalimabsb@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Samambaia Sul', 'M', 'A', '61986175242', '../img/usuarios/3e69b9aa-0fc7-4d11-b79b-a879f3e8049d.jpeg', '2005-05-19', 1),
(13, 'Janaina', 'janaina@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Ceilandia', 'F', 'U', '61986456251', '../img/usuarios/user.png', '2023-05-17', 1),
(14, 'Helen Eloísia', 'helen@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Ceilandia', 'F', 'M', '(61) 98617-5242', '../img/usuarios/user.png', '2005-01-31', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`);

--
-- Índices para tabela `comunidade`
--
ALTER TABLE `comunidade`
  ADD PRIMARY KEY (`idcomunidade`);

--
-- Índices para tabela `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`idmembro`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idmensagem`);

--
-- Índices para tabela `moderador`
--
ALTER TABLE `moderador`
  ADD PRIMARY KEY (`idmoderador`);

--
-- Índices para tabela `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`idtema`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `comunidade`
--
ALTER TABLE `comunidade`
  MODIFY `idcomunidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `membro`
--
ALTER TABLE `membro`
  MODIFY `idmembro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idmensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `moderador`
--
ALTER TABLE `moderador`
  MODIFY `idmoderador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tema`
--
ALTER TABLE `tema`
  MODIFY `idtema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
