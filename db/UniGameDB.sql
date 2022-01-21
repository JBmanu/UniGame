-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 21, 2022 alle 16:14
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
(4, 'ricevuto'),
(5, 'spedito'),
(6, 'in transito'),
(7, 'arrivato allo stabilimento');

-- --------------------------------------------------------

--
-- Struttura della tabella `Notifica_Utente`
--

CREATE TABLE `Notifica_Utente` (
  `Id_utente` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_notifica` int(11) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Notifica_Venditore`
--

CREATE TABLE `Notifica_Venditore` (
  `Email_venditore` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_notifica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Notifica_Venditore`
--

INSERT INTO `Notifica_Venditore` (`Email_venditore`, `Id_notifica`) VALUES
('info@unigame.it', 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `Ordine`
--

CREATE TABLE `Ordine` (
  `Id_ordine` int(11) NOT NULL,
  `Data_ordine` date NOT NULL,
  `Id_utente` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_corriere` int(11) NOT NULL,
  `Data_spedizione` date DEFAULT NULL,
  `Via` varchar(300) CHARACTER SET utf8 NOT NULL,
  `Civico` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Città` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Provincia` varchar(5) CHARACTER SET utf8 NOT NULL,
  `CAP` varchar(5) CHARACTER SET utf8 NOT NULL,
  `Nome_indirizzo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_metodo` int(11) NOT NULL,
  `Id_status` int(11) NOT NULL,
  `Data_consegna` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Ordine`
--

INSERT INTO `Ordine` (`Id_ordine`, `Data_ordine`, `Id_utente`, `Id_corriere`, `Data_spedizione`, `Via`, `Civico`, `Città`, `Provincia`, `CAP`, `Nome_indirizzo`, `Id_metodo`, `Id_status`, `Data_consegna`) VALUES
(1, '2021-12-08', 'gek5800@gmail.com', 1, NULL, 'Via Cesare Pavese', '50', 'Cesena', 'FC', '47521', 'Giacomo Totaro', 1, 1, '2022-02-16');

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
(1, './/akd.jpeg', 'Pegi 12');

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
  `Id_magazzino` int(11) NOT NULL,
  `Id_sottocategoria` int(11) NOT NULL,
  `Id_pegi` int(11) NOT NULL,
  `Data_rilascio` date NOT NULL,
  `prezzo_scontato` decimal(10,2) NOT NULL,
  `Nuovo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Prodotto`
--

INSERT INTO `Prodotto` (`Id_prodotto`, `Nome`, `Url_immagine`, `Id_venditore`, `Unità`, `Prezzo`, `Sconto`, `Id_magazzino`, `Id_sottocategoria`, `Id_pegi`, `Data_rilascio`, `prezzo_scontato`, `Nuovo`) VALUES
(1, 'Far Cry 5', 'FarCry5ps4.jpeg', 'info@unigame.it', 15, '24.99', '0.00', 1, 1, 1, '2020-01-14', '24.99', 1),
(2, 'The Last of Us II', 'TheLastOfUs2pc.jpeg', 'info@unigame.it', 10, '19.99', '0.20', 1, 5, 1, '2017-11-18', '15.99', 1),
(3, 'Call of Duty Black Ops II', 'BO2ps4.jpeg', 'info@unigame.it', 5, '19.99', '0.00', 1, 1, 1, '2014-07-19', '19.99', 1),
(4, 'Fifa 22', 'Fifa22ps4.jpeg', 'info@unigame.it', 20, '49.99', '0.30', 1, 1, 1, '2021-09-24', '34.99', 0),
(5, 'GTA V', 'GTAVps4.jpg', 'info@unigame.it', 7, '29.99', '0.00', 1, 1, 1, '2016-10-21', '29.99', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Sotto_categoria`
--

CREATE TABLE `Sotto_categoria` (
  `Id_sottocategoria` int(11) NOT NULL,
  `Descrizione` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Sotto_categoria`
--

INSERT INTO `Sotto_categoria` (`Id_sottocategoria`, `Descrizione`, `Id_categoria`) VALUES
(1, 'PS4', 1),
(2, 'PS5', 1),
(3, 'Xbox One', 2),
(4, 'Xbox 360', 2),
(5, 'PC', 4),
(6, 'switch', 3);

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
  `Cognome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Id_corriere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Venditore`
--

INSERT INTO `Venditore` (`Email`, `Password`, `Salt`, `Nome`, `Cognome`, `Id_corriere`) VALUES
('info@unigame.it', 'c424f567641d966c64cc26600487c6fde4d8fdf70c5bbb2a5a06ac1735cc029c6e1e23fcb08ee3a82e937550d7940c9a58dc83d7795600233674ff937190d6cc', '04fbffce85fea47dba020b879dc6ca5a0fa68f8e1e22388418e81b7718b5000754df5505685135bcf1aaa536d0853127e81f80759a8009c45c6809a3c7c98c1a', 'UNI', 'GAME', 1);

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
-- Indici per le tabelle `Notifica`
--
ALTER TABLE `Notifica`
  ADD PRIMARY KEY (`Id_notifica`);

--
-- Indici per le tabelle `Notifica_Utente`
--
ALTER TABLE `Notifica_Utente`
  ADD PRIMARY KEY (`Id_utente`,`Id_notifica`),
  ADD KEY `Id_notifica` (`Id_notifica`);

--
-- Indici per le tabelle `Notifica_Venditore`
--
ALTER TABLE `Notifica_Venditore`
  ADD PRIMARY KEY (`Email_venditore`,`Id_notifica`),
  ADD KEY `Id_notifica` (`Id_notifica`);

--
-- Indici per le tabelle `Ordine`
--
ALTER TABLE `Ordine`
  ADD PRIMARY KEY (`Id_ordine`),
  ADD KEY `Id_corriere` (`Id_corriere`),
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
  ADD KEY `Id_magazzino` (`Id_magazzino`),
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
  ADD PRIMARY KEY (`Email`),
  ADD KEY `Id_corriere` (`Id_corriere`);

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
-- AUTO_INCREMENT per la tabella `Notifica`
--
ALTER TABLE `Notifica`
  MODIFY `Id_notifica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `Ordine`
--
ALTER TABLE `Ordine`
  MODIFY `Id_ordine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `Pegi`
--
ALTER TABLE `Pegi`
  MODIFY `Id_pegi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  MODIFY `Id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `Sotto_categoria`
--
ALTER TABLE `Sotto_categoria`
  MODIFY `Id_sottocategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `Status_ordine`
--
ALTER TABLE `Status_ordine`
  MODIFY `Id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Limiti per la tabella `Notifica_Utente`
--
ALTER TABLE `Notifica_Utente`
  ADD CONSTRAINT `notifica_utente_ibfk_1` FOREIGN KEY (`Id_notifica`) REFERENCES `Notifica` (`Id_notifica`),
  ADD CONSTRAINT `notifica_utente_ibfk_2` FOREIGN KEY (`Id_utente`) REFERENCES `Utente` (`Email`);

--
-- Limiti per la tabella `Notifica_Venditore`
--
ALTER TABLE `Notifica_Venditore`
  ADD CONSTRAINT `notifica_venditore_ibfk_1` FOREIGN KEY (`Email_venditore`) REFERENCES `Venditore` (`Email`),
  ADD CONSTRAINT `notifica_venditore_ibfk_2` FOREIGN KEY (`Id_notifica`) REFERENCES `Notifica` (`Id_notifica`);

--
-- Limiti per la tabella `Ordine`
--
ALTER TABLE `Ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`Id_corriere`) REFERENCES `Corriere` (`Id_corriere`),
  ADD CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`Id_metodo`) REFERENCES `Metodo_pagamento` (`Id_metodo`),
  ADD CONSTRAINT `ordine_ibfk_5` FOREIGN KEY (`Id_status`) REFERENCES `Status_ordine` (`Id_status`),
  ADD CONSTRAINT `ordine_ibfk_6` FOREIGN KEY (`Id_utente`) REFERENCES `Utente` (`Email`);

--
-- Limiti per la tabella `Prodotto`
--
ALTER TABLE `Prodotto`
  ADD CONSTRAINT `prodotto_ibfk_2` FOREIGN KEY (`Id_magazzino`) REFERENCES `Magazzino` (`Id_magazzino`),
  ADD CONSTRAINT `prodotto_ibfk_4` FOREIGN KEY (`Id_sottocategoria`) REFERENCES `Sotto_categoria` (`Id_sottocategoria`),
  ADD CONSTRAINT `prodotto_ibfk_5` FOREIGN KEY (`Id_pegi`) REFERENCES `Pegi` (`Id_pegi`),
  ADD CONSTRAINT `prodotto_ibfk_6` FOREIGN KEY (`Id_venditore`) REFERENCES `Venditore` (`Email`);

--
-- Limiti per la tabella `Sotto_categoria`
--
ALTER TABLE `Sotto_categoria`
  ADD CONSTRAINT `sotto_categoria_ibfk_1` FOREIGN KEY (`Id_categoria`) REFERENCES `Categoria` (`Id_categoria`);

--
-- Limiti per la tabella `Venditore`
--
ALTER TABLE `Venditore`
  ADD CONSTRAINT `venditore_ibfk_1` FOREIGN KEY (`Id_corriere`) REFERENCES `Corriere` (`Id_corriere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
