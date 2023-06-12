-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2023 às 21:07
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idavaliacao` int(11) NOT NULL,
  `idavaliador` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `nota` int(1) NOT NULL,
  `idtema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacao`
--

INSERT INTO `avaliacao` (`idavaliacao`, `idavaliador`, `comentario`, `nota`, `idtema`) VALUES
(11, 7, 'prefiro naruto clássico.', 4, 2),
(13, 7, 'achei excelente, bom demaize!!', 5, 3),
(14, 7, 'mediano', 1, 4),
(15, 14, 'ah, não é tão ruim assim vai', 3, 4),
(16, 13, 'horrível :v', 1, 4),
(19, 14, 'não gostei, asmuei <3', 5, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat`
--

CREATE TABLE `chat` (
  `idchat` int(11) NOT NULL,
  `tema_comunidade` int(11) NOT NULL COMMENT 'foreign key',
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chat`
--

INSERT INTO `chat` (`idchat`, `tema_comunidade`, `titulo`) VALUES
(1, 3, 'Jogos'),
(2, 3, 'mangá 2015'),
(3, 3, 'anime'),
(4, 3, 'anime2'),
(5, 2, 'boruto é fraco'),
(6, 2, 'Jogos'),
(7, 2, 'anime');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comunidade`
--

CREATE TABLE `comunidade` (
  `idcomunidade` int(11) NOT NULL,
  `idcriador` int(11) NOT NULL COMMENT 'foreign key',
  `nome` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `situacao` varchar(1) NOT NULL,
  `descricao` varchar(3000) NOT NULL,
  `idtema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comunidade`
--

INSERT INTO `comunidade` (`idcomunidade`, `idcriador`, `nome`, `foto`, `situacao`, `descricao`, `idtema`) VALUES
(2, 7, 'Fãs de Boruto', '../img/comunidades/trend-1.jpg', '1', 'Bem-vindo à nossa comunidade dedicada aos fãs de Boruto! Aqui você encontrará um espaço perfeito para se conectar com outros entusiastas do universo ninja e compartilhar sua paixão pelo mundo de Boruto.\r\n\r\nNossa comunidade é um local animado, repleto de discussões sobre o mangá, anime, personagens e teorias emocionantes. Junte-se a nós para explorar os eventos da nova geração de ninjas em Konoha, liderada por Boruto Uzumaki, filho do lendário Naruto.\r\n\r\nCompartilhe suas opiniões sobre as reviravoltas da trama, as habilidades únicas dos personagens e as conexões com a série predecessora, Naruto. Troque ideias sobre os arcos narrativos, lutas épicas, desenvolvimento dos personagens e a evolução do universo ninja como um todo.\r\n\r\nAlém disso, aqui você encontrará informações atualizadas sobre lançamentos de episódios, capítulos do mangá, notícias e eventos relacionados a Boruto. Fique por dentro de todas as novidades e esteja preparado para participar de conversas emocionantes e teorias envolventes.\r\n\r\nNossa comunidade valoriza o respeito e a diversidade de opiniões, proporcionando um ambiente acolhedor para todos os fãs. Todos são bem-vindos para expressar sua paixão por Boruto, compartilhar suas teorias, criar fanarts, cosplays e interagir com outros membros.\r\n\r\nEstamos entusiasmados por tê-lo aqui! Junte-se à nossa comunidade de fãs de Boruto e mergulhe em um mundo repleto de aventura, emoção e camaradagem ninja.', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `denuncia`
--

CREATE TABLE `denuncia` (
  `iddenuncia` int(11) NOT NULL,
  `iddenunciante` int(11) NOT NULL,
  `ocorrencia` varchar(3000) NOT NULL,
  `contato` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `denuncia`
--

INSERT INTO `denuncia` (`iddenuncia`, `iddenunciante`, `ocorrencia`, `contato`) VALUES
(5, 7, 'Não gostei do comportamento de helen na comunidade fãs de boruto', 'danielsouzalimabsb@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idmensagem` int(11) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `remetente` int(11) NOT NULL COMMENT 'foreign key',
  `chat` int(11) NOT NULL COMMENT 'foreign key',
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mensagem`
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
(11, 'oi', 7, 5, '2023-05-30', '15:05:18'),
(12, 'oi', 7, 5, '2023-06-04', '09:43:58'),
(13, 'bom dia', 7, 5, '2023-06-04', '09:46:48'),
(14, 'oi', 7, 6, '2023-06-04', '09:46:57'),
(15, 'a', 7, 1, '2023-06-04', '09:59:26'),
(16, 'a', 7, 1, '2023-06-04', '09:59:27'),
(17, 'a', 7, 1, '2023-06-04', '09:59:27'),
(18, 'a', 7, 1, '2023-06-04', '09:59:28'),
(19, 'oi', 14, 5, '2023-06-08', '19:07:31'),
(20, 'oi', 7, 5, '2023-06-08', '19:07:39'),
(21, '✊', 14, 5, '2023-06-08', '19:08:55'),
(23, '2\r\n', 14, 5, '2023-06-08', '19:23:06'),
(25, 'oi\r\n\r\n', 14, 2, '2023-06-08', '20:08:50'),
(26, '????', 14, 5, '2023-06-08', '20:10:25'),
(27, '????khj', 14, 5, '2023-06-08', '20:10:37'),
(28, 'kh????j', 14, 5, '2023-06-08', '20:10:45'),
(29, 'kh????jkjhkjhkjhgkj', 14, 5, '2023-06-08', '20:10:52'),
(30, 'oi', 14, 6, '2023-06-08', '20:11:01'),
(31, '????', 0, 0, '2023-06-08', '20:12:07'),
(32, 'oi????', 14, 6, '2023-06-08', '20:12:34'),
(33, '0', 14, 6, '2023-06-08', '20:14:36'),
(34, 'muito ruim', 7, 5, '2023-06-09', '11:36:10'),
(35, 'sdadsa', 7, 5, '2023-06-09', '11:36:38'),
(36, 'fdsfdsfsd', 7, 5, '2023-06-09', '11:37:24'),
(37, 'gfdgdfgdf', 7, 5, '2023-06-09', '11:37:47'),
(38, 'gfdgfd', 7, 5, '2023-06-09', '11:38:15'),
(39, 'dasdasd', 7, 5, '2023-06-09', '11:38:50'),
(40, 'ytryrty', 7, 5, '2023-06-09', '11:41:22'),
(41, '', 7, 5, '2023-06-09', '11:41:22'),
(42, 'iuyiyuiyui', 7, 5, '2023-06-09', '11:41:44'),
(43, '', 7, 5, '2023-06-09', '11:41:44'),
(44, '[', 7, 5, '2023-06-09', '11:41:44'),
(45, '', 7, 5, '2023-06-09', '11:41:45'),
(46, 'oi', 14, 5, '2023-06-09', '11:43:41'),
(47, 'oi', 14, 5, '2023-06-09', '11:48:40'),
(48, 'oi', 14, 5, '2023-06-09', '11:48:51'),
(49, '', 14, 5, '2023-06-09', '11:48:53'),
(50, '', 14, 5, '2023-06-09', '11:48:54'),
(51, '', 14, 5, '2023-06-09', '11:48:54'),
(52, '', 14, 5, '2023-06-09', '11:48:54'),
(53, '', 14, 5, '2023-06-09', '11:48:55'),
(54, '', 14, 5, '2023-06-09', '11:48:55'),
(55, '', 14, 5, '2023-06-09', '11:48:55'),
(56, 'oi', 14, 6, '2023-06-09', '11:49:49'),
(57, 'oi', 14, 5, '2023-06-09', '11:50:03'),
(58, 'oi', 14, 5, '2023-06-09', '11:56:44'),
(59, 'oi', 14, 5, '2023-06-09', '11:56:48'),
(60, 'oi', 14, 6, '2023-06-09', '11:56:57'),
(61, 'oi', 14, 6, '2023-06-09', '11:57:12'),
(62, 'oi', 7, 5, '2023-06-09', '12:08:56'),
(63, 'oi', 7, 6, '2023-06-09', '12:09:05'),
(64, 'oi', 7, 5, '2023-06-09', '12:11:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `moderador`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `moderador`
--

INSERT INTO `moderador` (`idmoderador`, `idusuario`, `periodo`, `valor`, `data_assinatura`, `meio_pagamento`, `cpf`, `numero_cartao`, `nome_cartao`, `cod_cvv`, `vencimento_cartao`, `chave_pix`) VALUES
(3, 14, 12, 15.92, '2022-05-28', 'C', 2147483647, 2147483647, 'Helen', '123', '2026-11-01', NULL),
(7, 13, 6, 17.91, '2023-06-10', 'P', NULL, NULL, NULL, NULL, '2023-06-11', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tema`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tema`
--

INSERT INTO `tema` (`idtema`, `nome`, `sinopse`, `genero`, `ano_estreia`, `quantidade`, `estado`, `tipotema`, `fototema`) VALUES
(2, 'Boruto: Naruto Next Generations', 'Mais de 12 anos após a Quarta Grande Guerra Ninja, o mundo finalmente se encontra em paz, Naruto Uzumaki realizou seu sonho de se tornar Hokage, alguns anos após seu casamento com Hinata Hyuga, com quem teve dois filhosː Boruto e Himawari. Seu filho mais velho se tornou parte da equipe comanda por Konohamaru Sarutobi, junto com a filha de Sasuke Uchiha com Sakura, Sarada, além de Mitsuki, criação de Orochimaru. Boruto se sente distante de seu pai devido aos seus deveres como Hokage, quando Sasuke vem à vila para alertar um perigo a Naruto, ele é abordado por Boruto, que o convence a ser seu mestre, mas o Uchiha diz que só aceita se ele souber fazer o Rasengan, para obter atenção de seu pai, o jovem acaba trapaceando e adquirindo uma ferramenta ninja capaz de realizar qualquer jutsu de forma simples, mas durante o Exame Chunin, durante uma batalha contra Shinke, filho adotivo de Gaara, seu truque acaba sendo descoberto e ele é desclassificado do torneio, tendo sua bandana retirada pelo seu próprio pai. Momoshiki e Kinshiki, do clã do Otsutsuki, invadem a arena para capturar a Kurama de Naruto e assim revitalizar a Árvore Divina na dimensão de onde vieram. Após ver seu pai arriscar a vida pela vila, Boruto pede a ajuda de Sasuke e dos Cinco Kages para trazê-lo de volta. Eles chegam na outra dimensão através de um portal, e encontram o Sétimo Hokage, dando início a uma grande batalha. Kinshiki tem seu poder absorvido por Momoshiki. Após Sasuke o ter distraído, Naruto passa uma grande quantidade de chakra para seu filho, possibilitando a criação de um Rasengan gigante, para dar um fim a Momoshiki. Embora morrendo, notando o potencial inexplorado do seu assassino, Momoshiki vive o suficiente para ter uma discussão privada com Boruto e avisa que ele logo enfrentará muita adversidade e sofrimento em sua vida. Boruto adquiriu poderes divinos por derrotar Momoshiki. Sem saber o que o futuro lhe reserva, ele aceita seu destino.', 'Shounen', 2017, 293, 'Em andamento', 'Anime', '../img/temas/trend-1.jpg'),
(3, 'Ensemble Stars!', 'Yumenosaki Private Academy, uma escola localizada em uma colina de frente para o oceano. Especializada em treinamento de ídolos para meninos, a escola tem uma longa história de produção de gerações de ídolos para o mundo do entretenimento, com jovens talentosos, como as estrelas brilhando no céu. Devido a & quot; circunstâncias especiais & quot; você é um estudante de transferência na escola, bem como o único estudante do sexo feminino lá. De fato, você é escolhido para ser o primeiro aluno do curso \"produtor\", & quot; e sua tarefa é produzir esses ídolos & hellip; Esperamos que você aproveite sua jornada com os ídolos que encontra na academia, bem como o conjunto vigoroso que juntos vocês farão.', 'Shōjo', 2019, 24, 'Finalizado', 'Anime', '../img/temas/trend-2.jpg'),
(4, 'ID: INVADED', 'A história segue Sakaido, um detetive que se encontra em um mundo virtual estranho, onde decide investigar o assassinato de uma garota chamada Kaeru-chan.', 'Ficção Científica', 2020, 13, 'Finalizado', 'Anime', '../img/temas/trend-3.jpg'),
(5, 'Dragon Ball', 'Son Goku é um menino com um rabo de macaco que vive sozinho nas montanhas após a morte do seu avô. Um dia, uma lembrança do avô de Goku atrai Bulma, uma garota em busca das lendárias esferas do dragão, capazes de invocar o dragão Shenglong, que realiza qualquer desejo. Só que eles não sabiam que sua jornada vai ser regada a altas aventuras e perigos.', 'Shounen', 1986, 153, 'Finalizado', 'Anime', '../img/temas/257cdb6a1fdd566600a01eb0f9f73b22.jpg'),
(6, 'Naruto Shippuden', 'Naruto Shippuden é a segunda parte do anime Naruto, que adapta a continuação do mangá original escrito por Masashi Kishimoto e consiste em 500 episódios ao todo. Ambientada dois anos após os eventos da série original, Shippuden acompanha o ninja adolescente Naruto e seus aliados. Naruto retorna a Aldeia da Folha (Konoha), depois de passar os últimos tempos treinando com um dos três ninjas lendários: Jiraiya. Sasuke fugiu da Aldeia da Folha para se juntar a Orochimaru e matar seu irmão, Itachi Uchiha. Enquanto isso, Akatsuki começa a recrutar demônios, tendo como primeiro alvo Gaara da Aldeia da Areia. Por sua vez, Naruto decide tentar convencer Sasuke a voltar para casa mais uma vez, mas encontrando o dobro de inimigos no caminho e tendo que conquistar o respeito da Aldeia à medida que a protege. Apesar de existir a possibilidade de paz, o destino da Aldeia da Folha corre perigo.', 'Shounen', 2007, 500, 'Finalizado', 'Anime', '../img/temas/naruto.jpg'),
(8, 'SPY x FAMILY', 'Há décadas, as nações de Ostania e Westalis promovem uma guerra fria sem fim. Para investigar os movimentos do presidente de um importante partido político, Westalis mobiliza Twilight, seu melhor agente, a montar uma família falsa e se infiltrar nos eventos sociais promovidos pela escola do filho do político. Mas por um acaso do destino, Twilight acaba adotando Anya, uma jovem com poderes telepáticos, e se \"casando\" com Yor, uma assassina profissional! Sem saberem das identidades uns dos outros, este trio incomum vai embarcar em aventuras cheias de surpresas para garantir a paz mundial.', 'Shounen, Comédia, Drama', 2019, 75, 'Em andamento', 'Mangá', '../img/temas/wJOLiZIDvtmNbOaaHxQrRGzCAEu.jpg'),
(9, 'Tales of Demons And Gods', 'O mais poderoso Espiritualista Demoníaco, Nie Li estava no topo do mundo marcial, mas toda sua força não foi suficiente na luta contra o Imperador Sábio e as Seis Bestas de nível Divino. Ao morrer, a alma de Nie Li retrocede o tempo, e agora ele acorda como ele mesmo aos 13 anos de idade. Porém com todas as lembranças e conhecimento de sua 1ª vida.\r\n\r\nPor saber toda a dificuldade que sua amada Cidade da Glória irá enfrentar, mesmo sendo o mais fraco do reino mais fraco, Nie Li vai usar e abusar de todo seu conhecimento para mudar o futuro, e proteger todos que são importantes para ele.', 'Shounen, Ação, Aventura', 2015, 429, 'Em andamento', 'Manhua', '../img/temas/Capturar.JPG'),
(10, 'Solo Leveling', 'Dez anos atrás, vários portais que conectam o mundo dos monstros com o mundo humano aparecem espalhados pela Terra. Com isso algumas pessoas despertam com poderes para combater esses monstros. Essas pessoas são conhecidas como Caçadores, dentre elas existe um ranking de força que vai da classe E como mais fraca até a S mais forte.\r\n\r\nO jovem Sung Jin-Woo despertou como Caçador classe E, logo ele ficou conhecido como o Caçador mais fraco do mundo. Como seu pai desapareceu e sua mãe está acamada no hospital, a única forma de conseguir dinheiro é arriscar a vida em algumas dungeons dentro dos portais.\r\n\r\nMas um dia dentro de um portal classe D aparece uma dungeon secreta o grupo decide seguir em frente e tentar fechar o portal. Porém algo muito ruim acontece e a vida de Sung Jin-Woo muda para sempre.', 'Shounen, Aventura,  Magia', 2016, 179, 'Finalizado', 'Manhwa', '../img/temas/Capturar1.JPG'),
(11, 'One Piece', 'Houve um homem que conquistou tudo aquilo que o mundo tinha a oferecer, o lendário Rei dos Piratas, Gold Roger. Capturado e condenado à execução pelo Governo Mundial, suas últimas palavras lançaram legiões aos mares. \"Meu tesouro? Se quiserem, podem pegá-lo. Procurem-no! Ele contém tudo que este mundo pode oferecer!\".\r\n\r\nFoi a revelação do maior tesouro, o One Piece, cobiçado por homens de todo o mundo, sonhando com fama e riqueza imensuráveis... Assim começou a Grande Era dos Piratas!', 'Shounen, Ação, Aventura, Fantasia', 1999, 1049, 'Em andamento', 'Anime', '../img/temas/Capturar2.JPG'),
(12, 'The Quintessential Quintuplets', 'Uesugi Fuutarou, um estudante do segundo ano do colegial que vem de uma família pobre, recebe uma irrecusável proposta para trabalhar como tutor... e descobre que suas pupilas são suas colegas de classe! E pra piorar, são gêmeas quíntuplas... Todas lindíssimas, mas com péssimas notas e um ódio mortal pelos estudos! Sua primeira missão será ganhar a confiança das garotas?! Todo dia é dia de festa nesta comédia romântica 500% adorável envolvendo as irmãs gêmeas da casa Nakano!', 'Comédia, Romance', 2019, 24, 'Em andamento', 'Anime', '../img/temas/MV5BZjg2MmRkZWUtY2QxNS00ZTdiLWE0ODItOGQyM2Y1ZDlkNjlmXkEyXkFqcGdeQXVyNTgyNTA4MjM@._V1_FMjpg_UX1000_.jpg'),
(13, 'Yamada-kun to Lv999 no Koi wo Suru', 'Akane Kinoshita pegou seu namorado tendo um caso com uma garota de um jogo online e ficou completamente arrasada. Ela tenta desestressar matando uns bichos no jogo, e acaba desabafando sobre seu caso com Yamada, um jogador de sua guilda — mas ele responde com um \"tô nem aí\" curto e grosso. Entretanto, quando Akane decide invadir um encontro offline do jogo para se vingar de seu ex-namorado, ela ouve essas palavras marcantes ao vivo, e seu coração bate mais forte ao conhecer Yamada ao vivo...', 'Comédia, Romance', 2018, 93, 'Em andamento', 'Mangá', '../img/temas/capa.jpg'),
(14, 'Mashle (Mashle: Magic and Muscles)', 'Este é um mundo de magia. Este é um mundo em que a magia é usada casualmente por todos. Em uma floresta profunda e escura neste mundo de magia, há um menino que está malhando obstinadamente. Seu nome é Mash Burnedead, e ele tem um segredo. Ele não pode usar magia. Tudo o que ele queria era viver uma vida tranquila com sua família, mas de repente as pessoas começaram a tentar matá-lo um dia e ele de alguma forma se viu matriculado na Escola de Magia. Lá, ele pretende se tornar um “Divino Visionário”, a elite da elite. Seus músculos definidos funcionarão contra os melhores e mais brilhantes do mundo mágico? A cortina sobe nesta fantasia mágica fora de ordem em que o poder de ser levantado esmaga qualquer feitiço!', 'Shounen, Comédia, Fantasia', 2020, 157, 'Em andamento', 'Mangá', '../img/temas/MV5BM2M1Yzc5OTMtNWQxYS00NTg5LThiYjQtODRhZGMwODVkNjAyXkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_.jpg'),
(15, ' Kaguya-sama: Love Is War', 'Veio de boa família? Sim! Tem uma personalidade promissora? Sim!\r\nTodos os jovens de elite com futuros brilhantes acabam indo parar na Academia Shuchiin.\r\nE ambos os líderes do conselho estudantil, Kaguya Shinomiya e Miyuki Shirogane, estão apaixonados um pelo outro.\r\nMas seis meses se passaram e nada aconteceu?!\r\nAmbos são orgulhosos demais para confessar seu amor, e agora ambos estão brigando pra ver quem faz o outro se declarar primeiro!\r\nA parte mais divertida do amor é o jogo da conquista!\r\nUma nova comédia romântica, sobre as batalhas intelectuais de dois estudantes de elite apaixonados.', 'Seinen, Comédia, Romance', 2015, 281, 'Finalizado', 'Mangá', '../img/temas/Capturar3.JPG'),
(16, 'True Beauty', 'Depois de assistir a vídeos de beleza on-line, uma tímida fã de quadrinhos domina a arte da maquiagem e vê sua posição social disparar ao se tornar a garota mais bonita da escola da noite para o dia. Mas seu status de elite será de curta duração? Por quanto tempo ela pode manter seu verdadeiro eu em segredo? E aquele garoto fofo que conhece o segredo dela?', 'Shoujo, Comédia, Romance, Vida Escolar', 2018, 115, 'Em andamento', 'Webtoon', '../img/temas/webtoon2.jpg'),
(17, 'Advogada extraordinária Woo', 'A brilhante Woo Young Woo, uma advogada de 27 anos com Síndrome de Asperger, devido ao seu alto QI de 164, memória impressionante e processo de pensamento criativo, formou-se como a melhor de sua classe na prestigiosa Universidade Nacional de Seul, tanto para faculdade de direito quanto para a escola. No entanto, ela ainda se encontra lutando quando se trata de interações sociais.', 'Josei, Drama, Romance', 2022, 21, 'Em andamento', 'Webtoon', '../img/temas/webtoon.jpg'),
(18, 'Buddy Daddies', 'Quando dois assassinos profissionais eliminam um perigoso mafioso, a última coisa que eles esperavam é que ele tivesse uma filhinha de quatro anos - agora órfã. Mas quando eles decidem assumir a guarda da criança, sua vida vira de pernas pro ar! Entre uma missão aqui e um tiroteio ali, os dois matadores de aluguel terão de achar tempo para preparar refeições nutritivas, estimular o crescimento intelectual da criança, e levar a pequena até a creche!', 'Ação, Comédia', 2023, 12, 'Finalizado', 'Anime', '../img/temas/Capturadetela.jpg'),
(19, 'Cowboy Bebop', 'O advento dos portais hiperespaciais, que permitem a viagem entre planetas em tempo hábil, deram início a uma Era Espacial no Sistema Solar. Spike, um ex-mafioso, e Jet, um ex-policial, são \"cowboys\", caçadores de recomepensas que voam pelo universo em busca de cabeças a prêmio. Juntos com Faye, uma misteriosa mulher desmemoriada com uma imensa dívida; Ed, uma criança selvagem com um tino para o hacking; e Ein, um corgi dotado de inteligência humana; os cinco levam uma estranha vida em comunidade a bordo da nave interplanetária Bebop.', 'Ação, Drama, Ficção Científica', 1998, 26, 'Finalizado', 'Anime', '../img/temas/Cowboy_Bebop_key_visual.jpg'),
(20, 'Death Note', 'Light Yagami é um estudante primoroso, com um currículo impecável, popular com as garotas, e entediado que só. Mas sua vida muda quando um Shinigami lhe oferece um caderno capaz de matar qualquer pessoa que ele quiser.', 'Sobrenatural, Suspense', 2006, 37, 'Finalizado', 'Anime', '../img/temas/death-note.jpg'),
(21, 'Os Cavaleiros do Zodíaco', 'Os 88 Cavaleiros de Atena trajam desde os tempos mitológicos armaduras protegidas pelas constelações do céu para, assim, servir sua deusa e preservar a paz e o amor na Terra. Agora, nos tempos modernos, nasce uma nova Atena e, para que ela não seja assassinada ainda bebê por aqueles que estão ofuscados pelo poder e pela ganância, ela é levada para longe, onde cresce como Saori Kido. Uma nova batalha santa está para começar! Vão, jovens Cavaleiros, protejam sua Atena!', 'Fantasia, Artes marciais, Ficção mítica', 1986, 114, 'Finalizado', 'Anime', '../img/temas/Os-Cavaleiros-dos-Zodiaco-Dublado-Capa.jpg'),
(22, 'Naruto', 'A Vila Oculta da Folha é lar dos ninjas mais sorrateiros. Mas doze anos atrás, uma temível Raposa de Nove Caudas aterrorizou a vila, até ser derrotada e selada no corpo de um garoto recém-nascido.', 'Shounen, Comédia, Artes marciais', 1999, 700, 'Finalizado', 'Mangá', '../img/temas/Naruto_vol._01.jpg'),
(23, 'Pokémon', 'Enquanto viaja pelas diversas cidades de uma região para cumprir seu objetivo, Ash tem a oportunidade de capturar novos Pokémon, treiná-los para ajudá-lo nas lutas de ginásio e ajudar a preencher a PokéDex com todos os Pokémon nos quais já viu. Além disso, ele eventualmente enfrenta seus rivais em combate à Equipe Rocket, uma equipe especializada em roubar Pokémon poderosos.', 'Shounen, Aventura, Comédia', 1997, 902, 'Finalizado', 'Anime', '../img/temas/pokemon-legendado-todos-os-ep.jpg'),
(24, 'Yu-Gi-Oh!', 'O estudante Yugi Mutou passou a maior parte de seu tempo sozinho jogando jogos – até que ele resolveu o Enigma do Milênio, um artefato egípcio misterioso! Possuída pelo quebra-cabeça, Yugi se torna o Yu-Gi-Oh, o Rei dos Jogos, e os enfrentará os desafios dos Jogos das Sombras – Jogos estranhos com grandes apostas e altos riscos, como apostar a sua alma e a alma de seus queridos amigos! O mangá contém novas histórias não vistas no anime, incluindo a origem de Yugi e seus amigos!', 'Shounen, Ação, Aventura, Fantasia, Sobrenatural', 1996, 343, 'Finalizado', 'Mangá', '../img/temas/Yugioh_-_The_Gospel_of_Truth.jpg'),
(25, 'Bleach', 'Kurosaki Ichigo é um estudante de 15 anos que tem uma estranha capacidade de ver, tocar e falar com espíritos de pessoas mortas. Logo que o Shinigami (Deus da Morte) Kuchiki Rukia toma conhecimento dos poderes dele ela decide investigá-lo, e acaba em uma luta com um Hollow que foi atraído pelo forte poder espiritual de Ichigo, antes de ser derrotada pela criatura, Rukia passa seus poderes a Ichigo, o qual se torna um Shinigami, e após derrotar o Hollow ingressa em uma jornada para proteger os humanos e os espíritos da ameaça dos Hollows.', 'Shounen, Ação, Aventura, Comédia, Sobrenatural', 2004, 686, 'Finalizado', 'Mangá', '../img/temas/bleach.jpg'),
(26, 'Demon Slayer', 'O mangá conta a história de Tanjiro, o filho mais velho de uma família que é massacrada por um demônio e, a única sobrevivente do incidente foi umas das suas irmãs, que por causa do massacre acaba se transformando em um demônio. Então, o protagonista, Tanjiro, sai em uma jornada para tentar achar uma ”cura” para a sua irmã.', 'Ação, Aventura, Fantasia, Luta', 2016, 205, 'Finalizado', 'Mangá', '../img/temas/demon-slayer-kimetsu-no-yaiba-vol-1.jpg'),
(27, 'Suas Mentiras Eternas', 'Rosén Walker foi presa por assassinar o próprio marido aos 17 anos. Após destruir o orgulho do Exército Imperial ao fugir duas vezes da prisão, ela é capturada novamente um ano após sua última fuga e é sentenciada a prisão perpétua. Em um navio a caminho da Ilha Monte, onde apenas os piores prisioneiros são levados, outra fuga é planejada… “Qual é o seu crime?” “Sou inocente…” “É raro um prisioneiro admitir honestamente o crime que cometeu.” Ian Connor, um ideologista firme que está encarregado do transporte dela, não deixa nenhuma brecha. “Não diga nada inútil, apenas responda o que perguntei.” Rosén, a melhor do império em fugir de prisões, e Ian Connor, um jovem herói de guerra amado por todo o império. Suas histórias se desenrolam no navio a caminho da pior prisão do planeta! Agora você é o juiz: Rosén Walker é uma mentirosa? Ou não?', 'Shoujo, Drama, Fantasia, Romance', 2021, 66, 'Em andamento', 'Manhwa', '../img/temas/yel.jpg'),
(28, 'Bastard', '\"Tem um serial killer em minha casa.\" Bastard é uma série thriller que conta a história de um garoto e seu pai, que tem um relacionamento não de pai e filho, mas de assassino e cúmplice.', 'Psicológico, Drama, Mistério', 2015, 93, 'Finalizado', 'Manhwa', '../img/temas/205549.jpg'),
(29, 'Noblesse', 'Por 820 anos ele esteve adormecido sem o conhecimento do avanço e progresso científico da humanidade. A terra que uma vez ele conhecia se tornou um lugar desconhecido com nova tecnologia, atitudes e estilos de vida. Depois de despertar, Cadis Etrama Di Raizel (ou Rai), procura se familiarizar com esta área. Ele encontra seu leal servo, Frankenstein, que atualmente é o diretor de uma escola sul coreana. Rai decide que esta escola é o local perfeito para ajudá-lo a aprender sobre o mundo moderno. Se matricula e começa a se associar com um grupo de estudantes amigáveis a fim de se enturmar. Mas este novo mundo não é mais seguro do que o antigo, e o digno e inepto tecnologicamente Rai se encontra preso em aventuras tanto ridículas quanto perigosas.', 'Shounen, Aventura, Drama, Sobrenatural, ', 2007, 544, 'Finalizado', 'Manhwa', '../img/temas/1b33195fbe69f9cfbe74585e97ff6eb4.jpg'),
(30, 'The Beginning After The End', 'Rei Grey conquistou força, riquezas e prestígio sem iguais em um mundo governado pela habilidade marcial. Entretanto, a solidão acompanha de perto aqueles de grande poder. Por detrás da máscara de um glorioso e poderoso rei, reside a casca vazia de um homem destituído de propósito e vontade. Renascido em um novo mundo repleto de magia e monstros, o Rei Grey terá a chance de refazer sua vida. Corrigir os erros do passado não será seu único desafio, pois um perigo oculto cresce a cada instante, ameaçando destruir tudo que ele trabalhou para criar, o fazendo questionar a verdadeira razão de ter recebido uma nova vida…', 'Ação, Artes Marciais, Drama, Fantasia', 2020, 175, 'Em andamento', 'Manhwa', '../img/temas/the-beginning-after-the-end-novel-chapter-1-chapter-420.jpg'),
(31, 'Tomb Raider King', 'De repente, tumbas misteriosas começaram a aparecer em todo o mundo com artefatos especiais que concedem habilidades mágicas ao soldador. Logo a corrida entre os humanos para coletar os artefatos e pisar nos fracos como as baratas começaram.\r\n\r\nJoo Heon Suh, uma escavadeira, e explorador são traídos por seus companheiros que o deixaram morrer. Quase à beira da morte, ele é subitamente transportado 15 anos no passado enquanto retém suas memórias.', 'Ação, Aventura, Fantasia, Sobrenatural', 2020, 411, 'Em andamento', 'Manhwa', '../img/temas/Capturar4.JPG'),
(32, 'Second Life Ranker ', 'Cha Yeon Woo decidiu escalar uma torre misteriosa depois que seu irmão gêmeo é traído por seus companheiros e morto. Assim, para descobrir o mistério por trás da morte de seu irmão e vingar ele tenta escalar o Obelisco.\r\nÉ a torre de Deus Sol composta por 100 andares. Cada andar é governado por demônios e às vezes deuses. Jogadores de diferentes dimensões e universo lutam e sobem a torre para alcançar o ápice, pois diz-se que uma pessoa que conquistou esta torre se tornará o próprio Deus.', 'Ação, Aventura, Fantasia', 2019, 158, 'Em andamento', 'Manhwa', '../img/temas/Capturar5.JPG'),
(33, 'The Last Human', 'Zuo Tian Chen é o último humano vivo em uma cidade infestada de zumbis. Em seus momentos finais, ele acorda milagrosamente em sua sala de aula 10 anos no passado exatamente um dia antes da queda do meteoro que aniquilou a humanidade.\r\n\r\nMesmo sendo um adolescente fraco, com todo conhecimento que possui ele irá salvar as pessoas importantes que perdeu, e mudará seu destino.', 'Aventura, Terror, Drama, Apocalipse', 2018, 510, 'Em andamento', 'Manhua', '../img/temas/59820872.jpg'),
(34, 'Star Martial God Technique', 'No mundo existem 12 caminhos para subir a Torre de Deus, e contam as lendas que esse caminhos levam a lendária estrada da imortalidade. A fim de proteger sua família, Ye Xin He participa da prova seletiva da Academia Estrela Celestial.\r\n\r\nYe Xin He pertence a Família Pena Verde, uma ramificação da Família Lua Escura. Por serem vassalos costumam ser humilhados e passar necessidades na época de escassez. Por isso o jovem quer se tornar forte e ajudar sua família a prosperar. Sendo um raro usuário da técnica marcial da estrela, Ye Xin He apresenta grande potencial dentro da academia sendo aclamado como um gênio o que é muito bom para seu futuro. Mas também chama atenção de muitas pessoas mal intencionadas. ', 'Ação, Aventura, Sobrenatural, Romance', 2016, 607, 'Em andamento', 'Manhua', '../img/temas/Capturar6.JPG'),
(35, 'July Found by Chance', 'O que você faria se descobrisse que na verdade era um personagem de uma história em quadrinhos? E um personagem extra em cima disso? Mude o curso da história, obviamente!', 'Drama, Escolar, Romance, Sobrenatural', 2018, 53, 'Em andamento', 'Webtoon', '../img/temas/44649148.jpg'),
(36, 'Sono Bisque Doll wa Koi wo Suru', 'Wakana Gojou é um garoto de quinze anos que foi socialmente traumatizado no passado devido a suas paixões. Aquele incidente deixou uma marca nele que o fez ser um recluso social. Até que um dia ele teve um encontro com Kitagawa, que é um gyaru sociável, que é o completo oposto dele. Eles logo compartilham suas paixões uns com os outros, o que leva a um relacionamento estranho.', 'Romance, Seinen, Slice of Life, Vida Escolar', 2018, 91, 'Em andamento', 'Mangá', '../img/temas/Sono_Bisque_Doll_wa_Koi_o_Suru.jpg'),
(37, 'Tomo-chan Is a Girl!', 'Aizawa Tomo cresceu em um dojo de karatê e tem vivido como uma tomboy até o ensino médio. Como resultado, seu amigo/interesse amoroso de infância, Kubota Junichirou, não a trata como uma garota. Agora... como fazer com que ele a veja como uma garota? Hmm... batê-lo até que entenda?', 'Comédia, Escolar, Romance', 2015, 954, 'Finalizado', 'Mangá', '../img/temas/tomo-chan_.jpg'),
(38, 'Afro Samurai', 'A história de Afro Samurai se passa num Japão feudal futurístico e pós-apocalíptico onde aquele que conseguir a bandana de \"Número Um\" comandará o mundo quase que à semelhança de um deus. Alguém se torna o Número Um matando o antigo Número Um e tomando sua bandana. Mas só aquele que tiver a bandana de \"Número Dois\" tem o direito de desafiar o Número Um. Por sua vez somente o número três pode desafiar o número dois e assim por diante até o número sete, que pode ser desafiado por todos. Mas isso muda quando o novo número um tem todas as outras bandanas exceto a de número dois, sob domínio de Afro. Então todos podem desafiar o número dois e somente o número dois pode desafiar o número um, deixando a missão de Afro quase impossível. Quando alguém completar as sete bandanas, ninguém mais poderá desafiá-lo.\r\nQuando criança, Afro teve seu pai (que era o Número Um) assassinado bem em sua frente pelo pistoleiro \"Justice\", que passou a ser o novo Número Um. Agora Adulto, Afro Samurai, é o atual Número Dois, e viaja pelo mundo em busca de vingança,passando por cima de qualquer empecilho pelo atual Número Um que matou seu pai.', 'Ação,Seinen', 2007, 5, 'Finalizado', 'Anime', '../img/temas/afrosamurai.png'),
(39, 'Assassination Classroom', 'A história é sobre a classe 3-E do Colégio Kunugigaoka, onde todas as manhãs, cumprimentam seu professor com um pelotão de fuzilamento em massa. O professor é uma combinação estranha de um alienígena e um polvo que se move a velocidades de Mach-20. Essa criatura é responsável por destruir 70% da lua, tornando-a sempre em forma de lua crescente. Ele anunciou que vai destruir o mundo em 1 ano. A criatura vai ensinar a classe 3-E como assassiná-lo antes do ano terminar. Mas como pode esta classe de desajustados matar um monstro tentacular, capaz de atingir velocidades de Mach 20, que pode ser o melhor professor que qualquer um deles poderia ter?', 'Ação, Comédia, Ficção científica', 2015, 22, 'Finalizado', 'Anime', '../img/temas/AssassinationClassroom.jpg'),
(40, 'Attack on Titan', 'Os seres humanos se depararam com a repentina aparição dos Titãs no distrito de Shiganshina após mais de um século de paz. Eren Yeager, Mikasa Ackerman - sua irmã adotiva - e seu amigo de infância, Armin Arlert, testemunham o aparecimento de uma Titã de 60 metros, o Titã Colossal, e outro menor, o Titã Blindado, que abrem uma brecha na muralha Maria. Os Titãs, em seguida, invadem a cidade e fazem uma carnificina, incluindo a morte da mãe de Eren, que é devorada diante de seus olhos. Ele é pego por hannes e levado para longe da casa de eren e mikasa , então, anos depois ,decide se vingar e matar todos os Titãs, entrando para Corpo de Exploração.\r\nCinco anos mais tarde, os três graduados cadetes foram enviados para o distrito de Trost, uma das cidades da fronteira que se localiza na Muralha Rose, quando o Titã Colossal reaparece e faz novamente uma brecha na muralha; na batalha que se seguiu, Eren foi devorado por um dos Titãs na frente de Armin Arlert. Pouco tempo depois, um Titã aparece e ataca os outros Titãs, em vez de seres humanos; esse acaba se revelando o próprio Eren, que de alguma forma adquiriu a capacidade de se transformar em Titã. Embora seja considerado uma ameaça por alguns, ele ajuda os soldados a recuperarem o distrito de Trost, fechando a brecha da muralha. Depois de ser levado à justiça, ele é recrutado pela Divisão de Exploração com a supervisão da Divisão de Exploração de Operações Especiais, liderada pelo capitão Levi.\r\nEm uma expedição para Shinganshina em busca de respostas para o mistério em torno de Eren, os soldados são atacados por um Titã Fêmea que tenta capturar Eren. Embora os soldados sejam capazes de capturar rapidamente a Titã Fêmea, ela se liberta e mata todos do esquadrão de Levi Ackerman, forçando o fim da expedição. Armin descobre que a Titã Fêmea é Annie Leonhardt, um dos cadetes que ensinaram Eren a lutar, e elabora um plano para capturá-la no distrito Stohess. A missão foi um sucesso, embora o alvo passa a proteger-se dentro de um cristal quase indrustutivel. Durante esta operação, os danos colaterais revelam que os Titãs residem dentro das paredes das muralhas.', 'Ação, Fantasia sombria, Pós-apocalítico', 2013, 75, 'Em andamento', 'Anime', '../img/temas/attackontitan.png'),
(41, 'Berserk (2016)', 'A história segue Guts como o \"Espadachim Negro\", uma aparição que foi brevemente vista no primeiro episódio da série de televisão de 1997, bem como na cena final dos filmes do Arco da Era de Ouro.\r\nGuts já foi um mercenário errante capturado pelo grupo de mercenários conhecido como Bando do Falcão (鷹の団, Taka no Dan) e ele lutou ao lado deles antes que seu líder mutilado, Griffith, sacrificasse seus seguidores para se tornar um dos Mão de Deus. e continuar seu sonho de governar um reino próprio. Apenas Guts e sua amante Casca, que perderam a sanidade e a memória com os horrores que viu e suportou, escaparam do ritual \"Eclipse\". No entanto, eles foram marcados com marcas que atraem espíritos malignos, inquietos e outras entidades semelhantes. Com Casca sob os cuidados do ferreiro Godo e sua filha adotiva Erica, bem como Rickert, o único membro dos Hawks ausente durante o Eclipse, Guts partiu para caçar os Apóstolos da Mão de Deus para encontrar e matar Griffith em busca de vingança. Anos se passaram e Guts é acompanhado em sua caçada por um elfo chamado Puck, pois os eventos que a Mão de Deus há muito esperava estão começando a se desenrolar.', 'Ação, Aventura, Demônios, Drama, Horror', 2016, 24, 'Finalizado', 'Anime', '../img/temas/berserk.png'),
(42, 'Black Clover', 'Asta e Yuno são órfãos que foram criados juntos numa igreja localizada no interior do reino de Clover. Nesse mundo todos possuem poder mágico (魔力 Maryoku?), nome dado à energia sobrenatural conhecida como mana quando esta habita um ser vivo. No entanto Asta nasceu sem mana. Em contrapartida, Yuno nasceu como grande poder mágico. Aos 5 anos de idade, os dois fazem um juramento entre si, visto no capítulo 1, em que eles competiriam para ver quem se tornaria o Rei Mago, o líder militar do Reino. Assim, desde essa idade, ambos treinam dia após dia, Asta aprimorando seus músculos, que eram sua única arma, e Yuno treinando sua Magia de Vento e seu controle mágico. A história acompanha os dois garotos que competem entre si para se tornar o Rei Mago, o cavaleiro mágico mais forte do reino de Clover. Mesmo sem magia, Asta tenta ser um cavaleiro mágico, assim sua jornada começa quando obtém o misterioso poder \"antimagia\", que pode anular qualquer magia na obra. Assim, Asta, com sua antimagia e força física, e Yuno, com seus grandes poderes mágicos, talento natural e treinamento, começam a jornada.', 'Ação, Aventura, Fantasia, Comédia, Shounen', 2017, 170, 'Finalizado', 'Anime', '../img/temas/blackclover.png'),
(43, 'Chainsaw Man', 'A história se passa num mundo onde os demônios nascem dos medos humanos. Embora sejam geralmente perigosos e malévolos, os humanos podem firmar contratos com demônios para usar uma parte de seu poder. Denji é um jovem deprimido que está tentando pagar a dívida de seu falecido pai com a yakuza vendendo vários de seus órgãos e trabalhando como caçador de demônios. Denji também possui um demônio cachorro chamado Pochita, que se assemelha a uma motosserra e auxilia Denji em seu trabalho. Denji é incumbido pela Yakuza de matar um demônio, mas descobre uma trama da yakuza para deixar o demônio matá-lo em troca de sua ajuda. Denji é morto e Pochita gravemente ferido, mas os dois já haviam feito um acordo que permite a Pochita fundir-se com Denji, revivendo-o como um híbrido humano-demônio com a habilidade de serra elétrica de Pochita. Denji mata o demônio que o matou e é abordado por uma equipe de caçadores de demônios do governo. Como agora se tornou parcialmente um demônio, um dos membros da equipe, Makima, convence Denji a tornar-se parte de sua organização de caçadores de demônios para evitar ser caçado por eles.', 'Ação, Fantasia sombria, Comédia de terror', 2022, 12, 'Finalizado', 'Anime', '../img/temas/chainsawman.jpg'),
(44, 'Dragon Ball Super', 'Algum tempo depois da derrota de Majin Boo, a paz finalmente regressou à Terra. Son Goku estabeleceu-se e, por exigência de Chi-Chi, trabalha agora como fazendeiro, para sustentar e apoiar a sua família. Sua família e amigos vivem agora vidas pacíficas.[20] No entanto, surge uma nova ameaça sob a forma de Bills, o Deus da Destruição, considerado a mais terrível e perigosa divindade no Universo 7. Após despertar de um longo sono de vários anos, Bills está ansioso para encontrar e lutar com um lendário guerreiro, que ele vira num sonho profético conhecido como o Deus Super Saiyajin (超スーパーサイヤ人ゴッド Sūpā Saiya-jin Goddo?).[21] Para proteger a Terra, Son Goku transforma-se no Deus Super Saiyajin para lutar com Bills. Apesar de perder, os seus esforços apaziguam o Deus da Destruição, de tal maneira que ele decide poupar o planeta.', 'Ação, Artes marciais, Comédia, Shounen', 2015, 131, 'Finalizado', 'Anime', '../img/temas/Dragon_Ball_Super_Key_visual.jpg'),
(45, 'Dragon Ball Kai', 'Cinco anos se passaram desde a vitória de Goku sobre Piccolo. Ele agora está casado com Chichi e possui um filho de quatro anos chamado Gohan.[7] Entretanto, a paz é quebrada quando Raditz, o irmão mais velho de Goku chega a Terra. Ele veio buscar Goku e revela seu verdadeiro nome, Kakarotto, e que ele pertence a uma raça agressiva e poderosa chamada Saiyajin, além de que ele foi mandado para a Terra para que preparasse o planeta para ser vendido, mas perdeu a memória e o instinto Saiyajin num acidente na sua infância. Raditz então rapta Gohan para tentar fazer Goku voltar ao seu \"normal\", obrigando Goku e Piccolo a aliarem-se para derrotá-lo. Contudo, Raditz era mais poderoso que os dois juntos e Goku sacrifica a sua vida para matá-lo. Pouco antes de morrer, Raditz chama dois companheiros Saiyajins, o Príncipe Vegeta e seu antigo tutor, Nappa. No Outro Mundo, Goku é levado para treinar com o Senhor Kaioh, um dos quatro deuses que protegem as suas respectivas galáxias. Nesse tempo, Goku aprende as duas técnicas supremas do Kaioh do Norte, o Kaioh Ken, e a Genki Dama. Na Terra, Gohan é treinado por Piccolo, ao mesmo tempo que Kuririn, Tenshin Han, Yamcha e Chaos se preparam para a chegada dos Saiyajins.\r\nUm ano depois, Vegeta e Nappa chegam a Terra e revelam ter conhecimento das Esferas do Dragão. Os dois pretendiam derrotar \"aquele que matou Raditz\" e depois procurá-las. Ao encontrarem os recém formados Guerreiros Z, Nappa planta pequenos monstros chamados Saibaimans. Apesar de fracos, um deles consegue matar Yamcha. Nappa então começa a verdadeira luta, obrigando Chaos e Tenshin Han a usarem todas as suas energias, causando a morte de ambos. Enquanto isso, Goku termina o seu treino e inicia o seu regresso à Terra. Entediado, Vegeta obriga Nappa a esperar três horas até que Goku volte. Após esse tempo, Nappa ataca Gohan, mas Piccolo sacrifica a sua vida para salvá-lo. Por ser sua contraparte, Kami Sama também é morto. Minutos após isso, Goku chega e derrota Nappa com o Kaioh Ken. Inicia-se então a luta entre Goku e Vegeta, onde nem mesmo o Kaioh Ken ou a Genki Dama conseguiram derrotar o príncipe dos Saiyajins. Durante a batalha, Vegeta cria uma lua artificial e transforma-se em Oozaru (macaco gigante), mas a sua cauda é cortada por Yajirobe, que observava a luta de longe. No fim do combate, Gohan vê a lua artificial e também se transforma em Oozaru, derrotando Vegeta. Contudo, Goku permitiu que Vegeta continuasse vivo, não querendo ver um adversário tão forte desse jeito, mas prometendo derrotá-lo depois com técnicas mais fortes.', 'Ação, Artes marciais, Comédia, Shounen', 2009, 167, 'Finalizado', 'Anime', '../img/temas/dragonballkai.png'),
(46, 'Dragon Ball GT', 'A história começa 5 anos após o 28º Torneio de Artes Marciais. Dragon Ball GT começa quando Pilaf e seus capangas conseguem encontrar misteriosas \"esferas do dragão negras\" escondidas em uma sala do templo de Kami-Sama e por acidente transformam Son Goku em uma criança novamente, depois de um desejo feito por Pilaf ao Shenlong Vermelho. Pouco tempo depois, as esferas do dragão se espalham por todo o universo e devem ser coletadas em menos de um ano ou o planeta onde o desejo foi solicitado, neste caso Terra, vai explodir.\r\nSon Goku, Son Goten e Trunks decidem embarcar na busca de \"esferas de dragão de estrelas negras\" para encontrá-las o mais rápido possível. No entanto, no último momento antes de sair, Pan, neta de Son Goku e filha de Son Gohan e Videl, entra na nave e substituí seu tio Goten e embarca na viagem com seu avô e Trunks.', 'Ação, Artes marciais, Comédia, Shounen', 1996, 64, 'Finalizado', 'Anime', '../img/temas/dragonballgt.png'),
(47, 'Dragon Ball Z', 'O irmão de Son Goku (protagonista da série Dragon Ball) aparece na Terra e lhe informa que sua família pertence a outro planeta. Goku foi enviado ainda bebê para a Terra com o intuito de conquistá-la. Ao ser relembrado de sua missão, Goku recusa-se a ajudar seu irmão e os Sayajins. Raça após raça de alien passa a aparecer na Terra e Goku, aliado a seu filho, seu compatriota Vegeta e os amigos que conquistou em sua primeira jornada atrás das esferas do dragão, vai fazer o que puder para manter nosso planeta a salvo.', 'Ação, Artes marciais, Comédia, Shounen', 1989, 291, 'Finalizado', 'Anime', '../img/temas/dragonballz.png'),
(48, 'Dr. Stone', 'Taiju, um típico estudante japonês, diz a seu amigo Senku, que ama a ciência, que ele está finalmente prestes a confessar a Yuzuriha, com quem ele esteve secretamente apaixonado por cinco anos. Encontrando-se debaixo de uma árvore de cânfora nos terrenos da escola, assim como Taiju está prestes a confessar, uma luz brilhante aparece no céu. Taiju empurra Yuzuriha para a árvore para protegê-la, mas a luz de repente petrifica toda a humanidade, com todos os humanos na Terra se transformando em pedra. A maioria dos humanos começa a perder sua consciência enquanto todos os vestígios de civilização decaem, mas Taiju continua vivo enquanto os anos progridem por sua motivação de libertar a si mesmo e a Yuzuriha. Eventualmente, Taiju se liberta da pedra e encontra uma mensagem esculpida na árvore que o leva a descobrir que Senku também escapou da pedra, mantendo sua consciência viva contando há quanto tempo ele foi petrificado. Assim, Taiju descobre que a data é agora 5 de outubro de 5738.\r\nJuntos, Taiju e Senku começam a reconstruir a civilização usando o conhecimento científico de Senku. Eles criam nital ; um solvente corrosivo que destrói o revestimento de pedra nas pessoas.Cap. Inicialmente, eles planejam libertar Yuzuriha, mas quando os dois são atacados por leões que escaparam de zoológicos e se reproduziram no Japão ao longo dos séculos, eles libertam alguém que Taiju reconhece como Tsukasa Shishio, \"O mais Forte Primata do Ensino Fundamental\", que utiliza-se de sua força para matar os leões.\r\nMais tarde eles fazem mais nital para libertar Yuzuriha, mas Senku descobre que durante a infância de Tsukasa, Shishio foi brutalmente espancado por um adulto enquanto ele estava colecionando conchas para sua irmã passando por cirurgia; devido ao homem que acreditava que ele tinha os direitos de pesca para a região, Tsukasa estava roubando as conchas do mar. Assim, dando a Tsukasa uma mentalidade de que somente as \"pessoas de coração puro e jovem\" deveriam ser revividas, e assim Tsukasa começa a destruir os adultos petrificados.Cap.  Assim, formam-se dois clãs rivais: o Reino da Ciência de Senku e o Império do Poder de Tsukasa.', 'Aventura, Ficção científica, Pós-apocalíptico, Shounen', 2019, 24, 'Finalizado', 'Anime', '../img/temas/drstone.png'),
(49, 'Naruto', 'Naruto Uzumaki, é um jovem ninja que busca se tornar o líder de sua vila, chamado Hokage.\r\nNaruto enfrenta muitos desafios ao longo de sua jornada. Ele carrega uma criatura poderosa chamada de Raposa de Nove Caudas selada dentro dele, o que o torna um \"jinchuuriki\". No entanto, essa criatura é temida e Naruto é ostracizado pela comunidade por causa disso.\r\nDeterminado a provar seu valor e superar as adversidades, Naruto se esforça para se tornar um ninja habilidoso. Ele estuda na Academia Ninja e é colocado em uma equipe com outros jovens ninjas: Sakura Haruno e Sasuke Uchiha, sob a orientação do sensei Kakashi Hatake.\r\nAo longo de sua jornada, Naruto e seus amigos enfrentam inimigos poderosos, participam de missões perigosas e desvendam segredos sobre o passado do mundo ninja. Eles também lidam com questões de amizade, lealdade, superação pessoal e proteção daqueles que amam.\r\nA história de Naruto é marcada por batalhas emocionantes, momentos de crescimento e desenvolvimento dos personagens. Naruto enfrenta desafios físicos e emocionais, aprendendo importantes lições ao longo do caminho. Ele busca se tornar uma figura respeitada em sua vila, enquanto tenta salvar seu amigo Sasuke, que se perdeu no caminho e se juntou a um caminho obscuro.', 'Shounen', 2002, 220, 'Finalizado', 'Anime', '../img/temas/naruto-dublado.jpg'),
(50, 'Demon Slayer', 'Ambientada no Japão durante o Período Taishō (1912-1926), a história gira ao entorno de Tanjirō Kamado, um garoto bondoso e inteligente que vive junto com sua mãe e seus irmãos, ganhando dinheiro vendendo carvão, assim como seu falecido pai. Certo dia, ao voltar para casa após ter ido a uma cidade vender carvão, Tanjiro descobre que toda sua família foi atacada por onis, sendo que uma de suas irmãs, Nezuko, é a única que sobreviveu ao ataque. Nezuko então passa a ser um oni, mas ela surpreendentemente ainda demonstra sinais de emoções e pensamentos humanos. Tanjirō decide então se tornar um caçador de onis, e com a ajuda de Nezuko, passa a sair em jornadas pelo Japão a fim de impedir que a mesma tragédia que afetou sua família aconteça com outras pessoas, enquanto que ele busca uma maneira de tornar Nezuko humana novamente.', 'Ação, Aventura, Fantasia, Luta', 2019, 26, 'Finalizado', 'Anime', '../img/temas/kimetsu_6jp8.jpg'),
(51, ' Lookism', 'Em uma sociedade onde aparência significa tudo, Park Hyumg Suk, pequeno, gordo e não atraente, sofre bullying diariamente, mas nunca falou a sua mãe super trabalhadeira sobre isso. Um dia, quando sua mãe o vê sofrendo bullying, ela o envia para uma escola melhor. Mas infelizmente, ele descobre que sua nova escola é tão cruel quanto a anterior. Uma noite, ele acorda e descobre que de repente ficou alto, forte e incrivelmente bonito. Quando volta para a cama e encontra o seu corpo antigo corpo dormindo. Ele agora tem uma mente e dois corpos. Toda vez que um dorme, o outro corpo acorda, e toda vez que um acorda o outro dorme. Com medo de sofrer bullying novamente na nova escola, ele decide usar o seu novo corpo para ir à escola. Mas como será isso? Será que ele finalmente será aceito?', 'Ação, Comédia, Drama, Ecchi, Escolar, Sobrenatural', 2014, 452, 'Em andamento', 'Webtoon', '../img/temas/lookism.png'),
(52, 'Operation Name Pure Love', 'Eu testemunhei meu namorado e minha melhor amiga se beijando. Estou confusa… há uma quantidade fixa de amor que cada pessoa receberá em sua vida? E a quantidade de amor que posso receber é “0”??? Su-Ae está tentando mudar seu destino, e Eun-Hyuk, que está preso em tal plano, entrou de cabeça! Eu estava apenas tentando fingir estar tendo um caso para fazer ciúmes no meu namorado, mas estou realmente me envolvendo?! Este plano… vai funcionar?', 'Drama, Escolar, Romance', 2022, 65, 'Em andamento', 'Webtoon', '../img/temas/202205202212206776.jpg'),
(53, 'Remarried Empress', 'Navier era a imperatriz perfeita, no entanto, o imperador queria uma esposa, não um colega. E assim, o imperador abandonou a imperatriz Navier e colocou um escravo garota ao lado dele. Isso foi bom, até Navier ouvir o Imperador prometer à garota escrava a posição da Imperatriz. Depois de muita agonia, Navier decidiu que se casaria novamente com o imperador do país vizinho.', ' Drama, Fantasia, Histórico, Romance', 2019, 136, 'Em andamento', 'Webtoon', '../img/temas/thumbnail.png'),
(54, 'Hunter X Hunter', 'Gon pode ser um garoto do campo, mas tem grandes aspirações. Apesar dos protestos de sua tia Mito, Gon decide seguir os passos de seu pai e se tornar um caçador lendário. Os aspirantes a Hunter começam sua jornada em um navio agitado pela tempestade, onde Gon conhece Leorio e Kurapika, os únicos outros candidatos que não são devastados por ataques de enjoo. Tendo sobrevivido aos terrores do alto mar, Gon e seus companheiros agora precisam provar seu valor em uma variedade de testes para encontrar o indescritível Exam Hall. E quando eles chegarem lá, eles vão sair vivos...?', 'Artes marciais, Aventura, Fantasia', 1998, 400, 'Em andamento', 'Mangá', '../img/temas/hunter.jpg'),
(55, 'Slam Dunk', 'Hanamichi Sakuragi é um colegial delinquente de topete ruivo, cansado de tomar fora das garotas que preferem os esportistas! Mas a sua vida começa a mudar quando se apaixona por Haruko, que o convida a jogar basquete no time da escola! Sakuragi consegue entrar no time, e agora irá encarar muitos desafios com a equipe do colégio Shohoku no campeonato nacional.', 'Comédia, Drama, Escolar, Esportes', 1990, 276, 'Finalizado', 'Mangá', '../img/temas/Slam_Dunk.jpg'),
(56, 'Cheese in the Trap', 'Ao voltar à faculdade depois de uma pausa de um ano, Hong Seol, uma estudante esforçada, sem querer acaba tendo problemas com um cara perfeito, o suspeito, Jung Yu. A partir disso, sua vida começa a ficar cheia de problemas e Seol tinha quase certeza de que tudo era culpa de Jung Yu. Então, por que de repente ele está sendo tão amigável um ano mais tarde?', 'Comédia, Drama, Romance', 2010, 300, 'Finalizado', 'Manhwa', '../img/temas/cheese.jpg'),
(57, 'Tower Of God', '“O que você deseja? Dinheiro e riqueza? Honra e orgulho? Autoridade e poder? Vingança? Ou algo que transcende a todos eles? O que quer que você deseje – isso está aqui.”\r\nBam, que ficou sozinho a vida inteira entrou na torre para perseguir sua única amiga, Rachel, mas como ele sobreviverá sem ter nenhuma força ou poder especial?', 'Ação, Aventura, Fantasia, Ficção', 2010, 550, 'Em andamento', 'Manhwa', '../img/temas/tower.jpg'),
(58, 'The God of High School', 'Enquanto uma ilha está quase desaparecendo da face da terra, uma organização misteriosa está enviando convites de um torneio para todos os lutadores habilidosos do mundo. Se você ganhar, poderá ter o que quiser. Eles estão recrutando apenas os melhores para lutar contra os melhores e reivindicar o título de The God of High School!', 'Ação, Aventura, Comédia, Fantasia', 2011, 560, 'Em andamento', 'Manhwa', '../img/temas/The_God_of_High_School.jpg'),
(59, 'Reverse Villain', 'Jung-Woo é a personificação do mal e tem como sonho um dia ser poderoso o bastante para conquistar todo o Murim, mas é impedido por Shin-Ryong, o seu arqui-inimigo. E, mais uma vez, Jung-Woo é vencido pelo seu nêmesis retornando ao ciclo de reencarnações na qual está preso. Na sua sexta reencarnação, Jung-Woo é enviado para os tempos modernos, onde ele decide se preparar da melhor forma possível para enfrentar o seu arqui-inimigo e não ser derrotado mais uma vez.', 'Ação, Comédia, Harem, Isekai', 2019, 110, 'Finalizado', 'Manhwa', '../img/temas/thumbnail.jpg'),
(60, 'Omniscient Reader', '“Esse é um desenrolar que eu já conheço”. No momento em que pensei isso, o mundo foi destruído e um novo universo surgiu. A nova vida de um leitor comum começa no mundo de uma novel, a novel que só ele terminou.', 'Aventura, Drama, Fantasia, Psicológico, Sobrenatural', 2020, 161, 'Em andamento', 'Manhwa', '../img/temas/capa1.jpg'),
(61, 'Fights Break Sphere', 'Em uma terra onde não há magia, uma terra onde os fortes fazem as leis e os fracos tem que obedecer, uma terra cheia de tesouros fascinantes e de uma beleza indescritível, mas que também está preenchida com perigos inimagináveis. Xiao Yan, que mostrou ter um talento nunca visto em décadas, de repente perdeu tudo há 3 anos – seus poderes, ', 'Ação, Sobrenatural, Romance, Comédia', 2018, 400, 'Em andamento', 'Manhua', '../img/temas/fights-break-sphere-manhua.jpg'),
(62, 'Feng Qi Cang Lan', 'XiaoWan, o melhor jogador do jogo de realidade virtual Cang Lan, é empurrado de um penhasco por um desgraçado do mal. Em vez de morrer, ela acaba em outro mundo onde as artes marciais e a essência espiritual determinam o destino de alguém. XiaoWan, que foi considerado inútil por todas as pessoas neste mundo, não levará seu destino como é! Ela será capaz de se tornar a melhor do mundo também? Vamos ver!', ' Fantasia, Romance, Sobrenatural', 2013, 330, 'Em andamento', 'Manhua', '../img/temas/feng-qi-cang-lan.jpg'),
(63, 'I Am Han Sanqian', 'Já faz 3 anos desde que Han Sanqian entrou pra família Zuo Su e foi taxado pelos seus membros como um genro lixo. Para evitar que sua esposa Su Yingxia seja humilhada pelos outros, Han Sanqian trabalhou em segredo para se tornar um super genro e se preparar para devolver na mesma moeda o que fizeram com sua esposa.', 'Drama, Romance, Shounen, Sobrenatural', 2020, 115, 'Em andamento', 'Manhua', '../img/temas/5fe640c1109ce_capa.jpg'),
(64, 'Revenge of a Fierce Princess', 'Ela era poderosa e tinha artes marciais incomparáveis em sua vida anterior, mas foi violada e difamada e isso resultou em sua morte. Depois do seu renascimento, prometeu se vingar...', 'Ação, Drama, Fantasia, Histórico, Romance', 2018, 181, 'Em andamento', 'Manhua', '../img/temas/external_cover.jpg'),
(65, 'Eternal Club', 'Chen Li passou seu tempo trabalhando na Cidade Mo, vagabundeando, sem nenhuma esperança à vista… Ele queria mudar, e se tornar um grande sucesso, ter dinheiro, ter poder, ter mulheres, mas… ele era apenas uma pessoa medíocre! Numa noite chuvosa, Chen Li adquire uma habilidade especial, ele podia comprar e vender “vida útil”, das pessoas. Ele podia realizar parcialmente “aceleração e desaceleração do tempo”! Assim, Chen Li se propôs a mudar seu destino contra as probabilidades, rumo ao trono soberano dos céus, e a construir o “Eternal Club”!', 'Ação, Drama, Fantasia, Sobrenatural', 2021, 191, 'Em andamento', 'Manhua', '../img/temas/EternalClubIcon.jpg');
INSERT INTO `tema` (`idtema`, `nome`, `sinopse`, `genero`, `ano_estreia`, `quantidade`, `estado`, `tipotema`, `fototema`) VALUES
(66, 'Martial Peak', 'A jornada para o Pico Marcial é algo longo e solitário. Indo de encontro com a adversidade, você deve sobreviver e permanecer vivo. Apenas aqueles que superarem os limites continuarão a jornada rumo ao objetivo de se tornar o mais forte. A Sky Tower testa seus discípulos de maneiras bem complexas para esta jornada. Um dia, o menosprezado Yang Kai conseguiu obter um livro negro, fazendo-o tomar rumo ao pico do mundo marcial!', ' Ação, Aventura, Comédia, Fantasia, Histórico, Romance', 2020, 2024, 'Em andamento', 'Manhua', '../img/temas/martial-peak-ch-1-6.jpg'),
(67, 'Grandmaster of Demonic Cultivation: Mo Dao Zu Shi', 'Temido e odiado por suas habilidades sinistras, Wei Wuxian - o grande mestre do cultivo demoníaco - foi levado à morte quando os clãs mais poderosos se uniram para destruí-lo.\r\n\r\nTreze anos depois, Wei Wuxian renasce. Convocado por um jovem que sacrificou sua alma em um ritual proibido, Wei Wuxian agora é obrigado a buscar vingança em nome do estranho ou arriscar a destruição de sua própria alma. Mas quando uma entidade maligna surge, um rosto familiar do passado de Wei Wuxian aparece repentinamente em meio ao caos - um poderoso cultivador que ajudará a iluminar as verdades sombrias que os cercam.', 'Xianxia, Mistério, Fantasia, Yaoi', 2016, 126, 'Finalizado', 'Manhua', '../img/temas/51+msxH4qWL._SX353_BO1,204,203,200_.jpg'),
(68, 'Heaven Official’s Blessing', 'Por você, eu me tornarei invencível! \"Você ouviu? Aquele lixo de Oficial dos Céus está tendo um caso com o maioral número um do Reino Fantasma!\" Xie Lian era o Príncipe da Coroa do reino de Xian Le; amado pelos cidadãos e o queridinho do mundo. Sem surpresa, ele ascendeu para os céus em uma idade muito jovem, porém quem diria que depois de sua ascensão, aquele que uma vez foi adorado por milhões e conhecido e admirado por todos, cairia tão abruptamente, completamente desonrado, se tornando a Chacota dos Três Reinos. Oitocentos anos após sua queda, Xie Lian ascendeu novamente e tumultuosamente. Desta vez, ele era um deus sem qualquer devoto ou mérito. Parece que com o tumulto de sua re-ascensão, ele chamou atenção de um temido Rei Fantasma, o maioral que controlava todos os fantasmas e o mais temido pelos céus. Mas por que um mero deus falido atrairia a atenção de alguém como um famoso e temido Rei Fantasma?', '  Ação, Comédia, Drama, Fantasia, Mistério, Romance, Yaoi', 2019, 89, 'Em andamento', 'Manhua', '../img/temas/817zhtRO6JL._AC_UF1000,1000_QL80_.jpg'),
(69, 'Song of the Long March', 'Pouco depois de a astrologia prever que a destruição cairá sobre a Dinastia Tang, um golpe de estado liderado pelo próprio irmão do príncipe herdeiro Li o mata, sua esposa e filhos. A filha de Li, a princesa Yongning, consegue escapar, mas logo é declarada morta ao lado de sua família. Cheia de ira, a princesa jura vingá-los ao assumir a identidade de um jovem, Li Chang Ge, e se mudar para a província de Shou para alcançar seus objetivos.\r\n\r\nLi Chang Ge usa sua inteligência para ganhar a confiança do imperador Shou e rapidamente sobe na hierarquia militar como uma estrategista brilhante. Desenhado de forma cativante, Canção da Longa Marcha retrata a jornada adolescente da menina mal-humorada em direção a inúmeras aventuras desconhecidas, camaradagem fiel, bem como inimizade formidável que a espera ao longo do caminho.', 'Ação, Aventura, Drama, Histórico', 2011, 53, 'Em andamento', 'Manhua', '../img/temas/choukakou-v01-001.jpg'),
(70, 'Of all things, I Became a Crow', 'Depois de morrer em um acidente, ela reencarnou em um jogo do gênero otome... Como um corvo! Não acredito que sou um corvo! Nem pra eu ser uma figurante! Quando eu estava observando a primeira pessoa que apareceu para mim... Era o príncipe herdeiro. \"Como você pode ser tão amável, Reinel?\" Cawk, cawk caek (Me leve contigo e me crie!)\" O príncipe herdeiro, Kamut, me deu um nome e me tratou com carinho. Eu sou um corvo, afinal. Não vai ter problema se eu tratá-lo com amor ou se meu coração se revira por ele. Não tinha problema até... \"Olá, Reinel?\" \"O que aconteceu de repente comigo?\"', ' Fantasia, Romance, Sobrenatural', 2022, 89, 'Em andamento', 'Webtoon', '../img/temas/corvo.jpg'),
(71, 'Olgami', 'Chaeah, uma motorista de táxi, uma vez viu seu conhecido da igreja Park Yoonsoo andando pelas ruas da cidade com uma mulher, mas ela não tinha ideia de que isso levaria ao enterro de evidências de assassinato, perseguição e uma mudança total em seu estilo de vida diário.', 'Fantasia, Mistério, Romance, Vampiros', 2019, 167, 'Em andamento', 'Webtoon', '../img/temas/olgami.jpeg'),
(72, 'The Way to Protect the Female Lead\'s Older Brother', 'Eu acidentalmente possui alguém em uma novel de harém reverso +19.\r\nO problema é que eu me tornei Roxana Agriche, a irmã mais nova do sub-vilão. Meu maldito pai sequestrou o irmão da heroína.\r\nAgora, a única coisa que me resta é encontrar um final terrível da vingança da heroína?\r\nMas e se eu puder evitar esse acontecimento?\r\n“Eu também estou interessada nesse brinquedo.”\r\n“Eu vou protegê-lo até que possa sair daqui a salvo.”\r\nO irmão da heroína, Cassis Pedalian, vai definitivamente conseguir me retribuir depois.', 'Drama, Isekai, Magia, Psicológico, Romance', 2021, 43, 'Em andamento', 'Webtoon', '../img/temas/roxana.jpg'),
(73, '7Fates: Chakho', 'Na cidade corrupta Sin-si, Zeha subitamente acorda em um hospital, incapaz de se lembrar do que aconteceu depois de falar com um homem misterioso à noite. Ele logo aprende que seres estranhos chamado beom estão causando pânico e destruição na cidade. O destino uniu esses sete garotos, mas serão eles capazes de acabar, de uma vez por todas, com essa luta? Que a caçada comece!', ' Ação, Drama, Fantasia, Sobrenatural', 2022, 52, 'Finalizado', 'Webtoon', '../img/temas/7fates.jpg'),
(74, 'Eternals: The 500 Year War', 'De uma equipe internacional de escritores e artistas estelares vem Eternals: The 500 Year War. Nesta série original de 7 capitulos, os Eternos relembram suas batalhas contra os Desviantes. Testemunhe suas interações com diferentes culturas da raça humana ao longo do tempo! Descubra quais artefatos culturais eles receberam como presentes para proteger a humanidade. A batalha pela sobrevivência do planeta dura séculos!', 'Ação, Aventura, Super Herois', 2022, 7, 'Finalizado', 'Webtoon', '../img/temas/etrnls500yrwarinfc001_icon.jpg'),
(75, 'Frostbond', 'Juan pode ver fantasmas, é um dom que o atormenta e ele se tornou reservado e distante. Porém, após ser enviado para a cidade de Midwinter, ele fará um amigo melhor: Ken. Este o ajudará a ter uma nova perspectiva de vida, mas logo descobrirão um pequeno detalhe: Ken está morto há mais de 20 anos. Quais serão os segredos por trás de sua misteriosa morte? Cuidado, nada é o que parece.', 'Drama, Fantasma, Mistério', 2021, 49, 'Em andamento', 'Webtoon', '../img/temas/0FrostbondLaunch_mobile_landingpage.jpg'),
(76, 'Marry My Husband', 'Jiwon morre de forma terrivelmente injusta devido à violência de seu marido, que a estava traindo com sua melhor amiga. Mas um milagre ocorre e Jiwon acorda 10 anos atrás, quando ainda não era casado. Então, ele coloca seu plano de vingança em ação. E agora ela não vai parar até conseguir que sua melhor amiga se case com seu marido!', 'Drama, Fantasia, Psicológico, Romance', 2021, 68, 'Finalizado', 'Webtoon', '../img/temas/jiwon.jpg'),
(77, 'Finding Camellia', 'A linda menina que virou menino. Camellia tinha apenas 12 anos quando a separaram da mãe nos subúrbios e a obrigaram a viver como filho de uma família aristocrática. Mas sob as camadas de segredos e mentiras, nunca esquece. Ela continua a lutar para voltar a ser o seu verdadeiro eu, para recuperar a vida de Camellia…', ' Drama, Histórico, Romance', 2021, 75, 'Em andamento', 'Webtoon', '../img/temas/camelia.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `estado`, `cidade`, `genero`, `perfil`, `telefone`, `foto`, `nascimento`, `situacaoUsuario`) VALUES
(7, 'Daniel Souza de Lima', 'danielsouzalimabsb@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Samambaia Sul', 'M', 'A', '61986175242', '../img/usuarios/3e69b9aa-0fc7-4d11-b79b-a879f3e8049d.jpeg', '2005-05-19', 1),
(13, 'Janaina', 'janaina@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Ceilandia', 'F', 'M', '61986456251', '../img/usuarios/user.png', '2023-05-17', 1),
(14, 'Helen Eloísia', 'helen@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Ceilandia', 'F', 'M', '(61) 98617-5242', '../img/usuarios/user.png', '2005-01-31', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idavaliacao`);

--
-- Índices de tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`);

--
-- Índices de tabela `comunidade`
--
ALTER TABLE `comunidade`
  ADD PRIMARY KEY (`idcomunidade`);

--
-- Índices de tabela `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`iddenuncia`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idmensagem`);

--
-- Índices de tabela `moderador`
--
ALTER TABLE `moderador`
  ADD PRIMARY KEY (`idmoderador`);

--
-- Índices de tabela `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`idtema`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idavaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `comunidade`
--
ALTER TABLE `comunidade`
  MODIFY `idcomunidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `iddenuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idmensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `moderador`
--
ALTER TABLE `moderador`
  MODIFY `idmoderador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tema`
--
ALTER TABLE `tema`
  MODIFY `idtema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
