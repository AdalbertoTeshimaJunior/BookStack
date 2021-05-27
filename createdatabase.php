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
    `descricao` varchar(2000) DEFAULT NULL,
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
        (1, 'As Vantagens de Ser Invisível', 'Stephen Chbosky', 'Rocco Jovens Leitores', 'Manter-se à margem oferece uma única e passiva perspectiva. Mas, de uma hora para outra, sempre chega o momento de encarar a vida do centro dos holofotes. Mais íntimas do que um diário, as cartas de Charlie são estranhas e únicas, hilárias e devastadoras. Não se sabe onde ele mora. Não se sabe para quem ele escreve. Tudo o que se conhece é o mundo que ele compartilha com o leitor. Estar encurralado entre o desejo de viver sua vida e fugir dela o coloca num novo caminho através de um território inexplorado. Um mundo de primeiros encontros amorosos, dramas familiares e novos amigos. Um mundo de sexo, drogas e rock’n’roll, quando o que todo mundo quer é aquela música certa que provoca o impulso perfeito para se sentir infinito. A luta entre apatia e entusiasmo marca o fim da adolescência de Charlie nesta história divertida e ao mesmo tempo instigante.', 'Drama', '15 agosto 2020', 288, 2, '21.08 x 13.97 x 2.03', 'Português', 40.00, 'imagens/as_vantagens_de_ser_invisivel.jpg'),
        (2, 'A Divina Comédia', 'Dante Alighieri', 'Principis', 'A Divina Comédia é um poema clássico da literatura italiana e mundial com características épica e teológica, escrito por Dante Alighieri no século XIV período renascentista e dividido em três partes: o Inferno, o Purgatório e o Paraíso. São cem cantos protagonizados pelo próprio Dante em companhia do poeta romano Virgílio, que percorreu uma jornada espiritual pelos três reinos além-túmulo.', 'Épico', '18 junho 2020', 720, 1, '23.2 x 16.2 x 4.6 cm', 'Português', 20.00, 'imagens/a_divina_comedia.jpg'),
        (3, 'O Cortiço', 'Aluísio Azevedo', 'Principis', 'Pobreza, corrupção, injustiça, traição são elementos integram O cortiço, principal obra do Naturalismo brasileiro. Nela, Aluísio Azevedo denuncia as mazelas sociais enfrentadas pelos moradores de um cortiço no Rio de Janeiro no século XIX. É um romance que convida a analisar por meio da observação crítica do cotidiano das personagens a animalização do ser humano, questão que se mostra, mais do que nunca, atual.', 'Romance', '17 outubro 2019', 224, 3, '22.8 x 15.8 x 0.6 cm', 'Português', 11.80, 'imagens/o_cortico.jpg'),
        (4, 'Mitologia Nórdica', 'Neil Gaiman', 'Intrínseca', 'Uma jornada da origem do universo até o fim do mundo.Quem, além de Neil Gaiman, poderia se tornar cúmplice dos deuses e usar de sua habilidade com as palavras para recontar as histórias dos mitos nórdicos? Fãs e leitores sabem que a mitologia nórdica sempre teve grande influência na obra do autor. Depois de servirem de inspiração para clássicos como Deuses americanos e Sandman, Gaiman agora investiga o universo dos mitos nórdicos. Em Mitologia nórdica, ele vai até a fonte dos mitos para criar sua própria versão, com o inconfundível estilo sagaz e inteligente que permeia toda a sua obra.', 'Mitologia', '13 março 2017', 288, 1, '21.6 x 14 x 2 cm', 'Português', 28.00, 'imagens/mitologia_nordica.jpg'),
        (5, 'O Hobbit', 'J.R.R Tolkien', 'HarperCollins', 'Bilbo Bolseiro era um dos mais respeitáveis hobbits de todo o Condado até que, um dia, o mago Gandalf bate à sua porta. A partir de então, toda sua vida pacata e campestre soprando anéis de fumaça com seu belo cachimbo começa a mudar. Ele é convocado a participar de uma aventura por ninguém menos do que Thorin Escudo-de-Carvalho, um príncipe do poderoso povo dos Anãos.Esta jornada fará Bilbo, Gandalf e 13 anãos atravessarem a Terra-média, passando por inúmeros perigos, sejam eles, os imensos trols, as Montanhas Nevoentas infestadas de gobelins ou a muito antiga e misteriosa Trevamata, até chegarem (se conseguirem) na Montanha Solitária. Lá está um incalculável tesouro, mas há um, porém. Deitado em cima dele está Smaug, o Dourado, um dragão malicioso que... bem, você terá que ler e descobrir.', 'Fantasia', '15 julho 2019', 336, 1, '22.8 x 15.8 x 0.6 cm', 'Português', 30.00, 'imagens/o_hobbit.jpg'),
        (6, 'O Guia Definitivo do Mochileiro das Galáxias', 'Douglas Adams', 'Arqueiro', 'Pela primeira vez, reunimos em um único volume os cinco livros da cultuada série O Mochileiro das Galáxias, de Douglas Adams. Com mais de 15 milhões de exemplares vendidos, a saga do britânico esquisitão Arthur Dent pela Galáxia conquistou leitores do mundo inteiro. O humor ácido e as tramas surreais de Douglas Adams se tornaram ícones de uma geração e seguem fascinando – e divertindo – leitores de todas as idades. Pegue sua toalha, embarque nessa aventura improvável e, é claro, não entre em pânico!', 'Ficção', '05 maio 2016', 672, 1, '23.4 x 16.4 x 3.8 cm', 'Português', 69.90, 'imagens/guia_definitivo_do_mochileiro_das_galaxias.jpg'),
        (7, 'A Guerra da Rainha Vermelha - Vol. 1', 'Mark Lawrence', 'Darkside', 'Mark Lawrence, um dos autores de fantasia mais consagrados dos últimos anos, expande seu universo fantástico com uma nova e instigante trilogia. A DarkSide Books tem o prazer de apresentar A GUERRA DA RAINHA VERMELHA - VOL. 1: PRINCE OF FOOLS.“Sou um mentiroso, um trapaceiro e um covarde, mas nunca, jamais, irei decepcionar um amigo. A menos que, para não o decepcionar, seja preciso demonstrar honestidade, jogo limpo ou bravura.” Assim se apresenta Jalan Kendeth, o neto da Rainha Vermelha e décimo na linha de sucessão ao trono. Um verdadeiro hedonista sem pretensões políticas, que se vê obrigado a abandonar sua boa vida após sofrer uma tentativa de assassinato. Para escapar, precisa se aliar a um perigoso guerreiro.Mark Lawrence novamente cria um anti-herói irresistível. Por que mesmo estamos torcendo por eles? – é uma pergunta comum entre os cada vez mais numerosos leitores de suas aventuras. A resposta, certamente, está no talento com que o autor conduz seus personagens e narrativas. E desta vez, a violência e o rancor de Jorg Ancrath, da Trilogia dos Espinhos, é substituída pela astúcia e charme do Príncipe dos Tolos.Em comum, as duas trilogias dividem o mesmo cenário, um universo pós-apocalíptico e de inspiração medieval. Se você não via a hora de voltar ao Império Destruído, esta é sua chance, com esta nova saga do universo expandido da Trilogia dos Espinhos.A GUERRA DA RAINHA VERMELHA - VOL. 1: PRINCE OF FOOLS chega ao Brasil em novembro de 2015, em edição luxuosa e capa dura. Uma ótima indicação para os fãs de Mark Lawrence. E, claro, uma oportunidade imperdível para aqueles que ainda não tiveram a experiência de mergulhar em suas páginas.', 'Ficção', '03 novembro 2015', 420, 1, '23.4 x 16.2 x 3.2 cm', 'Português', 41.70, 'imagens/a_guerra_da_rainha_vermelha.jpg'),
        (8, 'Box Percy Jackson e os Olimpianos', 'Rick Riordan', 'Intrínseca', 'Combinando mitologia grega e muita aventura, a saga do menino Percy Jackson, que aos 12 anos descobre que é um semideus, filho de Poseidon, tornou-se um fenômeno mundial. Foram mais de 15 milhões de livros vendidos em todo o mundo e quase um milhão no Brasil, além da adaptação para o cinema que atraiu 1,8 milhão de espectadores no país.Agora, os fãs da série podem ter, reunidos em um box especial, com edição limitada e design exclusivo, os cinco livros da saga que consagrou o autor Rick Riordan: O ladrão de raios, em que Percy descobre sua ligação com os deuses do Olimpo e precisa impedir uma guerra entre eles, que acabaria com toda a civilização ocidental; O Mar de Monstros, quando ele e seus amigos se envolvem numa perigosa aventura para defender o Acampamento Meio-Sangue; A maldição do Titã, em que nosso herói descobre que Cronos, o Senhor dos Titãs, despertou e está disposto a destruir toda a humanidade; A batalha do Labirinto, em que Percy, Tyson, Annabeth e Grover são destacados para combater o perigoso Titã nos corredores do temido Labirinto de Dédalo; e O último Olimpiano, quando o confronto toma as ruas de Nova York e Percy tem de lidar não só com o exército de Cronos, mas também com a chegada de seu 16º aniversário e, com ele, com a profecia que determinará seu destino.', 'Mitologia', '31 março 2015', 1816, 1, '21.6 x 13.6 x 9.6 cm', 'Português', 99.99, 'imagens/box_percy_jackson_e_os_olimpianos.jpg'),
        (9, 'O Vilarejo', 'Raphael Montes', 'Suma', 'lustrações coloridas dão vida a romance com elementos de horror gótico e suspense. Do criador da série original Netflix Bom dia, Verônica. Em 1589, o padre e demonologista Peter Binsfeld fez a ligação de cada um dos pecados capitais a um demônio, supostamente responsável por invocar o mal nas pessoas. É a partir daí que Raphael Montes cria sete histórias situadas em um vilarejo isolado, apresentando a lenta degradação dos moradores do lugar, e pouco a pouco o próprio vilarejo vai sendo dizimado, maculado pela neve e pela fome.As histórias podem ser lidas em qualquer ordem, sem prejuízo de sua compreensão, mas se relacionam de maneira complexa, de modo que ao término da leitura as narrativas convergem para uma única e surpreendente conclusão.', 'Ficção', '14 agosto 2015', 96, 1, '22.8 x 15.4 x 0.8 cm', 'Português', 22.89, 'imagens/o_vilarejo.jpg'),
        (10, 'Box Trilogia O Senhor dos Anéis', 'J.R.R Tolkien', 'HarperCollins', 'OApesar de ter sido publicado em três volumes – A Sociedade do Anel, As Duas Torres e O Retorno do Rei – desde os anos 1950, O Senhor dos Anéis não é exatamente uma trilogia, mas um único grande romance que só pode ser compreendido em seu conjunto, segundo a concepção de seu autor, J.R.R. Tolkien. Com design cuidadosamente pensado para refletir a unidade da obra e os desenhos originais feitos por Tolkien para as capas de cada volume, este box reúne os três livros da Saga do Anel e oferece aos leitores uma nova oportunidade de mergulhar no notável mundo da Terra-média.', 'Fantasia', '25 novembro 2019', 1568, 1, '22.2 x 14.4 x 10.4 c', 'Português', 99.99, 'imagens/box_senhor_dos_aneis.jpg'),
        (11, 'Fahrenheit 451', 'Ray Bradbury', 'Biblioteca Azul', 'Guy Montag é um bombeiro. Sua profissão é atear fogo nos livros. Em um mundo onde as pessoas vivem em função das telas e a literatura está ameaçada de extinção, os livros são objetos proibidos, e seus portadores são considerados criminosos. Montag nunca questionou seu trabalho; vive uma vida comum, cumpre o expediente e retorna ao final do dia para sua esposa e para a rotina do lar. Até que conhece Clarisse, uma jovem de comportamento suspeito, cheia de imaginação e boas histórias. Quando sua esposa entra em colapso mental e Clarisse desaparece, a vida de Montag não poderá mais ser a mesma.', 'Ficção', '1 junho 2012', 216, 1, '20.8 x 13.8 x 1.4 cm', 'Português', 21.90, 'imagens/fahrenheit_451.jpg'),
        (12, 'A dança do Universo', 'Marcelo Gleiser', 'Companhia de Bolso', 'O que aconteceu no momento da Criação? Houve um minuto determinado em que o Universo que nos rodeia surgiu? Essas são questões tão antigas como a própria humanidade. Muitos procuram a resposta nos mitos e na religião. Outros nas teorias científicas. Em A dança do Universo, o físico Marcelo Gleiser mostra em linguagem clara que esses dois enfoques não são tão distantes quanto imaginamos, apresentando versões de diversas culturas para o mistério da Criação, até desembocar na explicação da ciência moderna para o surgimento do Universo.', 'Ciência', '9 junho 2006', 416, 3, '17.8 x 12.4 x 2 cm', 'Português', 26.89, 'imagens/a-danca-do-universo.jpg'),
        (13, '1984', 'George Orwell', 'Companhia das Letras', 'Winston, herói de 1984, último romance de George Orwell, vive aprisionado na engrenagem totalitária de uma sociedade completamente dominada pelo Estado, onde tudo é feito coletivamente, mas cada qual vive sozinho. Ninguém escapa à vigilância do Grande Irmão, a mais famosa personificação literária de um poder cínico e cruel ao infinito, além de vazio de sentido histórico. De fato, a ideologia do Partido dominante em Oceânia não visa nada de coisa alguma para ninguém, no presente ou no futuro. OBrien, hierarca do Partido, é quem explica a Winston que  só nos interessa o poder em si. Nem riqueza, nem luxo, nem vida longa, nem felicidade: só o poder pelo poder, poder puro .', 'Ficção', '21 Julho 2009', 416, 1, '21 x 13.6 x 2.2 cm', 'Português', 21.99, 'imagens/1984.jpg'),
        (14, 'Vivendo com as estrelas', 'Diulia de Mello', 'Panda Books', 'Depois de ouvir perguntas como “Para que serve a astronomia?”, “Como é o trabalho de um astrônomo?” de vários jovens nas palestras e em seu blog, Mulher das Estrelas, a astrônoma brasileira Duília de Mello resolveu contar neste livro a sua trajetória profissional, que começou na adolescência com o sonho de desvendar o Universo, e chegou à Nasa, a Agência Espacial Norte-Americana. A autora fala do dia a dia de um astrônomo, explica quais cursos fazer para se tornar um profissional da área e divide com os leitores sua grande descoberta: a supernova SN1997D, entre várias outras novidades.', 'Ciência', '7 agosto 2009', 64, 1, '22.8 x 14.8 x 0.6 cm', 'Português', 20.00, 'imagens/vivendo-com-as-estrelas.jpg'),
        (15, 'Cosmos', 'Carl Sagan', 'Companhia das Letras', 'Escrito por um dos maiores divulgadores de ciência do século XX, Cosmos retraça 14 bilhões de anos de evolução cósmica, explorando tópicos como a origem da vida, o cérebro humano, hieróglifos egípcios, missões espaciais, a morte do sol, a evolução das galáxias e as forças e indivíduos que ajudaram a moldar a ciência moderna. Numa prosa transparente, Carl Sagan revela os segredos do planeta azul habitado por uma forma de vida que apenas começa a descobrir sua própria identidade e a se aventurar no vasto oceano do espaço sideral.', 'Ciência', '6 novembro 2017', 560, 2, '21 x 13.6 x 3 cm', 'Português', 48.90, 'imagens/cosmos.jpg'),
        (16, 'Astrofísica para Apressados', 'Neil deGrasse Tyson', 'Planetas', 'Quem nunca olhou para o céu numa noite estrelada e se perguntou: que lugar ocupo no espaço? O que tudo isso significa? Como funciona? Em Astrofísica para apressados, o aclamado astrofísico e pesquisador Neil deGrasse Tyson responde a essas e outras perguntas que certamente todos já fizeram sobre o universo. De forma clara e sucinta, Tyson traduz o cosmos numa obra organizada em capítulos enxutos, escritos para quem tem pressa, mas que oferecem conhecimentos fundamentais sobre todas as principais ideias e descobertas relacionadas ao universo. Um guia para todos aqueles que apreciam ciência, astrofísica e se interessam pelos mistérios do espaço universal, tão bem revelado ao público por este autor best-seller.', 'Ciência', '31 agosto 2020', 192, 2, '21 x 13.6 x 1.4 cm', 'Português', 24.90, 'imagens/astrofisica-para-apressados.png'),
        (17, 'A Simples beleza do inesperado', 'Marcelo Gleiser', 'Record', 'A simples beleza do inesperado é um tributo à natureza, um ensaio sobre a conexão entre o homem e o planeta Terra, e uma exploração do significado da existência – dos átomos ao cosmos, passando pelas trutas.', 'Ciência', '28 outubro 2016', 196, 3, 'A 23 cm / L 15,6 cm ', 'Português', 29.89, 'imagens/a-simples-beleza-do-inesperado.jpg'),
        (18, 'Humano Mais Humano', 'Brian Christian', 'Companhia das Letras', 'O humano mais humano é uma investigação abrangente e fascinante de como computadores estão nos fazendo repensar o papel da humanidade no século XXI. Brian Christian alinha os avanços da inteligência artificial aos solavancos da interação social para questionar: em uma era de máquinas inteligentes, o que significa ser humano?', 'Ciência', '1 Março de 2013', 368, 1, '14.00 X 21.00 cm / 0', 'Português', 45.90, 'imagens/humanomaishumano.jpg'),
        (19, 'Cidade dos Ossos (Vol.1 Os Instrumentos Mortais)', 'Cassandra Clare', 'Galera', 'Clary Fray, 15 anos, decide passar a noite em uma boate em Nova York. O maior de seus problemas provavelmente seria lidar com o truculento segurança da porta, certo? Errado. Clary testemunha um crime, e não um crime qualquer: um assassinato cometido por três adolescentes cobertos por enigmáticas tatuagens, brandindo armas esquisitas.', 'Infantojuvenil', '1 Janeiro 2016', 462, 51, '22.8 x 15.4 x 2.6 cm', 'Português', 31.90, 'imagens/CidadeDosOssos.jpg'),
        (20, 'Cidade das Cinzas (Vol.2 Os Instrumentos Mortais)', 'Cassandra Clare', 'Galera', 'Nesta sequência de tirar o fôlego, Cassandra Clare atrai seus leitores de volta às garras sombrias do submundo de Nova York, onde o amor nunca é seguro e o poder se torna a tentação mais mortal. Clary Fray só queria que sua vida voltasse ao normal. Mas o que é  normal  quando você é uma Caçadora de Sombras assassina de demônios, sua mãe está em um coma magicamente induzido e você de repente descobre que criaturas como lobisomens, vampiros e fadas realmente existem?', 'Infantojuvenil', '1 Janeiro 2014', 406, 20, '22.8 x 15.6 x 2.4 cm', 'Português', 31.90, 'imagens/CidadeDasCinzas.jpg'),
        (21, 'Cidade de Vidro (Vol.3 Os Instrumentos Mortais)', 'Cassandra Clare', 'Galera', 'Nesse terceiro volume da inesquecível saga Os instrumentos mortais, o amor é um pecado mortal e os segredos do passado serão decisivos.Para salvar a vida de sua mãe, Clary deve viajar até a Cidade de Vidro, lar ancestral dos Caçadores de Sombras - podemos pular a regra que diz que entrar em Alicante sem permissão é contra a lei e ir contra a lei pode significar a morte?', 'Infantojuvenil', '1 Janeiro 2014', 476, 14, '22.8 x 15.2 x 3 cm', 'Português', 29.00, 'imagens/CidadeDosVidro.jpg'),
        (22, 'Cidade dos Anjos Caídos (Vol.4 Os Instrumentos Mortais)', 'Cassandra Clare', 'Galera', 'O quarto volume da série Os Instrumentos Mortais, fenômeno mundial de vendas Amor. Sangue. Traição. Vingança. As apostas e os riscos são mais altos que nunca na Cidade dos Anjos Caídos. Neste imperdível volume da série Os instrumentos Mortais, acompanhamos os últimos meses na vida de Clary. Demônios, um ex-caçador de sombras com jeito de supervilão - detalhe: seu pai -, um triângulo amoroso com o melhor amigo (a quem pode inadvertidamente ter ajudado a transformar em vampiro) e um conflito entre dimensões. Mas agora a guerra chegou ao fim, e a garota voltou a Nova York para aperfeiçoar seus poderes e assistir ao casamento da mãe.', 'Infantojuvenil', '1 Janeiro 2014', 476, 13, '22.6 x 15.2 x 2 cm', 'Português', 34.00, 'imagens/CidadeDosAnjosCaidos.jpg'),
        (23, 'Cidade das Almas Perdidas (Vol.5 Os Instrumentos Mortais)', 'Cassandra Clare', 'Galera', 'O quinto volume da série best-seller Os Instrumentos Mortais, de Cassandra Clare. Depois ser apresentada ao Mundo de Sombras e a Jace ― um Caçador que tem a aparência de um anjo, mas a língua tão afiada quanto Lúcifer ―, Clary Fray só queria que sua vida voltasse ao normal.', 'Infantojuvenil', '1 Janeiro 2014', 434, 7, '22.8 x 15.6 x 2.6 cm', 'Português', 37.90, 'imagens/CidadeAlmasPerdidas.png'),
        (24, 'Cidade das Fogo Celestial (Vol.6 Os Instrumentos Mortais)', 'Cassandra Clare', 'Galera', 'O sexto volume da série best-seller Os Instrumentos Mortais, de Cassandra Clare, Caçador de Sombras contra Caçador de Sombras. Irmão contra irmã. Alianças quebradas. Morte, sangue, icor demoníaco. Sebastian Morgenstern espalha o terror pelo universo dos Nephilim e, ainda, pelo Submundo. Nada parece segurar sua sede de poder.', 'Infantojuvenil', '11 Junho 2014', 532, 18, '22.86 x 15.49 x 3.3 ', 'Português', 25.00, 'imagens/CidadeDoFogoCelestial.jpg'),
        (25, 'Assassinato no Expresso do Oriente', 'Agatha Christie', 'HarperCollins', 'Em meio a uma viagem, Hercule Poirot é surpreendido por um telegrama solicitando seu retorno a Londres. Então, o famoso detetive belga embarca no Expresso do Oriente, que está inesperadamente cheio para aquela época do ano. Pouco tempo após a meia-noite, o excesso de neve nos trilhos obriga o trem a parar. Na manhã seguinte, o corpo de um dos passageiros é encontrado, golpeado por múltiplas facadas. Com os passageiros isolados por conta da neve, e tendo um assassino entre eles, a única solução é que Poirot inicie uma investigação para descobrir quem é o criminoso ― antes que se faça mais uma vítima.', 'Misterio', '9 março 2020', 240, 1, '21.4 x 14.2 x 2 cm', 'Português', 39.49, 'imagens/Expresso_Oriente.jpg'),
        (26, 'Inferno', 'Dan Brown', 'Editora Arqueiro', 'Inferno é uma leitura eletrizante e um convite a pensarmos no papel da ciência para o futuro da humanidade. Autor de suspense mais popular da atualidade, com mais de 150 milhões de livros vendidos, Dan Brown nos leva por uma viagem pela cultura, pela arte e pela literatura italianas, passando por lugares como a Galleria degli Uffizi, o Duomo de Florença e a Basílica de São Marcos. No meio da noite, o renomado simbologista Robert Langdon acorda de um pesadelo, num hospital. Desorientado e com um ferimento à bala na cabeça, ele não tem a menor ideia de como foi parar ali. Ao olhar pela janela e reconhecer a silhueta do Palazzo Vecchio, em Florença, Langdon tem um choque. Ele nem se lembra de ter deixado os Estados Unidos. Na verdade, não tem nenhuma recordação das últimas 36 horas. Quando um novo atentado contra a sua vida acontece dentro do hospital, Langdon se vê obrigado a fugir e, para isso, conta apenas com a ajuda da jovem médica Sienna Brooks. De posse de um macabro objeto que Sienna encontrou no paletó de Langdon, os dois têm que seguir uma série inquietante de códigos criada por uma mente brilhante, obcecada tanto pelo fim do mundo quanto por uma das maiores obras-primas literárias de todos os tempos: A Divina Comédia, de Dante Alighieri.', 'Misterio', '19 setembro 2016', 448, 2, '22.8 x 15.4 x 2.6 cm', 'Português', 14.20, 'imagens/Inferno.jpg'),
        (27, 'O Símbolo Perdido', 'Dan Brown', 'Editora Arqueiro', 'Robert Langdon, o célebre simbologista de Harvard, é convidado por seu amigo e mentor Peter Solomon – eminente maçom e filantropo – a dar uma palestra no Capitólio dos Estados Unidos. Ao chegar lá, descobre que caiu numa armadilha: não há palestra, Solomon está desaparecido e, ao que parece, correndo perigo.', 'Misterio', '15 janeiro 2021', 640, 1, '20 x 13.4 x 4 cm', 'Português', 17.95, 'imagens/Simbolo_Perdido.jpg'),
        (28, 'Morte no Nilo', 'Agatha Christie', 'Agatha Christie', 'A tranquilidade de um cruzeiro de luxo pelo Nilo chega ao fim quando o corpo de Linnet Doyle, uma bela e jovem milionária, é descoberto em sua cabine. Porém, para azar do autor do crime, o brilhante detetive Hercule Poirot está a bordo. Ele logo descobre que cada passageiro é suspeito, pois todos tinham motivos para tirar a vida de Linnet. Em um rio de mentiras, Poirot precisa descobrir a verdade sobre esse estranho assassinato.', 'Misterio', '15 setembro 2020', 320, 1, '13.5 x 0.7 x 20.8 cm', 'Português', 26.90, 'imagens/Morte_Nilo.jpg'),
        (29, 'A Garota do Lago', 'Charlie Donlea', 'Faro Editorial', 'Summit Lake, uma pequena cidade entre montanhas, é esse tipo de lugar, bucólico e com encantadoras casas dispostas à beira de um longo trecho de água intocada.Duas semanas atrás, a estudante de direito Becca Eckersley foi brutalmente assassinada em uma dessas casas. Filha de um poderoso advogado, Becca estava no auge de sua vida. Atraída instintivamente pela notícia, a repórter Kelsey Castle vai até a cidade para investigar o caso. ...E LOGO SE ESTABELECE UMA CONEXÃO ÍNTIMA QUANDO UM VIVO CAMINHA NAS MESMAS PEGADAS DOS MORTOS...E enquanto descobre sobre as amizades de Becca, sua vida amorosa e os segredos que ela guardava, a repórter fica cada vez mais convencida de que a verdade sobre o que aconteceu com Becca pode ser a chave para superar as marcas sombrias de seu próprio passado.', 'Misterio', '1 janeiro 2017', 296, 1, '22.4 x 15.6 x 2.8 cm', 'Português', 8.30, 'imagens/Garota_Lago.jfif'),
        (30, 'O Homem de Giz', 'C. J. TUDOR', 'Intrínseca', 'Em 1986, Eddie e os amigos passam a maior parte dos dias andando de bicicleta pela pacata vizinhança em busca de aventuras. Os desenhos a giz são seu código secreto: homenzinhos rabiscados no asfalto; mensagens que só eles entendem. Mas um desenho misterioso leva o grupo de crianças até um corpo desmembrado e espalhado em um bosque. Depois disso, nada mais é como antes.', 'Misterio', '15 março 2018', 272, 1, '23.6 x 16 x 2 cm', 'Português', 32.79, 'imagens/Homem_Giz.jpg'),
        (31, 'Eu sei o que você está pensando', 'John Verdon', 'Editora Arqueiro', 'De forma magistral,Verdon mantém seu protagonista sempre um passo à frente do leitor. E cria o tipo de mistério que faria Sherlock Holmes perder o sono.” - The New York Times Eu sei o que você está pensando propõe um enigma que parece insolúvel. Um homem recebe pelo correio uma carta provocadora que termina da seguinte forma: “Se alguém lhe dissesse para pensar em um número, sei em que número você pensaria. Não acredita? Vou provar. Pense em qualquer número de um a mil. Agora veja como conheço seus segredos.” O destinatário, Mark Mellery, pensa no número 658 e, ao abrir um envelope que acompanha a mensagem, descobre que o autor da carta previu corretamente o número que ele acabara de escolher de modo aleatório. Como isso seria possível?', 'Misterio', '15 julho 2011', 352, 1, '22.6 x 15.8 x 1.8 cm', 'Português', 49.90, 'imagens/Sei_Pensando.jpg'),
        (32, '20 mil léguas submarinas', 'Jules Verne', 'Clássicos Zahar', 'Em 20 mil léguas submarinas, o leitor é transportado para 1866, ano em que navios de diferentes nacionalidades começam a naufragar e sofrer misteriosas avarias. As descrições revelam que um ser comprido, fusiforme, fosforescente em certas ocasiões, infinitamente maior e mais veloz que uma baleia seria o responsável. Imediatamente, governantes e homens da ciência mobilizam-se para deter o misterioso monstro marinho. A missão, porém, não sai como esperado. Os responsáveis pela expedição são capturados pelo capitão Nemo, enigmático e problemático, criador do moderno submarino Náutilus, confundido com o tal monstro misterioso. A aventura só começou. A trupe vai viajar pelo fundo do mar, enfrentando águas remotas, criaturas das profundezas e uma fauna e flora exuberantes.', 'Ficção', '14 novembro 2011', 456, 1, '23.6 x 16.4 x 3 cm', 'Português', 46.73, 'imagens/20mil_Leguas.jfif'),
        (33, 'Viagem ao centro da Terra', 'Jules Verne', 'Clássicos Zahar', 'Em 1863 o renomado professor Otto Lidenbrock, geólogo e mineralogista, descobre uma mensagem cifrada descrevendo uma viagem ao centro da Terra. É o quanto basta para o impetuoso cientista se lançar na mesma aventura - levando consigo o sobrinho Axel, colega de profissão mas defensor de diferentes teorias científicas, e o impassível Hans, guia que se mostrará indispensável para a empreitada e seu espantoso desfecho!', 'Ficção', '14 abril 2016', 240, 1, '23.4 x 16.4 x 1.8 cm', 'Português', 52.00, 'imagens/Centro_Terra.jfif'),
        (34, 'Eu, Robô', 'Isaac Asimov', 'Editora Aleph', 'Eu, Robô é um conjunto de nove contos que relatam a evolução dos autômatos através do tempo. É neste livro que são apresentadas as célebres Três Leis da Robótica: os princípios que regem o comportamento dos robôs e que mudaram definitivamente a percepção que se tem sobre eles na própria ciência. Eu, Robô inicia-se com uma entrevista com a Dra. Susan Calvin, uma psicóloga roboticista da U.S Robots & Mechanical. Ela é o fio condutor da obra, responsável por contar os relatos de seu trabalho e também da evolução dos autômatos. Algumas histórias são mais leves e emocionantes como Robbie, o robô baba, outras, como Razão, levam o leitor a refletir sobre religião e até sobre sua condição humana.', 'Ficção', '24 novembro 2014', 320, 1, '21 x 13.8 x 2 cm', 'Português', 54.90, 'imagens/EuRobo.jfif'),
        (35, 'Edgar Allan Poe - Medo Clássico', 'Edgar Allan Poe', 'Darkside', 'É meia-noite. As asas de um corvo se misturam à escuridão. A velha casa em ruínas observa com janelas que pareciam olhos. Você jura ouvir a voz de alguém que já partiu para o outro lado, bem na hora em que um gato preto cruza seu caminho.Tudo o que hoje conhecemos como terror começou a ganhar forma na obra de Edgar Allan Poe. Genial e maldito, Poe é considerado o mestre dos mestres da literatura fantástica.', '[Horror, Literatura]', '2 fevereiro 2017', 384, 1, '23.4 x 16.2 x 3.2 cm', 'Português', 64.90, 'imagens/Medo_Classico.jpg'),
        (36, 'A Arte da Guerra', 'SUN TZU', 'Novo Século', 'O que faz de um tratado militar, escrito por volta de 500 a.C., manter-se atual a ponto de ser publicado praticamente no mundo todo até os dias de hoje? Você verá que, em A arte da guerra, as estratégias transmitidas pelo general chinês Sun Tzu carregam um profundo conhecimento da natureza humana. Elas transcendem os limites dos campos de batalha e alcançam o contexto das pequenas ou grandes lutas cotidianas, sejam em ambientes competitivos – como os do mundo corporativo – sejam nos desafios internos, em que temos de encarar nossas próprias dificuldades. Se você não conhece a si mesmo nem o inimigo, sucumbirá a todas as batalhas.', 'Educacao', '20 maio 2015', 158, 1, '24.2 x 16.2 x 2 cm', 'Português', 29.93, 'imagens/Arte_Guerra.jpg'),
        (37, 'Box Sherlock Holmes', 'Arthur Conan Doyle', 'HarperCollins', 'Em 1887, o escritor escocês sir Arthur Conan Doyle criou Sherlock Holmes, o infalível detetive a quem os agentes da Scotland Yard recorriam para solucionar os mistérios mais intrigantes da Inglaterra vitoriana. Desde então, as aventuras do mestre da investigação atraem leitores ávidos por chegar à última página e ver o enigma desvendado. Esta obra completa reúne os quatro romances e os 56 contos sobre as aventuras do detetive mais famoso do mundo e de seu fiel companheiro, o dr. Watson. Para desvendar mistérios, o faro e a astúcia de Sherlock Holmes levam às fontes menos óbvias, às informações mais precisas. Um modelo que influencia até hoje a literatura policial e revela fôlego para impressionar gerações de leitores através dos tempos.', 'Misterio', '1 junho 2019', 1808, 1, '24.4 x 16.6 x 11.2 c', 'Português', 74.90, 'imagens/Sherlock.jpg'),
        (38, 'Maze Runner: Correr ou morrer', 'James Dashner', 'Vergara & Riba', 'Ao acordar dentro de um escuro elevador em movimento, a única coisa que Thomas consegue lembrar é de seu nome. Sua memória está completamente apagada. Mas ele não está sozinho. Quando a caixa metálica chega a seu destino e as portas se abrem, Thomas se vê rodeado por garotos que o acolhem e o apresentam A Clareira, um espaço aberto cercado por muros gigantescos. Assim como Thomas, nenhum deles sabe como foi parar ali, nem por quê. Sabem apenas que todas as manhãs as portas de pedra do Labirinto que os cerca se abrem, e, à noite, se fecham. E que a cada trinta dias um novo garoto é entregue pelo elevador. Porém, um fato altera de forma radical a rotina do lugar - chega uma garota, a primeira enviada à Clareira. E mais surpreendente ainda é a mensagem que ela traz consigo. Thomas será mais importante do que imagina, mas para isso terá de descobrir os sombrios segredos guardados em sua mente.', 'Misterio', '1 janeiro 2010', 428, 1, '8.27 x 5.59 x 1.18 c', 'Português', 34.86, 'imagens/mazeRunner.jpg'),
        (39, 'Batman - A Piada Mortal - Volume 1', 'Alan Moore', 'Panini', 'Do premiado roteirista Alan Moore (Watchmen, V de Vingança) conta como um dia ruim na vida de um homem pode significar a linha que separa a sanidade da loucura. Principalmente quando se trata do Coringa, o maior e mais conhecido vilão do mundo dos quadrinhos. Os desenhos de Brian Bolland (Camelot 3000), um dos maiores ilustradores dos quadrinhos, elevaram a história praticamente à perfeição retratando com maestria o mundo imaginado por Alan Moore. Mas faltava um detalhe para completar a obra. Bolland não pôde colorir a edição original, e agora, vinte anos depois, isso foi corrigido e as cores foram completamente refeitas pelo artista, seguindo fielmente a sua imaginação. Edição obrigatória para os fãs do Coringa, do Batman e dos quadrinhos.', 'Fantasia', '1 janeiro 2015', 80, 1, '10.47 x 6.85 x 0.39 ', 'Português', 39.90, 'imagens/aPiadaMortal.jpg'),
        (40, 'Solo Leveling - Volume 01', 'Chugong', 'NewPOP', 'Um grande fenômeno um dia aconteceu, portais desconhecidos surgiram ligando o mundo que conhecemos a uma realidade totalmente extraordinária de monstros e seres fantasiosos, cujo único objetivo era matar humanos. Em resposta a esse novo perigo, surgiram os “Caçadores”, humanos que foram “despertados” e ganharam poderes capazes de bater de frente com essas criaturas. Dentre eles, há um conhecido por ser “a pior arma da humanidade”, Sung Jin-woo. Mas sua sorte irá mudar quando uma incursão que deveria ser fácil se torna um verdadeiro pesadelo.', 'Fantasia', '1 janeiro 2020', 320, 1, '8.19 x 5.59 x 0.39 c', 'Português', 47.41, 'imagens/soloLeveling.jpg'),
        (41, 'Love Is War: Kaguya Sama - Vol. 1', 'Aka Akasaka', 'Panini', 'Família e aparência impecáveis!! No Colégio Shuchiin, onde os prodígios do amanhã são reunidos para estudar!! Foi lá que Kaguya Shinomiya, vice-presidente da Associação Estudantil, e Miyuki Shirogane, o presidente, se conheceram e passaram a sentir atração um pelo outro. Mas… meio ano se passou e nada aconteceu!! Os dois têm orgulho forte e obstinação e adquiriram a enfadonha mania de pensar sempre em como fazer para que o outro confesse seus sentimentos! Vai ser divertido acompanhar como esse romance evolui!! Que comece essa nova comédia romântica em forma de batalha de intelectos!!', 'Fantasia', '20 fevereiro 2021', 320, 1, '19.8 x 13.6 x 1.4 cm', 'Português', 23.92, 'imagens/loveIsWar.jpg'),
        (42, 'Berserk - Volume 1', 'Kentaro Miura', 'Panini', 'Berserk é uma série de mangá escrita e ilustrada por Kentaro Miura. Situado em um mundo de fantasia sombria inspirado na Europa medieval, a história gira em torno do solitário Guts, um ex-mercenário e agora um espadachim amaldiçoado e forçado a vagar sem descanso para sobreviver e buscar vingança, e Griffith, o líder de um bando de mercenários chamado de Bando do Falcão. Temas de isolamento, traição, a ilusão do livre-arbítrio, autopreservação e a questão de se a humanidade é fundamentalmente boa ou má permeiam a história, explorando o melhor e o pior lado da natureza humana.', 'Fantasia', '1 maio 2005', 130, 1, '13 x 1.78 x 18.31 cm', 'Português', 79.13, 'imagens/berserk.jpg'),
        (43, 'Guerra Civil', 'Stuart Moore', 'Novo Século', 'Nessa versão em prosa da graphic novel, Stuart Moore adapta uma das histórias mais famosas do universo Marvel para um livro de tirar o fôlego. Homem de Ferro e Capitão América são dois membros essenciais para os Vingadores, a maior equipe de super-heróis do mundo. Quando uma trágica batalha deixa um buraco na cidade de Stamford, matando centenas de pessoas, o governo americano exige que todos os super-heróis revelem sua identidade e registrem seus poderes. Para Tony Stark – o Homem de Ferro – é um passo lamentável, porém necessário, o que o leva a apoiar a lei. Para o Capitão América, é uma intolerável agressão à liberdade cívica. Assim começa a Guerra Civil.', 'Fantasia', 'January 1 2015', 320, 1, '21.4 x 13.8 x 2.4 cm', 'Português', 23.90, 'imagens/guerraCivil.jpg');";

    executarQuery($link, $sql);

    $sql = "CREATE TABLE `usuario` (
    `codigo` int(11) NOT NULL,
    `cpf` bigint DEFAULT NULL,
    `nome` varchar(100) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `foto` varchar(100) DEFAULT NULL,
    `senha` varchar(38) DEFAULT NULL,
    `telefone` varchar(10) DEFAULT NULL,
    `endereco_CEP` varchar(10) DEFAULT NULL,
    `endereco_Estado` varchar(50) DEFAULT NULL,
    `endereco_Cidade` varchar(50) DEFAULT NULL,
    `endereco_Bairro` varchar(50) DEFAULT NULL,
    `endereco_Rua` varchar(50) DEFAULT NULL,
    `endereco_Numero` int(10) DEFAULT NULL,
    `pagamento_NomeTitular` varchar(100) DEFAULT NULL,
    `pagamento_CPFTitular` bigint DEFAULT NULL,
    `pagamento_CVV` int(3) DEFAULT NULL,
    `pagamento_NumeroCartao` bigint DEFAULT NULL
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
    `valido` tinyint(1) DEFAULT NULL,
    `valor` double(4,2) NOT NULL
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

    $sql = "ALTER TABLE `livro`
MODIFY `codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `usuario`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;";

    executarQuery($link, $sql);


    $sql = "INSERT INTO `desconto` (cupom, valido, valor) VALUES
    ('emcasa30', true, 30.00);";

    executarQuery($link, $sql);

    $sql = "ALTER TABLE `desconto`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;";

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
