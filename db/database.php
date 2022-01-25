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
            $stmt = $this->db->prepare("SELECT Id_prodotto, Url_immagine, Id_sottocategoria, Prezzo, Prezzo_scontato, Nuovo FROM Prodotto WHERE Prezzo_scontato < Prezzo ORDER BY RAND()");
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

        public function getAllCategories() {
            $stmt = $this->db->prepare("SELECT Icona, Nome_esteso, Nome FROM Categoria");
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

        //da quiiii
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
                AND Wishlist.Id_utente = '$emailUtente'");

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
                WHERE Categoria.Id_categoria = $category
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
                WHERE Categoria.Id_categoria = 1
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
                WHERE Categoria.Id_categoria = 4
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
                WHERE Categoria.Id_categoria = 2
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
                WHERE Categoria.Id_categoria = 3
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
            $stmt = $this->db->prepare("SELECT Prodotto.Unità, Carrello.Quantità
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
           
            $unitItem = self::unitItemBy($utente, $idItem)["Unità"];
            $buyItem = self::unitItemBy($utente, $idItem)["Quantità"];

            
            if($buyItem + 1 <= $unitItem && $result->num_rows > 0) {
                $update = "UPDATE `Carrello` 
                    SET Carrello.Quantità = Carrello.Quantità+$quantity
                    WHERE Carrello.Id_utente='$utente' AND Carrello.Id_prodotto=$idItem;";
                return $this->db->query($update);
            } 
            
            if($result->num_rows == 0) {
                $sql = "INSERT INTO `Carrello`(`Id_utente`, `Id_prodotto`, `Quantità`) 
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

            $buyItem = self::unitItemBy($utente, $idItem)["Quantità"];

            if($buyItem - 1 == 0) {
                $delet = "DELETE FROM Carrello 
                WHERE Carrello.Id_utente='$utente' AND Carrello.Id_prodotto=$idItem;";
                return $this->db->query($delet);
            } 
            else if($result->num_rows > 0) {
                $update = "UPDATE `Carrello` 
                    SET Carrello.Quantità = Carrello.Quantità-$quantity
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
            $stmt = $this->db->prepare("SELECT Carrello.Id_utente, Carrello.Quantità, Sotto_categoria.Descrizione as tipo, Categoria.Nome as categoria, Prodotto.*
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
                $quantity = $item["Quantità"];
                $update = "UPDATE Prodotto
                    SET Prodotto.Unità = Prodotto.Unità-$quantity
                    WHERE Prodotto.Id_prodotto = $idItem;";
                $this->db->query($update);
            }
            return true;
        }        

        public function createOrder($utente, $idPay) {
            $currentData = date('y-m-d');
            $update = "INSERT INTO `Ordine` 
            (`Id_ordine`, `Data_ordine`, `Id_utente`, `Id_corriere`, `Id_metodo`, 
            `Id_status`, `Data_consegna`, `Data_agg_status`) 
            VALUES (NULL, '$currentData', '$utente', 1, $idPay, 1, '$currentData', '$currentData') ";
                return $this->db->query($update);
        }

        public function createDetailOrder($utente, $idOrdine) {
            $cartItems = self::allItemInCartBy($utente);

            foreach ($cartItems as $item) {
                $idItem = $item["Id_prodotto"];
                $quantity = $item["Quantità"];
                $cost = $item["prezzo_scontato"];
                $update = "INSERT INTO Dettagli_ordine(Id_ordine, Id_prodotto, Quantità, Prezzo) 
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
            $stmt = $this->db->prepare("SELECT Carrello.Quantità, Prodotto.prezzo_scontato
                FROM Carrello, Prodotto
                WHERE Carrello.Id_prodotto = Prodotto.Id_prodotto
                AND Carrello.Id_utente = '$emailUtente';");

            $stmt->execute();
            $result = $stmt->get_result();
            $items = $result->fetch_all(MYSQLI_ASSOC);

            $pay = 0;
            foreach ($items as $item) {
                $pay += ($item["Quantità"] * $item["prezzo_scontato"]);
            }
            return $pay;
        }

        public function getSpecificDataItemByName($name) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Sotto_categoria.Descrizione as tipo, Categoria.Nome as categoria, Sotto_categoria.Id_sottocategoria as chooseIdSottoCat
            FROM Prodotto LEFT JOIN Sotto_categoria 
            ON Prodotto.Id_sottocategoria = Sotto_categoria.Id_sottocategoria 
            LEFT JOIN Categoria ON Categoria.Id_categoria = Sotto_categoria.Id_categoria 
            WHERE Prodotto.Nome = '$name';");

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
            $query = "SELECT Id_notifica, Id_ordine FROM Notifica_Utente WHERE Id_utente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllOrdersByEmail($email){
            $query = "SELECT Id_ordine, Data_consegna FROM Ordine, Utente WHERE Utente.Email = Ordine.Id_utente AND Ordine.Id_utente = ?";
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
            $query = "SELECT Nome, Url_immagine, Unità, prezzo_scontato FROM Prodotto WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $Id_prodotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>