<?php
    class DatabaseHelper{
        private $dbh;

        public function __construct($servername, $username, $password, $dbname, $porta){
            //connessione db
            $this->db = new mysqli($servername, $username, $password, $dbname, $porta);

            if($this->db->connect_error){
                die("Connessione al database fallita");
            }
        }

        public function getDiscountedGames(){
            $stmt = $this->db->prepare("SELECT Id_prodotto, Url_immagine, Id_sottocategoria, Prezzo, Prezzo_scontato FROM Prodotto WHERE Prezzo_scontato < Prezzo ORDER BY RAND()");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getCategorybySub($subcategory){
            $stmt = $this->db->prepare("SELECT Icona, Nome From Categoria, Sotto_categoria Where Categoria.Id_categoria = Sotto_categoria.Id_categoria AND Sotto_categoria.Id_sottocategoria = ?");
            $stmt->bind_param("i", $subcategory);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getSubcategorybyId($id_sub){
            $stmt = $this->db->prepare("SELECT Descrizione FROM Sotto_categoria WHERE Id_sottocategoria=?");
            $stmt->bind_param("i", $id_sub);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllCategories() {
            $stmt = $this->db->prepare("SELECT Icona, Nome_esteso, Nome FROM Categoria");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getAllSubCategories(){
            $stmt = $this->db->prepare("SELECT Id_sottocategoria, Descrizione FROM Sotto_categoria");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getWishListBy($utente) {
            $stmt = $this->db->prepare("SELECT Id_utente, Prodotto.*, Sotto_categoria.path as icon 
                FROM Utente, Wishlist, Prodotto, Sotto_categoria 
                WHERE Utente.Email = Wishlist.Id_utente 
                AND Wishlist.Id_utente = '$utente' 
                AND Wishlist.Id_prodotto = Prodotto.Id_prodotto 
                AND Prodotto.Id_sottocategoria = Sotto_categoria.Id_sottocategoria");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function addItemInWishList($emailUtente, $idProdotto) {
            $sql = "INSERT INTO Wishlist(Id_utente, Id_prodotto, Piace)
            VALUES ('$emailUtente', '$idProdotto', 1)";
            return $this->db->query($sql);
        }

        public function removeItemInWishList($emailUtente, $idProdotto) {
            $query = "DELETE FROM Wishlist WHERE Wishlist.Id_utente = ? AND Wishlist.Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii',$emailUtente, $idProdotto);
            return $stmt->execute();
        }

        public function getAllItemsWithLikeBy($emailUtente){
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace
                FROM Prodotto LEFT JOIN Wishlist 
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto 
                AND Wishlist.Id_utente = '$emailUtente' AND Prodotto.Unit?? > 0");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getItemsNoLog($category) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = $category AND Prodotto.Unit?? > 0
                GROUP BY Prodotto.Nome
                ORDER BY Prodotto.Prezzo ASC;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getItemPSBy($emailUtente) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 1 AND Prodotto.Unit?? > 0
                GROUP BY Prodotto.Nome
                ORDER BY Prodotto.Prezzo ASC;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getItemPCBy($emailUtente) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 4 AND Prodotto.Unit?? > 0
                GROUP BY Prodotto.Nome
                ORDER BY Prodotto.Prezzo ASC;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getItemXboxBy($emailUtente) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 2 AND Prodotto.Unit?? > 0
                GROUP BY Prodotto.Nome
                ORDER BY Prodotto.Prezzo ASC;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getItemSwitchBy($emailUtente) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 3 AND Prodotto.Unit?? > 0
                GROUP BY Prodotto.Nome
                ORDER BY Prodotto.Prezzo ASC;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function pickItemBySottoCategory($nameGame, $sottoCateogori) {
            $stmt = $this->db->prepare("SELECT * 
                FROM Prodotto
                WHERE Prodotto.Nome = '$nameGame'
                AND Prodotto.Id_sottocategoria = $sottoCateogori;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function unitItemBy($utente, $idItem) {
            $stmt = $this->db->prepare("SELECT Prodotto.Unit??, Carrello.Quantit??
                FROM Carrello, Prodotto
                WHERE Carrello.Id_prodotto = Prodotto.Id_prodotto
                AND Carrello.Id_utente = '$utente'
                AND Prodotto.Id_prodotto = $idItem;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        }

        public function addItemInCart($utente, $idItem, $quantity=1) {
            $isExist = $this->db->prepare("SELECT * 
                FROM Carrello
                WHERE Carrello.Id_utente = '$utente'
                AND Carrello.Id_prodotto = $idItem; ");
            $isExist->execute();
            $result = $isExist->get_result();
           
            $unitItem = self::unitItemBy($utente, $idItem)["Unit??"];
            $buyItem = self::unitItemBy($utente, $idItem)["Quantit??"];

            
            if($buyItem + 1 <= $unitItem && $result->num_rows > 0) {
                $update = "UPDATE `Carrello` 
                    SET Carrello.Quantit?? = Carrello.Quantit??+$quantity
                    WHERE Carrello.Id_utente='$utente' AND Carrello.Id_prodotto=$idItem;";
                return $this->db->query($update);
            } 
            
            if($result->num_rows == 0) {
                $sql = "INSERT INTO `Carrello`(`Id_utente`, `Id_prodotto`, `Quantit??`) 
                VALUES ('$utente','$idItem','$quantity')";
                return $this->db->query($sql);
            }
        }

        public function removeItemInCart($utente, $idItem, $quantity=1) {
            $isExist = $this->db->prepare("SELECT * 
                FROM Carrello
                WHERE Carrello.Id_utente = '$utente'
                AND Carrello.Id_prodotto = $idItem; ");
            $isExist->execute();
            $result = $isExist->get_result();

            $buyItem = self::unitItemBy($utente, $idItem)["Quantit??"];

            if($buyItem - 1 == 0) {
                $delet = "DELETE FROM Carrello 
                WHERE Carrello.Id_utente='$utente' AND Carrello.Id_prodotto=$idItem;";
                return $this->db->query($delet);
            } 
            else if($result->num_rows > 0) {
                $update = "UPDATE `Carrello` 
                    SET Carrello.Quantit?? = Carrello.Quantit??-$quantity
                    WHERE Carrello.Id_utente='$utente' AND Carrello.Id_prodotto=$idItem;";
                return $this->db->query($update);
            }
        }

        public function resetCart($utente) {
            $delet = "DELETE FROM Carrello 
                WHERE Carrello.Id_utente='$utente';";
                return $this->db->query($delet);
        }

        public function payMethod() {
            $stmt = $this->db->prepare("SELECT * FROM Metodo_pagamento ");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function allItemInCartBy($emailUtente) {
            $stmt = $this->db->prepare("SELECT Carrello.Id_utente, Carrello.Quantit??, Sotto_categoria.Descrizione as tipo, Categoria.Nome as categoria, Prodotto.*
                FROM Carrello, Prodotto, Sotto_categoria, Categoria
                WHERE Carrello.Id_prodotto = Prodotto.Id_prodotto
                AND Categoria.Id_categoria = Sotto_categoria.Id_categoria
                AND Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                AND Carrello.Id_utente = '$emailUtente';");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function removeUnitInWarehouse($utente) {
            $cartItems = self::allItemInCartBy($utente);

            foreach ($cartItems as $item) {
                $idItem = $item["Id_prodotto"];
                $quantity = $item["Quantit??"];
                $update = "UPDATE Prodotto
                    SET Prodotto.Unit?? = Prodotto.Unit??-$quantity
                    WHERE Prodotto.Id_prodotto = $idItem;";
                $this->db->query($update);
            }
            return true;
        }

        public function checkZeroUnits(){
            $query = "SELECT * FROM Prodotto WHERE Unit?? = 0";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function createOrder($utente, $idPay) {
            $currentData = date('y-m-d');
            $update = "INSERT INTO `Ordine` 
            (`Id_ordine`, `Data_ordine`, `Id_utente`, `Id_metodo`, 
            `Id_status`, `Data_consegna`, `Data_agg_status`) 
            VALUES (NULL, '$currentData', '$utente', $idPay, 1, '$currentData', '$currentData') ";
                return $this->db->query($update);
        }

        public function createDetailOrder($utente, $idOrdine) {
            $cartItems = self::allItemInCartBy($utente);

            foreach ($cartItems as $item) {
                $idItem = $item["Id_prodotto"];
                $quantity = $item["Quantit??"];
                $cost = $item["prezzo_scontato"];
                $update = "INSERT INTO Dettagli_ordine(Id_ordine, Id_prodotto, Quantit??, Prezzo) 
                VALUES ($idOrdine,$idItem,$quantity,$cost)";
                $this->db->query($update);
            }
        }

        public function lastOrderCreate() {
            $stmt = $this->db->prepare("SELECT Ordine.Id_ordine FROM Ordine ORDER BY Ordine.Id_ordine DESC LIMIT 1;");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        }

        public function totalCost($emailUtente) {
            $stmt = $this->db->prepare("SELECT Carrello.Quantit??, Prodotto.prezzo_scontato
                FROM Carrello, Prodotto
                WHERE Carrello.Id_prodotto = Prodotto.Id_prodotto
                AND Carrello.Id_utente = '$emailUtente';");

            $stmt->execute();
            $result = $stmt->get_result();
            $items = $result->fetch_all(MYSQLI_ASSOC);

            $pay = 0;
            foreach ($items as $item) {
                $pay += ($item["Quantit??"] * $item["prezzo_scontato"]);
            }
            return $pay;
        }

        public function getSpecificDataItemByName($name, $category) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Sotto_categoria.Descrizione as tipo, Categoria.Nome as categoria, Sotto_categoria.Id_sottocategoria as chooseIdSottoCat
            FROM Prodotto LEFT JOIN Sotto_categoria 
            ON Prodotto.Id_sottocategoria = Sotto_categoria.Id_sottocategoria 
            LEFT JOIN Categoria ON Categoria.Id_categoria = Sotto_categoria.Id_categoria 
            WHERE Prodotto.Nome = '$name'
            AND Categoria.Id_categoria = $category;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllDataItem($idGame) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Pegi.Url_immagine as pegi FROM Prodotto LEFT JOIN Pegi ON Prodotto.Id_pegi = Pegi.Id_pegi WHERE Prodotto.Id_prodotto = '$idGame';");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getCategoryByItem($idItem) {
            $stmt = $this->db->prepare("SELECT Prodotto.Nome, Categoria.Id_categoria
                FROM Prodotto, Sotto_categoria, Categoria
                WHERE Prodotto.Id_sottocategoria = Sotto_categoria.Id_sottocategoria
                AND Sotto_categoria.Id_categoria = Categoria.Id_categoria
                AND Prodotto.Id_prodotto = $idItem;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        }

        public function checkLoginUserCRIPTATO($email, $password) {
            $query = "SELECT Email, Password, Salt From Utente WHERE Email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $password=hash('sha512', $password.$result[0]["Salt"]);
            if($result[0]["Password"] == $password){
                return true;
            }
            return false;
        }

        public function checkLoginSellerCRIPTATO($email, $password){
            $query = "SELECT Email, Salt, Password FROM Venditore WHERE Email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $password=hash('sha512', $password.$result[0]["Salt"]);
            if($result[0]["Password"] == $password){
                return true;
            }
            return false;
        }

        public function insertUser($email, $password, $nome, $cognome, $salt){
            $query = "INSERT INTO Utente (Nome, Cognome, Email, Password, Salt) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sssss',$nome, $cognome, $email, $password, $salt);
            return $stmt->execute();
        }

        public function getNotifybyID($idNotifica){
            $query = "SELECT Testo FROM Notifica WHERE Id_notifica = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $idNotifica);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllNotificationByEmail($email){
            $query = "SELECT Id_notifica, Id_ordine FROM Notifica_Utente WHERE Id_utente = ? ORDER BY Id_ordine ASC";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllOrdersByEmail($email){
            $query = "SELECT Id_ordine, Data_consegna, Id_status FROM Ordine, Utente WHERE Utente.Email = Ordine.Id_utente AND Ordine.Id_utente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumProductbyIdOrdine($Id_ordine){
            $query = "SELECT count(d.Id_prodotto) as NumProduct FROM Ordine o, Dettagli_ordine d WHERE o.Id_ordine=d.Id_ordine AND o.Id_ordine = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $Id_ordine);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getOrderbyId($Id_ordine){
            $query="SELECT Data_consegna, Id_status, Data_agg_status FROM Ordine WHERE Id_ordine=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $Id_ordine);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProdottibyIdordine($Id_ordine){
            $query = "SELECT d.Id_prodotto FROM Ordine o, Dettagli_ordine d WHERE o.Id_ordine=d.Id_ordine AND o.Id_ordine = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $Id_ordine);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProdottibyIdprodotto($Id_prodotto){
            $query = "SELECT Nome, Url_immagine, Unit??, prezzo_scontato FROM Prodotto WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $Id_prodotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function updateStateOrderbyIdorder($Id_status, $Id_ordine){
            $query = "UPDATE Ordine Set Id_status = ? WHERE Id_ordine = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii',$Id_status, $Id_ordine);

            return $stmt->execute();
        }

        public function insertNotifyinNotifyListOfOrder($user, $Id_notifica, $Id_ordine){
            $data=date("Y/m/d");
            $query = "INSERT INTO Notifica_utente (Id_utente, Id_notifica, Data ,Id_ordine) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sisi', $user, $Id_notifica, $data, $Id_ordine);
            return $stmt->execute();
        }

        public function getAllGain(){
            $query = "SELECT sum(Prezzo * Quantit??) as guadagno FROM Dettagli_ordine";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllRegisteredPeople(){
            $query = "SELECT count(Nome) as NumPersone FROM Utente";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroUnitaVendute(){
            $query = "SELECT sum(Quantit??) as NumUnita FROM Dettagli_ordine";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditePS(){
            $query = "SELECT sum(d.Quantit??) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and (p.Id_sottocategoria=1 or p.Id_sottocategoria=2)";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditePC(){
            $query = "SELECT sum(d.Quantit??) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and p.Id_sottocategoria=5";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditeXbox(){
            $query = "SELECT sum(d.Quantit??) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and (p.Id_sottocategoria=3 or p.Id_sottocategoria=4)";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditeNintendo(){
            $query = "SELECT sum(d.Quantit??) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and p.Id_sottocategoria=6";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function ProdottiInAllerta(){
            $query = "SELECT Nome, Id_sottocategoria from Prodotto where Unit?? <= 3";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getPricebyIdProduct($id_product){
            $query="SELECT Prezzo FROM Prodotto WHERE Id_prodotto=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id_product);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function existProduct($nome, $id_sottocategoria){
            $query="SELECT Id_prodotto FROM Prodotto WHERE Nome=? and Id_sottocategoria=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("si", $nome, $id_sottocategoria);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function UnitaProdotto($id_prodotto){
            $query="SELECT Unit?? FROM Prodotto WHERE Id_prodotto=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id_prodotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function addUnitsbyIdproduct($id_prodotto, $unita_precedenti, $unita_nuove){
            $unita_totali=$unita_precedenti+$unita_nuove;
            $query = "UPDATE Prodotto Set Unit?? = ? WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii',$unita_totali, $id_prodotto);

            return $stmt->execute();
        }

        public function insertProduct($nome, $img, $unita, $prezzo, $id_sottocategoria, $pegi, $data_rilascio, $descrizione){
            $Id_venditore='info@unigame.it';
            $sconto=floatval(0.00);
            $query = "INSERT INTO Prodotto (Nome, Url_immagine, Id_venditore, Unit??, Prezzo, Sconto, Id_sottocategoria, Id_pegi, Data_rilascio, prezzo_scontato, Descrizione) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sssiddiisds',$nome, $img, $Id_venditore, $unita, $prezzo, $sconto, $id_sottocategoria, $pegi, $data_rilascio, $prezzo, $descrizione);
            
            return $stmt->execute();
        }

        public function deleteProduct($id_product){
            $query = "DELETE FROM Prodotto WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$id_product);
            return $stmt->execute();
        }

        public function updateDiscountProduct($id_product, $sconto, $prezzo){
            $prezzo_scontato=$prezzo*(1-$sconto);
            $prezzo_scontato=number_format($prezzo_scontato, 2, '.', '');
            $sconto=number_format($sconto, 2, '.', '');

            $query = "UPDATE Prodotto Set Sconto = ?, prezzo_scontato=? WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ddi', $sconto, $prezzo_scontato, $id_product);
            return $stmt->execute();
        }

        public function getAllProduct(){
            $query="SELECT * FROM Prodotto";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllProductForSearch(){
            $query="SELECT * FROM Prodotto WHERE Prodotto.Unit?? > 0 GROUP BY Prodotto.Nome
            ORDER BY Prodotto.Prezzo ASC; ";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function searchIdProduct($nome){
            $query="SELECT Id_prodotto, Id_sottocategoria FROM Prodotto WHERE Nome=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $nome);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getQuantityby($id_order, $id_prodotto){
            $query="SELECT Quantit?? FROM Dettagli_ordine WHERE Id_prodotto=? AND Id_ordine=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ii", $id_prodotto, $id_order);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>