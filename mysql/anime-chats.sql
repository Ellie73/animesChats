-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2023 às 21:56
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
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idavaliacao` int(11) NOT NULL,
  `idavaliador` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `nota` int(1) NOT NULL,
  `idtema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacao`
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
(6, 2, 'Jogos'),
(7, 2, 'anime');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidade`
--

CREATE TABLE `comunidade` (
  `idcomunidade` int(11) NOT NULL,
  `idcriador` int(11) NOT NULL COMMENT 'foreign key',
  `nome` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `situacao` varchar(1) NOT NULL,
  `descricao` varchar(3000) NOT NULL,
  `idtema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comunidade`
--

INSERT INTO `comunidade` (`idcomunidade`, `idcriador`, `nome`, `foto`, `situacao`, `descricao`, `idtema`) VALUES
(2, 7, 'Fãs de Boruto', '../img/comunidades/trend-1.jpg', '1', 'Bem-vindo à nossa comunidade dedicada aos fãs de Boruto! Aqui você encontrará um espaço perfeito para se conectar com outros entusiastas do universo ninja e compartilhar sua paixão pelo mundo de Boruto.\r\n\r\nNossa comunidade é um local animado, repleto de discussões sobre o mangá, anime, personagens e teorias emocionantes. Junte-se a nós para explorar os eventos da nova geração de ninjas em Konoha, liderada por Boruto Uzumaki, filho do lendário Naruto.\r\n\r\nCompartilhe suas opiniões sobre as reviravoltas da trama, as habilidades únicas dos personagens e as conexões com a série predecessora, Naruto. Troque ideias sobre os arcos narrativos, lutas épicas, desenvolvimento dos personagens e a evolução do universo ninja como um todo.\r\n\r\nAlém disso, aqui você encontrará informações atualizadas sobre lançamentos de episódios, capítulos do mangá, notícias e eventos relacionados a Boruto. Fique por dentro de todas as novidades e esteja preparado para participar de conversas emocionantes e teorias envolventes.\r\n\r\nNossa comunidade valoriza o respeito e a diversidade de opiniões, proporcionando um ambiente acolhedor para todos os fãs. Todos são bem-vindos para expressar sua paixão por Boruto, compartilhar suas teorias, criar fanarts, cosplays e interagir com outros membros.\r\n\r\nEstamos entusiasmados por tê-lo aqui! Junte-se à nossa comunidade de fãs de Boruto e mergulhe em um mundo repleto de aventura, emoção e camaradagem ninja.', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

CREATE TABLE `denuncia` (
  `iddenuncia` int(11) NOT NULL,
  `iddenunciante` int(11) NOT NULL,
  `ocorrencia` varchar(3000) NOT NULL,
  `contato` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `denuncia`
--

INSERT INTO `denuncia` (`iddenuncia`, `iddenunciante`, `ocorrencia`, `contato`) VALUES
(5, 7, 'Não gostei do comportamento de helen na comunidade fãs de boruto', 'danielsouzalimabsb@gmail.com');

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
(3, 14, 12, '15.92', '2022-05-28', 'C', 2147483647, 2147483647, 'Helen', '123', '2026-11-01', NULL),
(7, 13, 6, '17.91', '2023-06-10', 'P', NULL, NULL, NULL, NULL, '2023-06-11', NULL);

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
(26, 'Demon Slayer', 'O mangá conta a história de Tanjiro, o filho mais velho de uma família que é massacrada por um demônio e, a única sobrevivente do incidente foi umas das suas irmãs, que por causa do massacre acaba se transformando em um demônio. Então, o protagonista, Tanjiro, sai em uma jornada para tentar achar uma ”cura” para a sua irmã.', 'Ação, Aventura, Fantasia, Luta', 2016, 205, 'Finalizado', 'Mangá', '../img/temas/kimetsu_6jp8.jpg'),
(27, 'Suas Mentiras Eternas', 'Rosén Walker foi presa por assassinar o próprio marido aos 17 anos. Após destruir o orgulho do Exército Imperial ao fugir duas vezes da prisão, ela é capturada novamente um ano após sua última fuga e é sentenciada a prisão perpétua. Em um navio a caminho da Ilha Monte, onde apenas os piores prisioneiros são levados, outra fuga é planejada… “Qual é o seu crime?” “Sou inocente…” “É raro um prisioneiro admitir honestamente o crime que cometeu.” Ian Connor, um ideologista firme que está encarregado do transporte dela, não deixa nenhuma brecha. “Não diga nada inútil, apenas responda o que perguntei.” Rosén, a melhor do império em fugir de prisões, e Ian Connor, um jovem herói de guerra amado por todo o império. Suas histórias se desenrolam no navio a caminho da pior prisão do planeta! Agora você é o juiz: Rosén Walker é uma mentirosa? Ou não?', 'Shoujo, Drama, Fantasia, Romance', 2021, 66, 'Em andamento', 'Manhwa', '../img/temas/yel.jpg'),
(28, 'Bastard', '\"Tem um serial killer em minha casa.\" Bastard é uma série thriller que conta a história de um garoto e seu pai, que tem um relacionamento não de pai e filho, mas de assassino e cúmplice.', 'Psicológico, Drama, Mistério', 2015, 93, 'Finalizado', 'Manhwa', '../img/temas/205549.jpg'),
(29, 'Noblesse', 'Por 820 anos ele esteve adormecido sem o conhecimento do avanço e progresso científico da humanidade. A terra que uma vez ele conhecia se tornou um lugar desconhecido com nova tecnologia, atitudes e estilos de vida. Depois de despertar, Cadis Etrama Di Raizel (ou Rai), procura se familiarizar com esta área. Ele encontra seu leal servo, Frankenstein, que atualmente é o diretor de uma escola sul coreana. Rai decide que esta escola é o local perfeito para ajudá-lo a aprender sobre o mundo moderno. Se matricula e começa a se associar com um grupo de estudantes amigáveis a fim de se enturmar. Mas este novo mundo não é mais seguro do que o antigo, e o digno e inepto tecnologicamente Rai se encontra preso em aventuras tanto ridículas quanto perigosas.', 'Shounen, Aventura, Drama, Sobrenatural, ', 2007, 544, 'Finalizado', 'Manhwa', '../img/temas/1b33195fbe69f9cfbe74585e97ff6eb4.jpg'),
(30, 'The Beginning After The End', 'Rei Grey conquistou força, riquezas e prestígio sem iguais em um mundo governado pela habilidade marcial. Entretanto, a solidão acompanha de perto aqueles de grande poder. Por detrás da máscara de um glorioso e poderoso rei, reside a casca vazia de um homem destituído de propósito e vontade. Renascido em um novo mundo repleto de magia e monstros, o Rei Grey terá a chance de refazer sua vida. Corrigir os erros do passado não será seu único desafio, pois um perigo oculto cresce a cada instante, ameaçando destruir tudo que ele trabalhou para criar, o fazendo questionar a verdadeira razão de ter recebido uma nova vida…', 'Ação, Artes Marciais, Drama, Fantasia', 2020, 175, 'Em andamento', 'Manhwa', '../img/temas/the-beginning-after-the-end-novel-chapter-1-chapter-420.jpg'),
(31, 'Tomb Raider King', 'De repente, tumbas misteriosas começaram a aparecer em todo o mundo com artefatos especiais que concedem habilidades mágicas ao soldador. Logo a corrida entre os humanos para coletar os artefatos e pisar nos fracos como as baratas começaram.\r\n\r\nJoo Heon Suh, uma escavadeira, e explorador são traídos por seus companheiros que o deixaram morrer. Quase à beira da morte, ele é subitamente transportado 15 anos no passado enquanto retém suas memórias.', 'Ação, Aventura, Fantasia, Sobrenatural', 2020, 411, 'Em andamento', 'Manhwa', '../img/temas/Capturar4.JPG'),
(32, 'Second Life Ranker ', 'Cha Yeon Woo decidiu escalar uma torre misteriosa depois que seu irmão gêmeo é traído por seus companheiros e morto. Assim, para descobrir o mistério por trás da morte de seu irmão e vingar ele tenta escalar o Obelisco.\r\nÉ a torre de Deus Sol composta por 100 andares. Cada andar é governado por demônios e às vezes deuses. Jogadores de diferentes dimensões e universo lutam e sobem a torre para alcançar o ápice, pois diz-se que uma pessoa que conquistou esta torre se tornará o próprio Deus.', 'Ação, Aventura, Fantasia', 2019, 158, 'Em andamento', 'Manhwa', '../img/temas/Capturar5.JPG'),
(33, 'The Last Human', 'Zuo Tian Chen é o último humano vivo em uma cidade infestada de zumbis. Em seus momentos finais, ele acorda milagrosamente em sua sala de aula 10 anos no passado exatamente um dia antes da queda do meteoro que aniquilou a humanidade.\r\n\r\nMesmo sendo um adolescente fraco, com todo conhecimento que possui ele irá salvar as pessoas importantes que perdeu, e mudará seu destino.', 'Aventura, Terror, Drama, Apocalipse', 2018, 510, 'Em andamento', 'Manhua', '../img/temas/59820872.jpg'),
(34, 'Star Martial God Technique', 'No mundo existem 12 caminhos para subir a Torre de Deus, e contam as lendas que esse caminhos levam a lendária estrada da imortalidade. A fim de proteger sua família, Ye Xin He participa da prova seletiva da Academia Estrela Celestial.\r\n\r\nYe Xin He pertence a Família Pena Verde, uma ramificação da Família Lua Escura. Por serem vassalos costumam ser humilhados e passar necessidades na época de escassez. Por isso o jovem quer se tornar forte e ajudar sua família a prosperar. Sendo um raro usuário da técnica marcial da estrela, Ye Xin He apresenta grande potencial dentro da academia sendo aclamado como um gênio o que é muito bom para seu futuro. Mas também chama atenção de muitas pessoas mal intencionadas. ', 'Ação, Aventura, Sobrenatural, Romance', 2016, 607, 'Em andamento', 'Manhua', '../img/temas/Capturar6.JPG');

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
(13, 'Janaina', 'janaina@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Ceilandia', 'F', 'M', '61986456251', '../img/usuarios/user.png', '2023-05-17', 1),
(14, 'Helen Eloísia', 'helen@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 'Distrito Federal', 'Ceilandia', 'F', 'M', '(61) 98617-5242', '../img/usuarios/user.png', '2005-01-31', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idavaliacao`);

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
-- Índices para tabela `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`iddenuncia`);

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
  MODIFY `idtema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
