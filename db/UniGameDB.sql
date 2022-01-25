-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 25, 2022 alle 16:11
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `UniGameDB`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Carrello`
--

CREATE TABLE `Carrello` (
  `Id_utente` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_prodotto` int(11) NOT NULL,
  `Quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Categoria`
--

CREATE TABLE `Categoria` (
  `Id_categoria` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Icona` varchar(300) NOT NULL,
  `Nome_esteso` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Categoria`
--

INSERT INTO `Categoria` (`Id_categoria`, `Nome`, `Icona`, `Nome_esteso`) VALUES
(1, 'PS', 'ps.svg', 'playstation'),
(2, 'XBOX', 'xbox.svg', 'xbox'),
(3, 'SWITCH', 'nintendo.svg', 'nintendo'),
(4, 'PC', 'pc.svg', 'pc');

-- --------------------------------------------------------

--
-- Struttura della tabella `Dettagli_ordine`
--

CREATE TABLE `Dettagli_ordine` (
  `Id_ordine` int(11) NOT NULL,
  `Id_prodotto` int(11) NOT NULL,
  `Quantità` int(11) NOT NULL,
  `Prezzo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Dettagli_ordine`
--

INSERT INTO `Dettagli_ordine` (`Id_ordine`, `Id_prodotto`, `Quantità`, `Prezzo`) VALUES
(1, 1, 1, '24.99'),
(2, 1, 8, '24.99'),
(2, 2, 7, '15.99');

-- --------------------------------------------------------

--
-- Struttura della tabella `Metodo_pagamento`
--

CREATE TABLE `Metodo_pagamento` (
  `Id_metodo` int(11) NOT NULL,
  `Descrizione` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Metodo_pagamento`
--

INSERT INTO `Metodo_pagamento` (`Id_metodo`, `Descrizione`) VALUES
(1, 'Paypal'),
(2, 'Visa/Mastercard');

-- --------------------------------------------------------

--
-- Struttura della tabella `Notifica`
--

CREATE TABLE `Notifica` (
  `Id_notifica` int(11) NOT NULL,
  `Testo` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Notifica`
--

INSERT INTO `Notifica` (`Id_notifica`, `Testo`) VALUES
(1, 'effettuato'),
(2, 'in lavorazione'),
(3, 'in arrivo'),
(4, 'spedito'),
(5, 'in transito'),
(6, 'arrivato allo stabilimento'),
(7, 'in consegna'),
(8, 'consegnato'),
(9, 'Login effettuato con successo'),
(10, 'Registrazione effettuata con successo'),
(11, 'Logout effettuato con successo');

-- --------------------------------------------------------

--
-- Struttura della tabella `Notifica_Utente`
--

CREATE TABLE `Notifica_Utente` (
  `Id_utente` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_notifica` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Id_ordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Notifica_Utente`
--

INSERT INTO `Notifica_Utente` (`Id_utente`, `Id_notifica`, `Data`, `Id_ordine`) VALUES
('gek5800@gmail.com', 1, '2022-01-13', 1),
('gek5800@gmail.com', 1, '2022-01-11', 2),
('gek5800@gmail.com', 2, '2022-01-13', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `Ordine`
--

CREATE TABLE `Ordine` (
  `Id_ordine` int(11) NOT NULL,
  `Data_ordine` date NOT NULL,
  `Id_utente` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_metodo` int(11) NOT NULL,
  `Id_status` int(11) NOT NULL,
  `Data_consegna` date NOT NULL,
  `Data_agg_status` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Ordine`
--

INSERT INTO `Ordine` (`Id_ordine`, `Data_ordine`, `Id_utente`, `Id_metodo`, `Id_status`, `Data_consegna`, `Data_agg_status`) VALUES
(1, '2021-12-08', 'gek5800@gmail.com', 1, 5, '2022-02-16', '2022-01-20'),
(2, '2022-01-17', 'gek5800@gmail.com', 1, 3, '2022-01-31', '2022-01-19');

-- --------------------------------------------------------

--
-- Struttura della tabella `Pegi`
--

CREATE TABLE `Pegi` (
  `Id_pegi` int(11) NOT NULL,
  `Url_immagine` varchar(300) CHARACTER SET utf16 NOT NULL,
  `Nome` varchar(50) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Pegi`
--

INSERT INTO `Pegi` (`Id_pegi`, `Url_immagine`, `Nome`) VALUES
(1, '3.jpg', 'Pegi 3'),
(2, '7.jpg', 'Pegi 7'),
(3, '12.jpg', 'Pegi 12'),
(4, '16.jpg', 'Pegi 16'),
(5, '18.jpg', 'Pegi 18');

-- --------------------------------------------------------

--
-- Struttura della tabella `Prodotto`
--

CREATE TABLE `Prodotto` (
  `Id_prodotto` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Url_immagine` varchar(300) NOT NULL,
  `Id_venditore` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Unità` int(5) NOT NULL,
  `Prezzo` decimal(10,2) NOT NULL,
  `Sconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Id_sottocategoria` int(11) NOT NULL,
  `Id_pegi` int(11) NOT NULL,
  `Data_rilascio` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prezzo_scontato` decimal(10,2) NOT NULL,
  `Descrizione` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Prodotto`
--

INSERT INTO `Prodotto` (`Id_prodotto`, `Nome`, `Url_immagine`, `Id_venditore`, `Unità`, `Prezzo`, `Sconto`, `Id_sottocategoria`, `Id_pegi`, `Data_rilascio`, `prezzo_scontato`, `Descrizione`) VALUES
(1, 'Far Cry 5', 'FarCry5.png', 'info@unigame.it', 10, '24.99', '0.00', 1, 1, '2020-01-14', '24.99', 'Far Cry è tornato in America nel nuovo episodio della pluripremiata serie. Benvenuto a Hope County, in Montana. Questo luogo idilliaco ospita una comunità di tranquilli amanti della libertà, ma anche una setta di fanatici apocalittici, conosciuto come il Progetto Eden’s Gate. Guidata dal carismatico profeta Joseph Seed e i suoi devoti seguaci, i Messaggeri, Eden’s Gate si è lentamente inserita in ogni aspetto della vita quotidiana di questa cittadina un tempo tranquilla.'),
(2, 'The Last of Us II', 'TheLastOfUs2.jpeg', 'info@unigame.it', 7, '19.99', '0.20', 5, 1, '2017-11-18', '15.99', 'Cinque anni dopo il loro pericoloso viaggio attraverso gli Stati Uniti post-pandemici, Ellie e Joel si sono stabiliti a Jackson, in Wyoming. Vivere in una fiorente comunità di superstiti ha consentito loro di lavorare in pace e in stabilità, nonostante la costante minaccia degli infetti e di altri superstiti ancora più disperati. A seguito di un evento violento che interrompe questa quiete, Ellie si imbarca in un viaggio senza sosta per farsi giustizia e trovare finalmente l\'agognata tranquillità.'),
(3, 'Call of Duty Black Ops II', 'BO3.png', 'info@unigame.it', 5, '19.99', '0.00', 1, 1, '2014-07-19', '19.99', 'RIVIVI LA STORIA DEI NON MORTI Call of Duty®️: Black Ops III - Zombies Chronicles è disponibile su PS4™️ e Xbox One con 8 mappe zombi classiche rimasterizzate tratte da Call of Duty®️: World at War, Call of Duty®️: Black Ops e Call of Duty®️: Black Ops II. Mappe complete della saga originale completamente rimasterizzate in HD e giocabili in Call of Duty®️: Black Ops III.  MAPPE COMPLETAMENTE RIMASTERIZZATE.'),
(4, 'Fifa 22', 'Fifa22.jpeg', 'info@unigame.it', 19, '49.99', '0.00', 1, 1, '2021-09-24', '49.99', 'Prova il nuovo livello con FIFA 21 su console PlayStationⓇ5, Xbox Series X e Xbox Series S, grazie alle nuove caratteristiche il gioco più bello del mondo diventa ancora più coinvolgente. In campo e sugli spalti, il livello tecnologico avanzato fornito dalla nuova generazione di console ti permette di giocare, vedere e muoverti in stadi ultra-realistici, per immergerti nell\'esperienza calcistica più realistica mai provata nella storia della serie EA SPORTS FIFA.'),
(5, 'GTA V', 'GTAV.png', 'info@unigame.it', 4, '29.99', '0.40', 2, 1, '2016-10-21', '17.99', 'Los Santos: un\'enorme e soleggiata metropoli piena di sedicenti guru, attricette e celebrità sul viale del tramonto. Un tempo era l\'invidia del mondo occidentale, ma ora è costretta ad arrangiarsi per restare a galla in un\'epoca di incertezza economica e TV via cavo da quattro soldi. In mezzo a tutto questo, tre criminali molto diversi tra loro si danno da fare per sopravvivere e realizzarsi, ognuno a modo suo: l\'ambizioso Franklin è a caccia di soldi e di opportunità.'),
(6, 'Sonic Forces', 'Sonic.jpeg', 'info@unigame.it', 8, '29.99', '0.00', 6, 1, '2021-05-14', '29.99', 'Dal team che ha creato Sonic Colours e Sonic Generations arriva un nuovo capitolo della serie di Sonic, Sonic Forces™.\r\n\r\nProva la frenetica azione di questo titolo nei panni di Modern Sonic, poi passa a emozionanti sezioni platform con Classic Sonic e scopri i nuovi gadget che hai a disposizione quando usi un eroe personalizzato. Aiuta Sonic a liberare il mondo dal Dr. Eggman e da un nuovo, misterioso nemico.\r\n\r\nTre tipi di gioco: azione a rotta di collo con Modern Sonic, sezioni platform con Classic Sonic e la possibilità di usare potenti gadget nei panni del tuo eroe personalizzato.\r\nAffronta un nuovo e misterioso nemico.'),
(7, 'Cars 2', 'Cars2.jpeg', 'info@unigame.it', 10, '24.99', '0.40', 4, 2, '2019-08-15', '14.99', 'Ispirato al prossimo Disney Pixar film d\'animazione, Cars 2: il videogioco permette ai giocatori di tuffarsi nell’universo di Cars 2 con alcuni dei loro personaggi preferiti, in località esotiche in giro per il mondo.Continuando la trama del film di prossima uscita, i giocatori possono scegliere di giocare come Mater e SaettaMcQueen, così come alcuni personaggi, nuovi di zecca che si allenano nel centro di formazione internazionale - CHROME (Comparto Hi-security per Ricognizioni e Operazioni Motorizzate Extrasegrete) per diventare spie di classe mondiale.'),
(8, 'Fifa 20', 'Fifa20.jpeg', 'info@unigame.it', 2, '9.99', '0.00', 5, 2, '2019-10-19', '9.99', 'Ispirato al prossimo Disney Pixar film d\'animazione, Cars 2: il videogioco permette ai giocatori di tuffarsi nell’universo di Cars 2 con alcuni dei loro personaggi preferiti, in località esotiche in giro per il mondo.Continuando la trama del film di prossima uscita, i giocatori possono scegliere di giocare come Mater e SaettaMcQueen, così come alcuni personaggi, nuovi di zecca che si allenano nel centro di formazione internazionale - CHROME (Comparto Hi-security per Ricognizioni e Operazioni Motorizzate Extrasegrete) per diventare spie di classe mondiale.'),
(9, 'Crash Bandicoot', 'Crash.jpeg', 'info@unigame.it', 20, '24.99', '0.00', 5, 3, '2021-05-13', '24.99', 'It\'s About Time - il nuovissimo gioco di Crash Bandicoot™! Parti per un\'avventura oltre i confini del tempo in compagnia dei tuoi marsupiali preferiti.\r\n\r\nNeo Cortex e N. Tropy sono tornati e questa volta non hanno preso di mira solo questo universo, ma l\'intero multiverso! Crash e Coco dovranno rimettere al loro posto le quattro maschere quantiche e piegare le leggi della realtà per salvare... gli universi!\r\n\r\nNuove abilità? Ci sono. Più personaggi giocabili? Eccoli. Dimensioni alternative? Non potrebbero mancare. Boss improponibili? Sono già pronti. La solita, incredibile impertinenza? Ci puoi scommettere le mutande. Un secondo, sono davvero mutande? Non in questo universo!'),
(10, 'SpiderMan', 'SpiderMan.jpeg', 'info@unigame.it', 2, '9.99', '0.00', 5, 4, '2017-11-30', '9.99', 'Una nuova avventura promette di ridare slancio ai videogiochi basati sull’intramontabile Uomo Ragno.\r\nQuesto nuovo capitolo mette da parte la collaudata struttura dei precedenti episodi per tentare vie inedite e alternative. Il nostro eroe si troverà infatti alle prese con ben 4 universi paralleli del tutto diversi nei quali vivono 4 Spiderman dai poteri unici.\r\nOgnuno dei quattro stupefacenti universi vanta un\'atmosfera e un\'ambientazione uniche. Spider-Man dovrà perciò passare da una dimensione all’altra nel tentativo di recuperare un antico manufatto in grado, grazie al suo antico potere, di salvare il mondo e ristabilire l’ordine nel continuum spazio-temporale.'),
(11, 'Mario Galaxy 2', 'MarioGalaxy.png', 'info@unigame.it', 2, '9.99', '0.30', 6, 1, '2019-06-15', '6.99', 'Accompagna l\'impareggiabile Mario in un viaggio tra meravigliosi pianeti dove ti attendono nuovi trabocchetti e pericoli di ogni sorta, in Super Mario Galaxy 2!\r\n\r\nÈ di nuovo tempo di celebrare il Festival delle Stelle, un evento che si verifica solo ogni cento anni e durante il quale il Regno dei Funghi viene investito da una pioggia di stelle cadenti. Invitato dalla Principessa Peach, Mario si dirige al castello accompagnato da una giovane stella smarrita incontrata vagando per la galassia. Ma quando Mario giunge al castello è già troppo tardi. Bowser si è impossessato del potere delle stelle e ha rapito la povera Peach. Comincia così un\'epica avventura nello spazio per salvare Peach...'),
(12, 'Minecraft', 'Minecraft.png', 'info@unigame.it', 4, '9.99', '0.20', 4, 2, '2015-06-24', '7.99', 'Un gioco di azione e avventura tutto nuovo, ispirato ai classici dungeon crawler.\r\nAffronta nuovi terribili mob in un gioco di azione e avventura tutto nuovo, ispirato ai classici dungeon crawler.\r\nFino a quattro giocatori possono collaborare e combattere insieme in modalità cooperativa locale e online.\r\nSblocca decine di oggetti unici e incantesimi per le armi per devastanti attacchi speciali.\r\nEsplora livelli pieni di tesori in una missione per abbattere il malvagio Arch-Illager!\r\nPersonalizza il tuo personaggio, quindi lanciati in combattimenti ravvicinati, arretra con attacchi a distanza o apriti la strada attraverso sciami di mob protetto da una pesante armatura!'),
(13, 'Mortal Kombat 11', 'MortalCombat.png', 'info@unigame.it', 12, '39.99', '0.00', 3, 4, '2021-07-30', '39.99', 'La celeberrima saga di Mortal Kombat è tornata con un nuovo capitolo... ed è più entusiasmante che mai. Le innovative varianti di personalizzazione dei personaggi ti forniscono un\'inedita libertà d\'azione per dotare i tuoi lottatori delle caratteristiche che desideri. Il nuovo motore grafico mette in risalto tutte le peculiarità degli scontri più violenti, dandoti l\'impressione di trovarti nel vivo della lotta. Prosegue inoltre la fenomenale modalità storia a filmati della serie, che vede protagonisti sia vecchie conoscenze che nuovi combattenti e si appresta a lasciare a bocca aperta gli appassionati di questa saga che si protrae da oltre 25 anni.'),
(14, 'Mortal Kombat 11', 'MortalCombat.png', 'info@unigame.it', 12, '39.99', '0.00', 6, 4, '2021-07-30', '39.99', 'La celeberrima saga di Mortal Kombat è tornata con un nuovo capitolo... ed è più entusiasmante che mai. Le innovative varianti di personalizzazione dei personaggi ti forniscono un\'inedita libertà d\'azione per dotare i tuoi lottatori delle caratteristiche che desideri. Il nuovo motore grafico mette in risalto tutte le peculiarità degli scontri più violenti, dandoti l\'impressione di trovarti nel vivo della lotta. Prosegue inoltre la fenomenale modalità storia a filmati della serie, che vede protagonisti sia vecchie conoscenze che nuovi combattenti e si appresta a lasciare a bocca aperta gli appassionati di questa saga che si protrae da oltre 25 anni.'),
(15, 'Nemo', 'Nemo.png', 'info@unigame.it', 5, '4.99', '0.00', 4, 2, '2016-06-10', '4.99', 'Dopo anni di vita in acquario, i membri della TANK GANG hanno deciso di provare la fuga via Oceano. Per raggiungerlo devono passare attraverso il giardino del dentista, attraversare una trada trafficatissima ed eseguire un sacco di altre pericolose manovre. Ci sono spine molto pericolose, buche, auto e molte altre minacce.\r\nIl giocatore dovrà aiutare ciascuno dei componenti la Tank Gang a raggiungere il mare aperto.\r\nDa lì, il passo verso la casa di corallo sarà brevissimo.'),
(16, 'Nemo', 'Nemo.png', 'info@unigame.it', 5, '4.99', '0.00', 5, 2, '2016-06-10', '4.99', 'Dopo anni di vita in acquario, i membri della TANK GANG hanno deciso di provare la fuga via Oceano. Per raggiungerlo devono passare attraverso il giardino del dentista, attraversare una trada trafficatissima ed eseguire un sacco di altre pericolose manovre. Ci sono spine molto pericolose, buche, auto e molte altre minacce.\r\nIl giocatore dovrà aiutare ciascuno dei componenti la Tank Gang a raggiungere il mare aperto.\r\nDa lì, il passo verso la casa di corallo sarà brevissimo.'),
(17, 'One piece 4', 'OnePiece.png', 'info@unigame.it', 15, '59.99', '0.00', 1, 3, '2021-11-10', '59.99', 'I pirati sono tornati e portano con sé una storia più esplosiva, più ambienti di gioco, e attacchi ancora più pazzeschi in ONE PIECE: PIRATE WARRIOS 4. Segui Rufy e i pirati di Cappello di paglia sin dall\'inizio, nel loro viaggio attraverso una moltitudine di isole per trovare il famoso tesoro: lo One Piece. Gioca su alcune delle isole e degli ambienti più straordinari della storia di ONE PIECE e sfida nemici memorabili.'),
(18, 'One piece 4', 'OnePiece.png', 'info@unigame.it', 15, '59.99', '0.00', 2, 3, '2021-11-10', '59.99', 'I pirati sono tornati e portano con sé una storia più esplosiva, più ambienti di gioco, e attacchi ancora più pazzeschi in ONE PIECE: PIRATE WARRIOS 4. Segui Rufy e i pirati di Cappello di paglia sin dall\'inizio, nel loro viaggio attraverso una moltitudine di isole per trovare il famoso tesoro: lo One Piece. Gioca su alcune delle isole e degli ambienti più straordinari della storia di ONE PIECE e sfida nemici memorabili.'),
(19, 'SpiderMan Ultimate', 'SpiderMan.png', 'info@unigame.it', 8, '39.99', '0.00', 2, 4, '2020-11-11', '39.99', 'Nell\'ultima avventura dell\'universo di Marvel\'s Spider-Man, l\'adolescente Miles Morales affronta il trasloco nella sua nuova casa mentre segue le orme del suo mentore, Peter Parker, per diventare il nuovo Spider-Man. Quando una feroce forza minaccia di distruggere la sua nuova casa, l\'aspirante eroe comprende che da grandi poteri, derivano grandi responsabilità. Per salvare la New York della Marvel, Miles deve indossare il costume di Spider-Man e guadagnarselo.'),
(20, 'SpiderMan Ultimate', 'SpiderMan.png', 'info@unigame.it', 8, '39.99', '0.00', 3, 4, '2020-11-11', '39.99', 'Nell\'ultima avventura dell\'universo di Marvel\'s Spider-Man, l\'adolescente Miles Morales affronta il trasloco nella sua nuova casa mentre segue le orme del suo mentore, Peter Parker, per diventare il nuovo Spider-Man. Quando una feroce forza minaccia di distruggere la sua nuova casa, l\'aspirante eroe comprende che da grandi poteri, derivano grandi responsabilità. Per salvare la New York della Marvel, Miles deve indossare il costume di Spider-Man e guadagnarselo.'),
(21, 'SpiderMan 2', 'SpiderMan2.png', 'info@unigame.it', 6, '13.99', '0.00', 5, 4, '2019-07-01', '13.99', 'Scatena i poteri di Spider-Man in tutta Manhattan! Ambientato poco dopo gli eventi del nuovo film della Columbia Pictures, The Amazing Spider-Man riporta nel vivo dell\'azione l\'eroe di New York in un gioco ricco di libertà* e azione a suon di ragnatele. Proteggi la Grande Mela da incredibili minacce! Il trionfante ritorno di Spider-Man a New York. Il ragno più amato del mondo torna a Manhattan con uno stile di gioco consolidato, ricco di azione in libertà e di ragnatele in grado di raggiungere anche gli angoli più remoti della città. Evoluzione delle scelte del giocatore I giocatori potranno compiere delle scelte in tempo reale per lottare contro il crimine e cimentarsi nelle mosse acrobatiche di Spider-Man come mai prima d\'ora.'),
(22, 'SpiderMan 2', 'SpiderMan2.png', 'info@unigame.it', 6, '13.99', '0.00', 6, 4, '2019-07-01', '13.99', 'Scatena i poteri di Spider-Man in tutta Manhattan! Ambientato poco dopo gli eventi del nuovo film della Columbia Pictures, The Amazing Spider-Man riporta nel vivo dell\'azione l\'eroe di New York in un gioco ricco di libertà* e azione a suon di ragnatele. Proteggi la Grande Mela da incredibili minacce! Il trionfante ritorno di Spider-Man a New York. Il ragno più amato del mondo torna a Manhattan con uno stile di gioco consolidato, ricco di azione in libertà e di ragnatele in grado di raggiungere anche gli angoli più remoti della città. Evoluzione delle scelte del giocatore I giocatori potranno compiere delle scelte in tempo reale per lottare contro il crimine e cimentarsi nelle mosse acrobatiche di Spider-Man come mai prima d\'ora.'),
(23, 'Zelda', 'Zelda.png', 'info@unigame.it', 10, '5.99', '0.00', 6, 1, '2018-02-07', '5.99', 'A 26 anni di distanza dalla sua pubblicazione, il classico per Game Boy The Legend of Zelda: Link\'s Awakening rinasce su Nintendo Switch.\r\n\r\nSballottato da una terribile tempesta, Link naufraga sulla misteriosa Isola Koholint. Per tornare a casa, dovrà attraversare dungeon pericolosi e affrontare temibili mostri.\r\n\r\nQuesta nuova versione dell\'avventura include tanti degli elementi unici presenti nel gioco originale per Game Boy, come le stanze in stile platform 2D e i camei di personaggi che non fanno parte della serie The Legend of Zelda.');

-- --------------------------------------------------------

--
-- Struttura della tabella `Sotto_categoria`
--

CREATE TABLE `Sotto_categoria` (
  `Id_sottocategoria` int(11) NOT NULL,
  `Descrizione` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `path` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Sotto_categoria`
--

INSERT INTO `Sotto_categoria` (`Id_sottocategoria`, `Descrizione`, `Id_categoria`, `path`) VALUES
(1, 'PS4', 1, 'PS'),
(2, 'PS5', 1, 'PS'),
(3, 'Xbox One', 2, 'Xbox'),
(4, 'Xbox 360', 2, 'Xbox'),
(5, 'PC', 4, 'PC'),
(6, 'Switch', 3, 'Switch');

-- --------------------------------------------------------

--
-- Struttura della tabella `Status_ordine`
--

CREATE TABLE `Status_ordine` (
  `Id_status` int(11) NOT NULL,
  `Descrizione status` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Status_ordine`
--

INSERT INTO `Status_ordine` (`Id_status`, `Descrizione status`) VALUES
(1, 'effettuato'),
(2, 'in lavorazione'),
(3, 'in arrivo'),
(4, 'spedito'),
(5, 'transito'),
(6, 'stabilimento'),
(7, 'in consegna'),
(8, 'consegnato');

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Cognome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Password` char(128) CHARACTER SET utf8 NOT NULL,
  `Salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`Nome`, `Cognome`, `Email`, `Password`, `Salt`) VALUES
('Giacomo', 'Totaro', 'gek5800@gmail.com', '389aba55868bc36cb520ba741708d11d98453bc45714895866ccc41b728fb02ed87e4606bc76ce5bbc7c90f49cb000701060e857b68c6694375b01321488b777', 'bcfd9768da4a09e095d08e1758326212c03fd95eda2b35cc1e41dcffb143223ff87708e3cec9cf7454f59073333a64e5cd7489184258ef08d23d6c085127abc7');

-- --------------------------------------------------------

--
-- Struttura della tabella `Venditore`
--

CREATE TABLE `Venditore` (
  `Email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Password` char(128) CHARACTER SET utf8 NOT NULL,
  `Salt` char(128) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Cognome` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Venditore`
--

INSERT INTO `Venditore` (`Email`, `Password`, `Salt`, `Nome`, `Cognome`) VALUES
('info@unigame.it', 'c424f567641d966c64cc26600487c6fde4d8fdf70c5bbb2a5a06ac1735cc029c6e1e23fcb08ee3a82e937550d7940c9a58dc83d7795600233674ff937190d6cc', '04fbffce85fea47dba020b879dc6ca5a0fa68f8e1e22388418e81b7718b5000754df5505685135bcf1aaa536d0853127e81f80759a8009c45c6809a3c7c98c1a', 'UNI', 'GAME');

-- --------------------------------------------------------

--
-- Struttura della tabella `Wishlist`
--

CREATE TABLE `Wishlist` (
  `Id_utente` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_prodotto` int(11) NOT NULL,
  `Piace` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Wishlist`
--

INSERT INTO `Wishlist` (`Id_utente`, `Id_prodotto`, `Piace`) VALUES
('gek5800@gmail.com', 1, 1),
('gek5800@gmail.com', 2, 1),
('gek5800@gmail.com', 5, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Carrello`
--
ALTER TABLE `Carrello`
  ADD PRIMARY KEY (`Id_utente`,`Id_prodotto`),
  ADD KEY `Id_prodotto` (`Id_prodotto`);

--
-- Indici per le tabelle `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`Id_categoria`),
  ADD UNIQUE KEY `Icona` (`Icona`);

--
-- Indici per le tabelle `Dettagli_ordine`
--
ALTER TABLE `Dettagli_ordine`
  ADD PRIMARY KEY (`Id_ordine`,`Id_prodotto`) USING BTREE,
  ADD KEY `Id_prodotto` (`Id_prodotto`);

--
-- Indici per le tabelle `Metodo_pagamento`
--
ALTER TABLE `Metodo_pagamento`
  ADD PRIMARY KEY (`Id_metodo`);

--
-- Indici per le tabelle `Notifica`
--
ALTER TABLE `Notifica`
  ADD PRIMARY KEY (`Id_notifica`);

--
-- Indici per le tabelle `Notifica_Utente`
--
ALTER TABLE `Notifica_Utente`
  ADD PRIMARY KEY (`Id_utente`,`Id_notifica`,`Id_ordine`) USING BTREE,
  ADD KEY `Id_notifica` (`Id_notifica`),
  ADD KEY `Id_ordine` (`Id_ordine`);

--
-- Indici per le tabelle `Ordine`
--
ALTER TABLE `Ordine`
  ADD PRIMARY KEY (`Id_ordine`),
  ADD KEY `Id_metodo` (`Id_metodo`),
  ADD KEY `Id_status` (`Id_status`),
  ADD KEY `Id_utente` (`Id_utente`);

--
-- Indici per le tabelle `Pegi`
--
ALTER TABLE `Pegi`
  ADD PRIMARY KEY (`Id_pegi`);

--
-- Indici per le tabelle `Prodotto`
--
ALTER TABLE `Prodotto`
  ADD PRIMARY KEY (`Id_prodotto`),
  ADD KEY `Id_sottocategoria` (`Id_sottocategoria`),
  ADD KEY `Id_pegi` (`Id_pegi`),
  ADD KEY `Id_venditore` (`Id_venditore`);

--
-- Indici per le tabelle `Sotto_categoria`
--
ALTER TABLE `Sotto_categoria`
  ADD PRIMARY KEY (`Id_sottocategoria`),
  ADD KEY `Id_categoria` (`Id_categoria`);

--
-- Indici per le tabelle `Status_ordine`
--
ALTER TABLE `Status_ordine`
  ADD PRIMARY KEY (`Id_status`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`Email`);

--
-- Indici per le tabelle `Venditore`
--
ALTER TABLE `Venditore`
  ADD PRIMARY KEY (`Email`);

--
-- Indici per le tabelle `Wishlist`
--
ALTER TABLE `Wishlist`
  ADD PRIMARY KEY (`Id_utente`,`Id_prodotto`),
  ADD KEY `Id_prodotto` (`Id_prodotto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `Metodo_pagamento`
--
ALTER TABLE `Metodo_pagamento`
  MODIFY `Id_metodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `Notifica`
--
ALTER TABLE `Notifica`
  MODIFY `Id_notifica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=812;

--
-- AUTO_INCREMENT per la tabella `Ordine`
--
ALTER TABLE `Ordine`
  MODIFY `Id_ordine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `Pegi`
--
ALTER TABLE `Pegi`
  MODIFY `Id_pegi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  MODIFY `Id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT per la tabella `Sotto_categoria`
--
ALTER TABLE `Sotto_categoria`
  MODIFY `Id_sottocategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `Status_ordine`
--
ALTER TABLE `Status_ordine`
  MODIFY `Id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Carrello`
--
ALTER TABLE `Carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`Id_prodotto`) REFERENCES `Prodotto` (`Id_prodotto`),
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`Id_utente`) REFERENCES `Utente` (`Email`);

--
-- Limiti per la tabella `Dettagli_ordine`
--
ALTER TABLE `Dettagli_ordine`
  ADD CONSTRAINT `dettagli_ordine_ibfk_1` FOREIGN KEY (`Id_ordine`) REFERENCES `Ordine` (`Id_ordine`),
  ADD CONSTRAINT `dettagli_ordine_ibfk_2` FOREIGN KEY (`Id_prodotto`) REFERENCES `Prodotto` (`Id_prodotto`);

--
-- Limiti per la tabella `Notifica_Utente`
--
ALTER TABLE `Notifica_Utente`
  ADD CONSTRAINT `notifica_utente_ibfk_1` FOREIGN KEY (`Id_notifica`) REFERENCES `Notifica` (`Id_notifica`),
  ADD CONSTRAINT `notifica_utente_ibfk_2` FOREIGN KEY (`Id_utente`) REFERENCES `Utente` (`Email`),
  ADD CONSTRAINT `notifica_utente_ibfk_3` FOREIGN KEY (`Id_ordine`) REFERENCES `Ordine` (`Id_ordine`);

--
-- Limiti per la tabella `Ordine`
--
ALTER TABLE `Ordine`
  ADD CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`Id_metodo`) REFERENCES `Metodo_pagamento` (`Id_metodo`),
  ADD CONSTRAINT `ordine_ibfk_5` FOREIGN KEY (`Id_status`) REFERENCES `Status_ordine` (`Id_status`),
  ADD CONSTRAINT `ordine_ibfk_6` FOREIGN KEY (`Id_utente`) REFERENCES `Utente` (`Email`);

--
-- Limiti per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  ADD CONSTRAINT `prodotto_ibfk_4` FOREIGN KEY (`Id_sottocategoria`) REFERENCES `Sotto_categoria` (`Id_sottocategoria`),
  ADD CONSTRAINT `prodotto_ibfk_5` FOREIGN KEY (`Id_pegi`) REFERENCES `Pegi` (`Id_pegi`),
  ADD CONSTRAINT `prodotto_ibfk_6` FOREIGN KEY (`Id_venditore`) REFERENCES `Venditore` (`Email`);

--
-- Limiti per la tabella `Sotto_categoria`
--
ALTER TABLE `Sotto_categoria`
  ADD CONSTRAINT `sotto_categoria_ibfk_1` FOREIGN KEY (`Id_categoria`) REFERENCES `Categoria` (`Id_categoria`);

--
-- Limiti per la tabella `Wishlist`
--
ALTER TABLE `Wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`Id_prodotto`) REFERENCES `Prodotto` (`Id_prodotto`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`Id_utente`) REFERENCES `Utente` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
