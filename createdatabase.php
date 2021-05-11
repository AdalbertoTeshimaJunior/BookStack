<?php

function create()
{
    $link = mysqli_connect("localhost", "root", "");
    $sql = "CREATE DATABASE bookstack";
    executarQuery($link, $sql);

    $link = mysqli_connect("localhost", "root", "", "bookstack");

    $sql = "CREATE TABLE `livro` (
    `codigo` int(3) NOT NULL,
    `titulo` varchar(100) DEFAULT NULL,
    `autor` varchar(100) DEFAULT NULL,
    `editora` varchar(50) DEFAULT NULL,
    `descricao` varchar(200) DEFAULT NULL,
    `genero` varchar(30) DEFAULT NULL,
    `publicacao` varchar(30) DEFAULT NULL,
    `paginas` int(4) DEFAULT NULL,
    `edicao` int(2) DEFAULT NULL,
    `dimensoes` varchar(20) DEFAULT NULL,
    `idioma` varchar(10) DEFAULT NULL,
    `preco` double(4,2) DEFAULT NULL,
    `imagem` varchar(100) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    executarQuery($link, $sql);

    $sql = "INSERT INTO `livro` (`codigo`, `titulo`, `autor`, `editora`, `descricao`, `genero`, `publicacao`, `paginas`, `edicao`, `dimensoes`, `idioma`, `preco`, `imagem`) VALUES
(1, 'AS VANTAGENS DE SER INVISÍVEL', 'Stephen Chbosky', 'Rocco Jovens Leitores', 'O LIVRO QUE INSPIROU O FILMENOVA EDIÇÃO COM TRECHO INÉDITO Manter-se à margem oferece uma única e passiva perspectiva. Mas, de uma hora para outra, sempre chega o momento de encarar a vida do centro d', 'Drama', '15 agosto 2020', 288, 2, '21.08 x 13.97 x 2.03', 'Português', 40.00, 'imagens/as_vantagens_de_ser_invisivel.jpg'),
(2, 'A DIVINA COMÉDIA', 'Dante Alighieri', 'Principis', 'A Divina Comédia é um poema clássico da literatura italiana e mundial com características épica e teológica, escrito por Dante Alighieri no século XIV período renascentista e dividido em três partes: ', 'Épico', '18 junho 2020', 720, 1, '23.2 x 16.2 x 4.6 cm', 'Português', 20.00, 'imagens/a_divina_comedia.jpg'),
(3, 'O CORTIÇO', 'Aluísio Azevedo', 'Principis', 'Pobreza, corrupção, injustiça, traição são elementos integram O cortiço, principal obra do Naturalismo brasileiro. Nela, Aluísio Azevedo denuncia as mazelas sociais enfrentadas pelos moradores de um c', 'Romance', '17 outubro 2019', 224, 3, '22.8 x 15.8 x 0.6 cm', 'Português', 11.80, 'imagens/o_cortico.jpg'),
(4, 'Mitologia Nórdica', 'Neil Gaiman', 'Intrínseca', 'Uma jornada da origem do universo até o fim do mundo.Quem, além de Neil Gaiman, poderia se tornar cúmplice dos deuses e usar de sua habilidade com as palavras para recontar as histórias dos mitos nórd', 'Mitologia', '13 março 2017', 288, 1, '21.6 x 14 x 2 cm', 'Português', 28.00, 'imagens/mitologia_nordica.jpg'),
(5, 'O Hobbit', 'J.R.R Tolkien', 'HarperCollins', 'Bilbo Bolseiro era um dos mais respeitáveis hobbits de todo o Condado até que, um dia, o mago Gandalf bate à sua porta. A partir de então, toda sua vida pacata e campestre soprando anéis de fumaça com', 'Fantasia', '15 julho 2019', 336, 1, '22.8 x 15.8 x 0.6 cm', 'Português', 30.00, 'imagens/o_hobbit.jpg'),
(6, 'O guia definitivo do Mochileiro das Galáxias', 'Douglas Adams', 'Arqueiro', 'Pela primeira vez, reunimos em um único volume os cinco livros da cultuada série O Mochileiro das Galáxias, de Douglas Adams. Com mais de 15 milhões de exemplares vendidos, a saga do britânico esquisi', 'Ficção', '05 maio 2016', 672, 1, '23.4 x 16.4 x 3.8 cm', 'Português', 69.90, 'imagens/guia_definitivo_do_mochileiro_das_galaxias.jpg'),
(7, 'A Guerra da Rainha Vermelha - Vol. 1', 'Mark Lawrence', 'Darkside', 'Mark Lawrence, um dos autores de fantasia mais consagrados dos últimos anos, expande seu universo fantástico com uma nova e instigante trilogia. A DarkSide Books tem o prazer de apresentar A GUERRA DA', 'Ficção', '03 novembro 2015', 420, 1, '23.4 x 16.2 x 3.2 cm', 'Português', 41.70, 'imagens/a_guerra_da_rainha_vermelha.jpg'),
(8, 'Box Percy Jackson e os Olimpianos', 'Rick Riordan', 'Intrínseca', 'Combinando mitologia grega e muita aventura, a saga do menino Percy Jackson, que aos 12 anos descobre que é um semideus, filho de Poseidon, tornou-se um fenômeno mundial. Foram mais de 15 milhões de l', 'Mitologia', '31 março 2015', 1816, 1, '21.6 x 13.6 x 9.6 cm', 'Português', 99.99, 'imagens/box_percy_jackson_e_os_olimpianos.jpg'),
(9, 'O vilarejo', 'Raphael Montes', 'Suma', 'lustrações coloridas dão vida a romance com elementos de horror gótico e suspense. Do criador da série original Netflix Bom dia, Verônica. Em 1589, o padre e demonologista Peter Binsfeld fez a ligação', 'Ficção', '14 agosto 2015', 96, 1, '22.8 x 15.4 x 0.8 cm', 'Português', 22.89, 'imagens/o_vilarejo.jpg'),
(10, 'Box Trilogia O Senhor dos Anéis', 'J.R.R Tolkien', 'HarperCollins', 'OApesar de ter sido publicado em três volumes – A Sociedade do Anel, As Duas Torres e O Retorno do Rei – desde os anos 1950, O Senhor dos Anéis não é exatamente uma trilogia, mas um único grande roman', 'Fantasia', '25 novembro 2019', 1568, 1, '22.2 x 14.4 x 10.4 c', 'Português', 99.99, 'imagens/box_senhor_dos_aneis.jpg'),
(11, 'Fahrenheit 451', 'Ray Bradbury', 'Biblioteca Azul', 'Guy Montag é um bombeiro. Sua profissão é atear fogo nos livros. Em um mundo onde as pessoas vivem em função das telas e a literatura está ameaçada de extinção, os livros são objetos proibidos, e seus', 'Ficção', '1 junho 2012', 216, 1, '20.8 x 13.8 x 1.4 cm', 'Português', 21.90, 'imagens/fahrenheit_451.jpg'),
(12, 'A dança do Universo', 'Marcelo Gleiser', 'Companhia de Bolso', 'O que aconteceu no momento da Criação? Houve um minuto determinado em que o Universo que nos rodeia surgiu? Essas são questões tão antigas como a própria humanidade. Muitos procuram a resposta nos mit', 'Ciência', '9 junho 2006', 416, 3, '17.8 x 12.4 x 2 cm', 'Português', 26.89, 'imagens/a-danca-do-universo.jpg'),
(13, '1984', 'George Orwell', 'Companhia das Letras', 'Winston, herói de 1984, último romance de George Orwell, vive aprisionado na engrenagem totalitária de uma sociedade completamente dominada pelo Estado, onde tudo é feito coletivamente, mas cada qual ', 'Ficção', '21 Julho 2009', 416, 1, '', 'Português', 21.99, 'imagens/1984.jpg'),
(14, 'Vivendo com as estrelas', 'Diulia de Mello', 'Panda Books', 'Depois de ouvir perguntas como “Para que serve a astronomia?”, “Como é o trabalho de um astrônomo?” de vários jovens nas palestras e em seu blog, Mulher das Estrelas, a astrônoma brasileira Duília de ', 'Ciência', '7 agosto 2009', 64, 1, '22.8 x 14.8 x 0.6 cm', 'Português', 20.00, 'imagens/vivendo-com-as-estrelas.jpg'),
(15, 'Cosmos', 'Carl Sagan', 'Companhia das Letras', 'Escrito por um dos maiores divulgadores de ciência do século XX, Cosmos retraça 14 bilhões de anos de evolução cósmica, explorando tópicos como a origem da vida, o cérebro humano, hieróglifos egípcios', 'Ciência', '6 novembro 2017', 560, 2, '21 x 13.6 x 3 cm', 'Português', 48.90, 'imagens/cosmos.jpg'),
(16, 'Astrofísica para Apressados', 'Neil deGrasse Tyson', 'Planetas', 'Quem nunca olhou para o céu numa noite estrelada e se perguntou: que lugar ocupo no espaço? O que tudo isso significa? Como funciona? Em Astrofísica para apressados, o aclamado astrofísico e pesquisad', 'Ciência', '31 agosto 2020', 192, 2, '21 x 13.6 x 1.4 cm', 'Português', 24.90, 'imagens/astrofisica-para-apressados.png'),
(17, 'A Simples beleza do inesperado', 'Marcelo Gleiser', 'Record', 'A simples beleza do inesperado é um tributo à natureza, um ensaio sobre a conexão entre o homem e o planeta Terra, e uma exploração do significado da existência – dos átomos ao cosmos, passando pelas ', 'Ciência', '28 outubro 2016', 196, 3, 'A 23 cm / L 15,6 cm ', 'Português', 29.89, 'imagens/a-simples-beleza-do-inesperado.jpg'),
(18, 'Humano Mais Humano', 'Brian Christian', 'Companhia das Letras', 'O humano mais humano é uma investigação abrangente e fascinante de como computadores estão nos fazendo repensar o papel da humanidade no século XXI. Brian Christian alinha os avanços da inteligência a', 'Ciência', '1 Março de 2013', 368, 1, '14.00 X 21.00 cm / 0', 'Português', 45.90, 'imagens/humanomaishumano.jpg'),
(19, 'Cidade dos Ossos - Vol.1', 'Cassandra Clare', 'Galera', 'Clary Fray, 15 anos, decide passar a noite em uma boate em Nova York. O maior de seus problemas provavelmente seria lidar com o truculento segurança da porta, certo? Errado. Clary testemunha um crime,', 'Infantojuvenil', '1 Janeiro 2016', 462, 51, '22.8 x 15.4 x 2.6 cm', 'Português', 31.90, 'imagens/CidadeDosOssos.jpg'),
(20, 'Cidade das Cinzas - Vol.2', 'Cassandra Clare', 'Galera', 'Nesta sequência de tirar o fôlego, Cassandra Clare atrai seus leitores de volta às garras sombrias do submundo de Nova York, onde o amor nunca é seguro e o poder se torna a tentação mais mortal. Clary', 'Infantojuvenil', '1 Janeiro 2014', 406, 20, '22.8 x 15.6 x 2.4 cm', 'Português', 31.90, 'imagens/CidadeDasCinzas.jpg'),
(21, 'Cidade de Vidro - Vol.3', 'Cassandra Clare', 'Galera', 'Nesse terceiro volume da inesquecível saga Os instrumentos mortais, o amor é um pecado mortal e os segredos do passado serão decisivos.Para salvar a vida de sua mãe, Clary deve viajar até a Cidade de ', 'Infantojuvenil', '1 Janeiro 2014', 476, 14, '22.8 x 15.2 x 3 cm', 'Português', 29.00, 'imagens/CidadeDosVidro.jpg'),
(22, 'Cidade dos Anjos Caídos - Vol.4', 'Cassandra Clare', 'Galera', 'O quarto volume da série Os Instrumentos Mortais, fenômeno mundial de vendas Amor. Sangue. Traição. Vingança. As apostas e os riscos são mais altos que nunca na Cidade dos Anjos Caídos. Neste imperdív', 'Infantojuvenil', '1 Janeiro 2014', 476, 13, '22.6 x 15.2 x 2 cm', 'Português', 34.00, 'imagens/CidadeDosAnjosCaidos.jpg'),
(23, 'Cidade das Almas Perdidas - Vol.5', 'Cassandra Clare', 'Galera', 'O quinto volume da série best-seller Os Instrumentos Mortais, de Cassandra Clare. Depois ser apresentada ao Mundo de Sombras e a Jace ― um Caçador que tem a aparência de um anjo, mas a língua tão afia', 'Infantojuvenil', '1 Janeiro 2014', 434, 7, '22.8 x 15.6 x 2.6 cm', 'Português', 37.90, 'imagens/CidadeAlmasPerdidas.png'),
(24, 'Cidade das Fogo Celestial - Vol.6', 'Cassandra Clare', 'Galera', 'O sexto volume da série best-seller Os Instrumentos Mortais, de Cassandra Clare, Caçador de Sombras contra Caçador de Sombras. Irmão contra irmã. Alianças quebradas. Morte, sangue, icor demoníaco. Seb', 'Infantojuvenil', '11 Junho 2014', 532, 18, '22.86 x 15.49 x 3.3 ', 'Português', 25.00, 'imagens/CidadeDoFogoCelestial.jpg'),
(25, 'Assassinato no Expresso do Oriente', 'Agatha Christie', 'HarperCollins', 'Em meio a uma viagem, Hercule Poirot é surpreendido por um telegrama solicitando seu retorno a Londres. Então, o famoso detetive belga embarca no Expresso do Oriente, que está inesperadamente cheio pa', 'Misterio', '9 março 2020', 240, 1, '21.4 x 14.2 x 2 cm', 'Português', 39.49, 'imagens/Expresso_Oriente.jpg'),
(26, 'Inferno', 'Dan Brown', 'Editora Arqueiro', 'Inferno é uma leitura eletrizante e um convite a pensarmos no papel da ciência para o futuro da humanidade. Autor de suspense mais popular da atualidade, com mais de 150 milhões de livros vendidos, Da', 'Misterio', '19 setembro 2016', 448, 2, '22.8 x 15.4 x 2.6 cm', 'Português', 14.20, 'imagens/Inferno.jpg'),
(27, 'O Símbolo Perdido', 'Dan Brown', 'Editora Arqueiro', 'Robert Langdon, o célebre simbologista de Harvard, é convidado por seu amigo e mentor Peter Solomon – eminente maçom e filantropo – a dar uma palestra no Capitólio dos Estados Unidos. Ao chegar lá, de', 'Misterio', '15 janeiro 2021', 640, 1, '20 x 13.4 x 4 cm', 'Português', 17.95, 'imagens/Simbolo_Perdido.jpg'),
(28, 'Morte no Nilo', 'Agatha Christie', 'Agatha Christie', 'A tranquilidade de um cruzeiro de luxo pelo Nilo chega ao fim quando o corpo de Linnet Doyle, uma bela e jovem milionária, é descoberto em sua cabine. Porém, para azar do autor do crime, o brilhante d', 'Misterio', '15 setembro 2020', 320, 1, '13.5 x 0.7 x 20.8 cm', 'Português', 26.90, 'imagens/Morte_Nilo.jpg'),
(29, 'A Garota do Lago', 'Charlie Donlea', 'Faro Editorial', 'Summit Lake, uma pequena cidade entre montanhas, é esse tipo de lugar, bucólico e com encantadoras casas dispostas à beira de um longo trecho de água intocada.Duas semanas atrás, a estudante de direit', 'Misterio', '1 janeiro 2017', 296, 1, '22.4 x 15.6 x 2.8 cm', 'Português', 8.30, 'imagens/Garota_Lago.jfif'),
(30, 'O Homem de Giz', 'C. J. TUDOR', 'Intrínseca', 'Em 1986, Eddie e os amigos passam a maior parte dos dias andando de bicicleta pela pacata vizinhança em busca de aventuras. Os desenhos a giz são seu código secreto: homenzinhos rabiscados no asfalto;', 'Misterio', '15 março 2018', 272, 1, '23.6 x 16 x 2 cm', 'Português', 32.79, 'imagens/Homem_Giz.jpg'),
(31, 'Eu sei o que você está pensando', 'John Verdon', 'Editora Arqueiro', 'De forma magistral,Verdon mantém seu protagonista sempre um passo à frente do leitor. E cria o tipo de mistério que faria Sherlock Holmes perder o sono.” - The New York Times Eu sei o que você está pe', 'Misterio', '15 julho 2011', 352, 1, '22.6 x 15.8 x 1.8 cm', 'Português', 49.90, 'imagens/Sei_Pensando.jpg'),
(32, '20 mil léguas submarinas', 'Jules Verne', 'Clássicos Zahar', 'Em 20 mil léguas submarinas, o leitor é transportado para 1866, ano em que navios de diferentes nacionalidades começam a naufragar e sofrer misteriosas avarias. As descrições revelam que um ser compri', 'Ficção', '14 novembro 2011', 456, 1, '23.6 x 16.4 x 3 cm', 'Português', 46.73, 'imagens/20mil_Leguas.jfif'),
(33, 'Viagem ao centro da Terra', 'Jules Verne', 'Clássicos Zahar', 'Em 1863 o renomado professor Otto Lidenbrock, geólogo e mineralogista, descobre uma mensagem cifrada descrevendo uma viagem ao centro da Terra. É o quanto basta para o impetuoso cientista se lançar na', 'Ficção', '14 abril 2016', 240, 1, '23.4 x 16.4 x 1.8 cm', 'Português', 52.00, 'imagens/Centro_Terra.jfif'),
(34, 'Eu, Robô', 'Isaac Asimov', 'Editora Aleph', 'Eu, Robô é um conjunto de nove contos que relatam a evolução dos autômatos através do tempo. É neste livro que são apresentadas as célebres Três Leis da Robótica: os princípios que regem o comportamen', 'Ficção', '24 novembro 2014', 320, 1, '21 x 13.8 x 2 cm', 'Português', 54.90, 'imagens/EuRobo.jfif'),
(35, 'Edgar Allan Poe - Medo Clássico', 'Edgar Allan Poe', 'Darkside', 'É meia-noite. As asas de um corvo se misturam à escuridão. A velha casa em ruínas observa com janelas que pareciam olhos. Você jura ouvir a voz de alguém que já partiu para o outro lado, bem na hora e', '[Horror, Literatura]', '2 fevereiro 2017', 384, 1, '23.4 x 16.2 x 3.2 cm', 'Português', 64.90, 'imagens/Medo_Classico.jpg'),
(36, 'A Arte da Guerra', 'SUN TZU', 'Novo Século', 'O que faz de um tratado militar, escrito por volta de 500 a.C., manter-se atual a ponto de ser publicado praticamente no mundo todo até os dias de hoje? Você verá que, em A arte da guerra, as estratég', 'Educacao', '20 maio 2015', 158, 1, '24.2 x 16.2 x 2 cm', 'Português', 29.93, 'imagens/Arte_Guerra.jpg'),
(37, 'Box Sherlock Holmes', 'Arthur Conan Doyle', 'HarperCollins', 'Em 1887, o escritor escocês sir Arthur Conan Doyle criou Sherlock Holmes, o infalível detetive a quem os agentes da Scotland Yard recorriam para solucionar os mistérios mais intrigantes da Inglaterra ', 'Misterio', '1 junho 2019', 1808, 1, '24.4 x 16.6 x 11.2 c', 'Português', 74.90, 'imagens/Sherlock.jpg'),
(38, 'MAZE RUNNER: Correr ou morrer', 'James Dashner', 'Vergara & Riba', 'Ao acordar dentro de um escuro elevador em movimento, a única coisa que Thomas consegue lembrar é de seu nome. Sua memória está completamente apagada. Mas ele não está sozinho. Quando a caixa metálica', 'Misterio', '1 janeiro 2010', 428, 1, '8.27 x 5.59 x 1.18 c', 'Português', 99.99, 'imagens/mazeRunner.jpg'),
(39, 'Batman - A Piada Mortal - Volume 1', 'Alan Moore', 'Panini', 'Do premiado roteirista Alan Moore (Watchmen, V de Vingança) conta como um dia ruim na vida de um homem pode significar a linha que separa a sanidade da loucura. Principalmente quando se trata do Corin', 'Fantasia', '1 janeiro 2015', 80, 1, '10.47 x 6.85 x 0.39 ', 'Português', 39.90, 'imagens/aPiadaMortal.jpg'),
(40, 'Solo Leveling - Volume 01', 'Chugong', 'NewPOP', 'Um grande fenômeno um dia aconteceu, portais desconhecidos surgiram ligando o mundo que conhecemos a uma realidade totalmente extraordinária de monstros e seres fantasiosos, cujo único objetivo era ma', 'Fantasia', '1 janeiro 2020', 320, 1, '8.19 x 5.59 x 0.39 c', 'Português', 99.99, 'imagens/soloLeveling.jpg'),
(41, 'Love Is War: Kaguya Sama - Vol. 1', 'Aka Akasaka', 'Panini', 'Família e aparência impecáveis!! No Colégio Shuchiin, onde os prodígios do amanhã são reunidos para estudar!! Foi lá que Kaguya Shinomiya, vice-presidente da Associação Estudantil, e Miyuki Shirogane,', 'Fantasia', '20 fevereiro 2021', 320, 1, '19.8 x 13.6 x 1.4 cm', 'Português', 23.92, 'imagens/loveIsWar.jpg'),
(42, 'Guerra Civil', 'Stuart Moore', 'Novo Século', 'Nessa versão em prosa da graphic novel, Stuart Moore adapta uma das histórias mais famosas do universo Marvel para um livro de tirar o fôlego. Homem de Ferro e Capitão América são dois membros essenci', 'Fantasia', 'January 1 2015', 320, 1, '21.4 x 13.8 x 2.4 cm', 'Português', 23.90, 'imagens/guerraCivil.jpg'),
(43, 'Berserk - Volume 1', 'Kentaro Miura', 'Panini', 'Berserk é uma série de mangá escrita e ilustrada por Kentaro Miura. Situado em um mundo de fantasia sombria inspirado na Europa medieval, a história gira em torno do solitário Guts, um ex-mercenário e', 'Fantasia', '1 maio 2005', 130, 1, '13 x 1.78 x 18.31 cm', 'Português', 99.99, 'imagens/berserk.jpg');";

    executarQuery($link, $sql);

    $sql = "CREATE TABLE `usuario` (
    `codigo` int(11) NOT NULL,
    `cpf` int(11) DEFAULT NULL,
    `nome` varchar(100) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `senha` varchar(38) DEFAULT NULL,
    `telefone` varchar(10) DEFAULT NULL,
    `endereco_CEP` varchar(10) DEFAULT NULL,
    `endereco_Estado` varchar(50) DEFAULT NULL,
    `endereco_Cidade` varchar(50) DEFAULT NULL,
    `endereco_Bairro` varchar(50) DEFAULT NULL,
    `endereco_Rua` varchar(50) DEFAULT NULL,
    `endereco_Numero` int(10) DEFAULT NULL,
    `pagamento_NomeTitular` varchar(100) DEFAULT NULL,
    `pagamento_CPFTitular` int(11) DEFAULT NULL,
    `pagamento_CVV` int(3) DEFAULT NULL,
    `pagamento_NumeroCartao` int(16) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    executarQuery($link, $sql);

    $sql = "CREATE TABLE `favoritos` (
    `codigo_livro` int(11) NOT NULL,
    `codigo_usuario` int(11) NOT NULL,
    `data_adicao` varchar(20) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    executarQuery($link, $sql);

    $sql = "CREATE TABLE `compra` (
    `valor_total` double(4,2) NOT NULL,
    `codigo_usuario` int(11) NOT NULL,
    `codigo_livro` int(11) NOT NULL,
    `quantidade` int(3) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    executarQuery($link, $sql);

    $sql = "CREATE TABLE `desconto` (
    `codigo` int(11) NOT NULL,
    `cupom` varchar(10) DEFAULT NULL,
    `valido` tinyint(1) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    executarQuery($link, $sql);

    $sql = "CREATE TABLE `utiliza` (
    `preco_total` double(4,2) NOT NULL,
    `codigo_usuario` int(11) NOT NULL,
    `codigo_livro` int(11) NOT NULL,
    `codigo_desconto` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `compra`
ADD PRIMARY KEY (`valor_total`,`codigo_usuario`,`codigo_livro`),
ADD KEY `codigo_usuario` (`codigo_usuario`),
ADD KEY `codigo_livro` (`codigo_livro`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `desconto`
ADD PRIMARY KEY (`codigo`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `favoritos`
ADD PRIMARY KEY (`codigo_livro`,`codigo_usuario`,`data_adicao`),
ADD KEY `codigo_usuario` (`codigo_usuario`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `livro`
ADD PRIMARY KEY (`codigo`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `usuario`
ADD PRIMARY KEY (`codigo`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `utiliza`
ADD PRIMARY KEY (`preco_total`,`codigo_usuario`,`codigo_livro`,`codigo_desconto`),
ADD KEY `codigo_usuario` (`codigo_usuario`),
ADD KEY `codigo_livro` (`codigo_livro`),
ADD KEY `codigo_desconto` (`codigo_desconto`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `desconto`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `livro`
MODIFY `codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `usuario`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `compra`
ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`),
ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`codigo_livro`) REFERENCES `livro` (`codigo`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `favoritos`
ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`codigo_livro`) REFERENCES `livro` (`codigo`),
ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `utiliza`
ADD CONSTRAINT `utiliza_ibfk_1` FOREIGN KEY (`preco_total`) REFERENCES `compra` (`valor_total`),
ADD CONSTRAINT `utiliza_ibfk_2` FOREIGN KEY (`codigo_usuario`) REFERENCES `compra` (`codigo_usuario`),
ADD CONSTRAINT `utiliza_ibfk_3` FOREIGN KEY (`codigo_livro`) REFERENCES `compra` (`codigo_livro`),
ADD CONSTRAINT `utiliza_ibfk_4` FOREIGN KEY (`codigo_desconto`) REFERENCES `desconto` (`codigo`);";

    executarQuery($link, $sql);
}

function executarQuery($link, $sql)
{
    if (mysqli_query($link, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
