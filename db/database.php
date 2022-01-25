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

        public function getAllSubCategories(){
            $stmt = $this->db->prepare("SELECT Id_sottocategoria, Descrizione FROM Sotto_categoria");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getWishListBy($emailUtente = 'gek5800@gmail.com') {
            $stmt = $this->db->prepare("SELECT Id_utente, Prodotto.*
                FROM Utente, Wishlist, Prodotto
                WHERE Utente.Email = Wishlist.Id_utente 
                AND Wishlist.Id_utente = '$emailUtente' 
                AND Wishlist.Id_prodotto = Prodotto.Id_prodotto");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function addItemInWishList($emailUtente = 'gek5800@gmail.com', $idProdotto) {
            $sql = "INSERT INTO Wishlist(Id_utente, Id_prodotto, Piace)
            VALUES ('$emailUtente', '$idProdotto', 1)";
            return $this->db->query($sql);
        }

        public function removeItemInWishList($emailUtente = 'gek5800@gmail.com', $idProdotto) {
            $query = "DELETE FROM Wishlist WHERE Wishlist.Id_utente = ? AND Wishlist.Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii',$emailUtente, $idProdotto);
            return $stmt->execute();
        }

        public function getAllItemsWithLikeBy($emailUtente = 'gek5800@gmail.com'){
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace
                FROM Prodotto LEFT JOIN Wishlist 
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto 
                AND Wishlist.Id_utente = '$emailUtente'");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getItemPSBy($emailUtente = 'gek5800@gmail.com') {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 1
                GROUP BY Prodotto.Nome;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getItemPCBy($emailUtente = 'gek5800@gmail.com') {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 4
                GROUP BY Prodotto.Nome;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getItemXboxBy($emailUtente = 'gek5800@gmail.com') {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 2
                GROUP BY Prodotto.Nome;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getItemSwitchBy($emailUtente = 'gek5800@gmail.com') {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Wishlist.Piace as piace, Sotto_categoria.Descrizione, Categoria.Nome as catNome
                FROM Prodotto LEFT JOIN Wishlist
                ON Prodotto.Id_prodotto = Wishlist.Id_prodotto AND Wishlist.Id_utente = '$emailUtente' 
                LEFT JOIN Sotto_categoria 
                ON Sotto_categoria.Id_sottocategoria = Prodotto.Id_sottocategoria
                LEFT JOIN Categoria 
                ON Categoria.Id_categoria = Sotto_categoria.Id_categoria
                WHERE Categoria.Id_categoria = 3
                GROUP BY Prodotto.Nome;");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getSpecificDataItemByName($name) {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Sotto_categoria.Descrizione as tipo, Categoria.Nome as categoria
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

        public function getTotaleUtenti(){
            $stmt = $this->db->prepare("SELECT COUNT(*) AS NumeroUtenti FROM Utente");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getGameCategoryListSabba($c1, $c2, $c3, $c4, $c5, $c6) {
            $result = array(
                "c1" => 1,
                "c2" => 2,
                "c3" => 3,
                "c4" => 4,
                "c5" => 5,
                "c6" => 6);

            return $result;
        }

        public function addGame($name, $img, $unita, $price, $id_sottocategoria, $releasedate, $descrizione) {
            $sconto = floatval(0.00);
            $sql = "INSERT INTO Prodotto (Nome, Url_immagine, Id_venditore, Unità, Prezzo, Sconto, Id_sottocategoria, Id_pegi, Data_rilascio, prezzo_scontato, Descrizione, Id_magazzino)
            VALUES ('$name', '$img', 'info@unigame.it', $unita, $price, $sconto, $id_sottocategoria, 1, '$releasedate', $price, '$descrizione', 1)";
            return $this->db->query($sql);
        }

        public function insertOffer($id_prodotto, $sconto, $prezzo) {
            $prezzo_scontato = $prezzo*(1-$sconto);
            $prezzo_scontato = number_format($prezzo_scontato, 2, '.', '');
            $sconto = number_format($sconto, 2, '.', '');
            
            $query = "UPDATE Prodotto
            SET Sconto = ?, prezzo_scontato = ?
            WHERE Id_prodotto = ?";
            
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ddi', $sconto, $prezzo_scontato, $id_prodotto);
            echo $query;
            return $stmt->execute();
        }

        public function deleteGame($id_prodotto) {
            $sql = "DELETE FROM prodotto WHERE id_prodotto = '$id_prodotto'";
            return $this->db->query($sql);
        }

        public function getTotalSellCountForPSsabba() {
            $stmt = $this->db->prepare("SELECT SUM(det.Quantità) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria IN (1, 2)");

            $stmt = $this->db->prepare("SELECT IFNULL(SUM(det.Quantità), 0) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria IN (1, 2)");
            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getTotalSellCountForXBOXsabba() {
            $stmt = $this->db->prepare("SELECT SUM(det.Quantità) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria IN (3, 4)");
            
            $stmt = $this->db->prepare("SELECT IFNULL(SUM(det.Quantità), 0) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria IN (3, 4)");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getTotalSellCountForNINTENDOsabba() {
            $stmt = $this->db->prepare("SELECT SUM(det.Quantità) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria = 6"); 

            $stmt = $this->db->prepare("SELECT IFNULL(SUM(det.Quantità), 0) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria IN (6)");
            
            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getTotalSellCountForPCsabba() {
            $stmt = $this->db->prepare("SELECT SUM(det.Quantità) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria = 5"); 

            $stmt = $this->db->prepare("SELECT IFNULL(SUM(det.Quantità), 0) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria IN (5)");
            
            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getTotalSellCountAllsabba() {
            $stmt = $this->db->prepare("SELECT SUM(det.Quantità) AS Result
            FROM dettagli_ordine as det
            INNER JOIN prodotto as prod ON
            (det.Id_prodotto = prod.Id_prodotto)
            WHERE prod.Id_sottocategoria IN (1, 2, 3, 4, 5, 6)");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getTotalEarnings() {
            $stmt = $this->db->prepare("SELECT SUM(Prezzo*Quantità) AS Result
            FROM dettagli_ordine");

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllertProducts() {
            $query = "SELECT Nome, Id_sottocategoria from Prodotto where Unità <= 3";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getEveryProduct() {
            $query = "SELECT Id_prodotto, Nome, Sconto, Id_sottocategoria, prezzo_scontato FROM Prodotto";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function productExists($nome, $id_sottocategoria){
            $query="SELECT Id_prodotto FROM Prodotto WHERE Nome = ? AND Id_sottocategoria = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("si", $nome, $id_sottocategoria);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProductUnits($id_prodotto){
            $query="SELECT Unità FROM Prodotto WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id_prodotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProductPrice($id_prodotto){
            $query="SELECT Prezzo FROM Prodotto WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id_prodotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function incrementUnits($id_prodotto, $unita_before, $unita_after){
            $unita_all = $unita_before+$unita_after;
            $query = "UPDATE Prodotto Set Unità = ? WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii', $unita_all, $id_prodotto);

            return $stmt->execute();
        }

        public function ricercaId($nome){
            $query="SELECT Id_prodotto, Id_sottocategoria FROM Prodotto WHERE Nome=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $nome);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getSottocategoriaId($id_sub){
            $stmt = $this->db->prepare("SELECT Descrizione FROM Sotto_categoria WHERE Id_sottocategoria=?");
            $stmt->bind_param("i", $id_sub);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>