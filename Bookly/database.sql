-- /**********************************************************************
--   Curso: Engenharia de Software
--   Disciplina: Linguagem e Técnicas de Programação
--   Professor: Flores
--   Turma: ESOFT-2
--   Componentes:
--     26014883-2 - Arthur Martins Inacio
--     26004871-2 - Derick Narresi
--     26013191-2 - Giovanna Yoko Figueredo Durigan Nakai
--     26009755-2 - Guilherme Massaro De Souza
--     26008921-2 - Guivensley Guillaume
--     26013021-2 - João Victor Vargas de Oliveira
--     26007287-2 - Yago De Souza Rodrigues
--     26014129-2 - Thiago das Neves Fernandes
--     26013017-2 - Matheus Rodrigues Oliveira
--   Data: 03 de Novembro de 2026
--   Descritivo: Script de criação e povoamento do banco de dados Bookly,
--   com acervo de 20 obras raras, capas, descrições e valores.
-- **********************************************************************/


CREATE DATABASE IF NOT EXISTS `bookly_db`;
USE `bookly_db`;


CREATE TABLE `categorias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `livros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `autor` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  `valor` DECIMAL(12, 2) NOT NULL,
  `imagem` VARCHAR(500) DEFAULT NULL,
  `categoria_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Manuscritos e Incunábulos'),
(2, 'Primeiras Edições Famosas'),
(3, 'Clássicos da Literatura Mundial'),
(4, 'Literatura Brasileira Rara'),
(5, 'Fantasia e Ficção Científica Clássica'),
(6, 'Infantojuvenil Histórico');

INSERT INTO `livros` (`nome`, `autor`, `descricao`, `valor`, `imagem`, `categoria_id`) VALUES
-- Categoria 1: Manuscritos e Incunábulos
('Códice Leicester', 'Leonardo da Vinci', 'Manuscrito científico de 72 páginas com anotações originais de Da Vinci.', 155000000.00, 'https://m.media-amazon.com/images/I/61wPL2qZWiL._SY425_.jpg', 1),
('Bíblia de Gutenberg', 'Johannes Gutenberg', 'O primeiro livro impresso com tipos móveis no Ocidente (1455).', 180000000.00, 'https://upload.wikimedia.org/wikipedia/commons/0/0b/Gutenberg_Bible%2C_Lenox_Copy%2C_New_York_Public_Library%2C_2009._Pic_01.jpg', 1),
('A Arte da Guerra (Manuscrito)', 'Sun Tzu', 'Manuscrito chinês antigo do tratado militar mais influente da história.', 12000000.00, 'https://static.cedet.com.br/produtos_imagem_principal_large/7115-525x791.jpg?v=1750275544', 1),

-- Categoria 2: Primeiras Edições Famosas
('First Folio', 'William Shakespeare', 'Primeira compilação das peças de Shakespeare, publicada em 1623.', 55000000.00, 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Title_page_William_Shakespeare%27s_First_Folio_1623.jpg', 2),
('O Grande Gatsby (1ª edição, 1925)', 'F. Scott Fitzgerald', 'Primeira edição de 1925 com a icônica capa de Francis Cugat.', 1800000.00, 'https://upload.wikimedia.org/wikipedia/commons/7/7a/The_Great_Gatsby_Cover_1925_Retouched.jpg', 2),
('Ulysses (1ª edição, 1922)', 'James Joyce', 'Primeira edição publicada em Paris pela Shakespeare and Company.', 2200000.00, 'https://upload.wikimedia.org/wikipedia/commons/a/ab/JoyceUlysses2.jpg', 2),
('1984 (1ª edição, 1949)', 'George Orwell', 'Primeira edição de 1949. A capa verde original é muito disputada.', 380000.00, 'https://image.zst.com.br/17E8AD607E175965CE0F2BF40913AE08_235_235.jpg', 2),

-- Categoria 3: Clássicos da Literatura Mundial
('Dom Quixote (1ª edição, 1605)', 'Miguel de Cervantes', 'Primeira edição de 1605 da obra fundadora do romance moderno.', 25000000.00, 'https://upload.wikimedia.org/wikipedia/commons/d/d8/El_ingenioso_hidalgo_don_Quijote_de_la_Mancha.jpg', 3),
('Moby Dick (1ª edição, 1851)', 'Herman Melville', 'Primeira edição da épica baleia branca.', 450000.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_778461-CBT82137556488_022025-F-livro-moby-dick-the-original-1851-edition-a-herman-novel.webp', 3),
('Crime e Castigo (1ª edição, 1866)', 'Fiódor Dostoiévski', 'Primeira edição do clássico russo.', 650000.00, 'https://covers.openlibrary.org/b/isbn/9780143058144-L.jpg', 3),
('Orgulho e Preconceito (1ª edição, 1813)', 'Jane Austen', 'Primeira edição de 1813, relíquia da literatura inglesa.', 3200000.00, 'https://upload.wikimedia.org/wikipedia/commons/1/17/PrideAndPrejudiceTitlePage.jpg', 3),

-- Categoria 4: Literatura Brasileira Rara
('Memórias Póstumas de Brás Cubas (1ª edição, 1881)', 'Machado de Assis', 'Primeira edição de 1881, marco do Realismo brasileiro.', 2800000.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTa8At4yy_X_2aFcFmdqJVmEAeUJ9L0Byac1tXO_753zrAkWLdgBH9vEAY&s=10', 4),
('Grande Sertão: Veredas (1ª edição, 1956)', 'João Guimarães Rosa', 'Primeira edição de 1956, obra máxima da literatura brasileira.', 950000.00, 'https://m.media-amazon.com/images/I/71bh8SB8R0L._SY425_.jpg', 4),
('Os Lusíadas (1ª edição, 1572)', 'Luís de Camões', 'Primeira edição impressa em 1572, obra do Renascimento português.', 8500000.00, 'https://blogdabn.wordpress.com/wp-content/uploads/2012/04/os-lusc3adadas.jpg', 4),

-- Categoria 5: Fantasia e Ficção Científica Clássica
('O Hobbit (1ª edição, 1937)', 'J.R.R. Tolkien', 'Primeira edição de 1937 com a icônica capa verde desenhada pelo autor.', 1200000.00, 'https://m.media-amazon.com/images/I/91M9xPIf10L._SY466_.jpg', 5),
('Harry Potter e a Pedra Filosofal (1ª edição, 1997)', 'J.K. Rowling', 'Primeira edição de 1997 com apenas 500 exemplares impressos.', 250000.00, 'https://upload.wikimedia.org/wikipedia/en/6/6b/Harry_Potter_and_the_Philosopher%27s_Stone_Book_Cover.jpg', 5),
('Admirável Mundo Novo (1ª edição, 1932)', 'Aldous Huxley', 'Primeira edição do clássico distópico.', 280000.00, 'https://upload.wikimedia.org/wikipedia/en/6/62/BraveNewWorld_FirstEdition.jpg', 5),

-- Categoria 6: Infantojuvenil Histórico
('O Pequeno Príncipe (1ª edição, 1943)', 'Antoine de Saint-Exupéry', 'Primeira edição de 1943 com ilustrações originais do autor.', 1500000.00, 'https://upload.wikimedia.org/wikipedia/en/0/05/Littleprince.JPG', 6),
('Alice no País das Maravilhas (1ª edição, 1865)', 'Lewis Carroll', 'Primeira edição de 1865 com ilustrações de John Tenniel.', 4200000.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmb7m-dkRZHIoXtNB8teR9j2G-vCckjXUJmW-b2mBdgg&s=10', 6),
('A Revolução dos Bichos (1ª edição, 1945)', 'George Orwell', 'Primeira edição de 1945 com a capa original da Secker & Warburg.', 180000.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRj6pxv0Xe2hriUJMLkSeWlaVcqmhsf4vH-wBEtYoCnfg&s', 6);
