-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 08, 2021 alle 15:38
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
-- Struttura della tabella `Categoria`
--

CREATE TABLE `Categoria` (
  `Id_categoria` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Icona` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Categoria`
--

INSERT INTO `Categoria` (`Id_categoria`, `Nome`, `Icona`) VALUES
(1, 'Playstation', 'http://localhost/07-lab-php/html/img/accessibility.jpg'),
(2, 'Xbox', 'http://localhost/07-lab-php/html/img/php.png'),
(3, 'Nintendo Switch', 'http://localhost/07-lab-php/html/img/html5-js-css3.png'),
(4, 'PC', 'http://localhost/06-lab-php/sito/img/html5-js-css3.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `Corriere`
--

CREATE TABLE `Corriere` (
  `Id_corriere` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Corriere`
--

INSERT INTO `Corriere` (`Id_corriere`, `Nome`) VALUES
(1, 'Bartolini S.P.A.');

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
(1, 2, 2, '19.99');

-- --------------------------------------------------------

--
-- Struttura della tabella `Magazzino`
--

CREATE TABLE `Magazzino` (
  `Id_magazzino` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Magazzino`
--

INSERT INTO `Magazzino` (`Id_magazzino`, `Nome`) VALUES
(1, 'UniGame negozio');

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
-- Struttura della tabella `Ordine`
--

CREATE TABLE `Ordine` (
  `Id_ordine` int(11) NOT NULL,
  `Data_ordine` date NOT NULL,
  `Id_utente` varchar(16) CHARACTER SET utf8 NOT NULL,
  `Id_corriere` int(11) NOT NULL,
  `Data_spedizione` date DEFAULT NULL,
  `Via` varchar(300) CHARACTER SET utf8 NOT NULL,
  `Civico` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Città` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Provincia` varchar(5) CHARACTER SET utf8 NOT NULL,
  `CAP` varchar(5) CHARACTER SET utf8 NOT NULL,
  `Nome_indirizzo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_metodo` int(11) NOT NULL,
  `Id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Ordine`
--

INSERT INTO `Ordine` (`Id_ordine`, `Data_ordine`, `Id_utente`, `Id_corriere`, `Data_spedizione`, `Via`, `Civico`, `Città`, `Provincia`, `CAP`, `Nome_indirizzo`, `Id_metodo`, `Id_status`) VALUES
(1, '2021-12-08', 'TTRGCM00T10D643G', 1, NULL, 'Via Cesare Pavese', '50', 'Cesena', 'FC', '47521', 'Giacomo Totaro', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Prodotto`
--

CREATE TABLE `Prodotto` (
  `Id_prodotto` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Url_immagine` varchar(300) NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `Id_venditore` int(11) NOT NULL,
  `Unità` int(5) NOT NULL,
  `Prezzo` decimal(10,2) NOT NULL,
  `Sconto_%` int(2) DEFAULT NULL,
  `Id_magazzino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Prodotto`
--

INSERT INTO `Prodotto` (`Id_prodotto`, `Nome`, `Url_immagine`, `Id_categoria`, `Id_venditore`, `Unità`, `Prezzo`, `Sconto_%`, `Id_magazzino`) VALUES
(1, 'Far Cry 5', 'http://localhost/06-lab-php/sito/img/html5-js-css3.png', 1, 1, 15, '24.99', NULL, 1),
(2, 'The Last of Us', 'http://localhost/06-lab-php/sito/img/accessibility.jpg', 3, 1, 10, '19.99', NULL, 1);

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
(1, 'In sospeso'),
(2, 'In lavorazione'),
(3, 'Spedito'),
(4, 'In transito'),
(5, 'Consegnato');

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `Codice Fiscale` varchar(16) CHARACTER SET utf8 NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Cognome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `E-mail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Tipo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`Codice Fiscale`, `Nome`, `Cognome`, `E-mail`, `Tipo`, `Username`, `Password`) VALUES
('TTRGCM00T10D643G', 'Giacomo', 'Totaro', 'giacomo.totaro2@studio.unibo.it', 'Registrato', 'totti00', 'giacomototaro');

-- --------------------------------------------------------

--
-- Struttura della tabella `Venditore`
--

CREATE TABLE `Venditore` (
  `Id_venditore` int(11) NOT NULL,
  `Partita Iva` bigint(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_corriere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Venditore`
--

INSERT INTO `Venditore` (`Id_venditore`, `Partita Iva`, `Nome`, `Id_corriere`) VALUES
(1, 59532570617, 'UniGame S.R.L.', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Wishlist`
--

CREATE TABLE `Wishlist` (
  `CF_utente` varchar(16) CHARACTER SET utf8 NOT NULL,
  `Id_prodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Wishlist`
--

INSERT INTO `Wishlist` (`CF_utente`, `Id_prodotto`) VALUES
('TTRGCM00T10D643G', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`Id_categoria`),
  ADD UNIQUE KEY `Icona` (`Icona`);

--
-- Indici per le tabelle `Corriere`
--
ALTER TABLE `Corriere`
  ADD PRIMARY KEY (`Id_corriere`);

--
-- Indici per le tabelle `Dettagli_ordine`
--
ALTER TABLE `Dettagli_ordine`
  ADD PRIMARY KEY (`Id_ordine`,`Id_prodotto`) USING BTREE,
  ADD KEY `Id_prodotto` (`Id_prodotto`);

--
-- Indici per le tabelle `Magazzino`
--
ALTER TABLE `Magazzino`
  ADD PRIMARY KEY (`Id_magazzino`);

--
-- Indici per le tabelle `Metodo_pagamento`
--
ALTER TABLE `Metodo_pagamento`
  ADD PRIMARY KEY (`Id_metodo`);

--
-- Indici per le tabelle `Ordine`
--
ALTER TABLE `Ordine`
  ADD PRIMARY KEY (`Id_ordine`),
  ADD KEY `Id_corriere` (`Id_corriere`),
  ADD KEY `Id_metodo` (`Id_metodo`),
  ADD KEY `Id_utente` (`Id_utente`),
  ADD KEY `Id_status` (`Id_status`);

--
-- Indici per le tabelle `Prodotto`
--
ALTER TABLE `Prodotto`
  ADD PRIMARY KEY (`Id_prodotto`),
  ADD KEY `prodotto_categoria_1` (`Id_categoria`),
  ADD KEY `Id_venditore` (`Id_venditore`),
  ADD KEY `Id_magazzino` (`Id_magazzino`);

--
-- Indici per le tabelle `Status_ordine`
--
ALTER TABLE `Status_ordine`
  ADD PRIMARY KEY (`Id_status`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`Codice Fiscale`),
  ADD UNIQUE KEY `E-mail` (`E-mail`);

--
-- Indici per le tabelle `Venditore`
--
ALTER TABLE `Venditore`
  ADD PRIMARY KEY (`Id_venditore`),
  ADD UNIQUE KEY `Partita Iva` (`Partita Iva`),
  ADD KEY `Id_corriere` (`Id_corriere`);

--
-- Indici per le tabelle `Wishlist`
--
ALTER TABLE `Wishlist`
  ADD PRIMARY KEY (`Id_prodotto`,`CF_utente`) USING BTREE;

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `Corriere`
--
ALTER TABLE `Corriere`
  MODIFY `Id_corriere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `Magazzino`
--
ALTER TABLE `Magazzino`
  MODIFY `Id_magazzino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `Metodo_pagamento`
--
ALTER TABLE `Metodo_pagamento`
  MODIFY `Id_metodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `Ordine`
--
ALTER TABLE `Ordine`
  MODIFY `Id_ordine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  MODIFY `Id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `Status_ordine`
--
ALTER TABLE `Status_ordine`
  MODIFY `Id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `Venditore`
--
ALTER TABLE `Venditore`
  MODIFY `Id_venditore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Dettagli_ordine`
--
ALTER TABLE `Dettagli_ordine`
  ADD CONSTRAINT `dettagli_ordine_ibfk_1` FOREIGN KEY (`Id_ordine`) REFERENCES `Ordine` (`Id_ordine`),
  ADD CONSTRAINT `dettagli_ordine_ibfk_2` FOREIGN KEY (`Id_prodotto`) REFERENCES `Prodotto` (`Id_prodotto`);

--
-- Limiti per la tabella `Ordine`
--
ALTER TABLE `Ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`Id_corriere`) REFERENCES `Corriere` (`Id_corriere`),
  ADD CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`Id_metodo`) REFERENCES `Metodo_pagamento` (`Id_metodo`),
  ADD CONSTRAINT `ordine_ibfk_4` FOREIGN KEY (`Id_utente`) REFERENCES `Utente` (`Codice Fiscale`),
  ADD CONSTRAINT `ordine_ibfk_5` FOREIGN KEY (`Id_status`) REFERENCES `Status_ordine` (`Id_status`);

--
-- Limiti per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  ADD CONSTRAINT `prodotto_categoria_1` FOREIGN KEY (`Id_categoria`) REFERENCES `categoria` (`Id_categoria`),
  ADD CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`Id_venditore`) REFERENCES `Venditore` (`Id_venditore`),
  ADD CONSTRAINT `prodotto_ibfk_2` FOREIGN KEY (`Id_magazzino`) REFERENCES `Magazzino` (`Id_magazzino`);

--
-- Limiti per la tabella `Venditore`
--
ALTER TABLE `Venditore`
  ADD CONSTRAINT `venditore_ibfk_1` FOREIGN KEY (`Id_corriere`) REFERENCES `Corriere` (`Id_corriere`);

--
-- Limiti per la tabella `Wishlist`
--
ALTER TABLE `Wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`Id_prodotto`) REFERENCES `Prodotto` (`Id_prodotto`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`CF_utente`) REFERENCES `Utente` (`Codice Fiscale`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
