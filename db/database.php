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

        public function getAllItems() {
            $stmt = $this->db->prepare("SELECT * FROM Prodotto ");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getItemPS() {
            $stmt = $this->db->prepare("SELECT Prodotto.*, Categoria.Nome, Sotto_categoria.Descrizione
                FROM Prodotto 
                INNER JOIN Prodotto ON Prodotto.Id_sottocategoria = Sotto_categoria.Descrizione
                INNER JOIN Sotto_categoria ON Sotto_categoria.Id_categoria = Categoria.Id_categoria");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }


        public function checkLoginUserCRIPTATO($email, $password){
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
            $query = "SELECT Nome, Url_immagine, Unità, prezzo_scontato FROM Prodotto WHERE Id_prodotto = ?";
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
            $query = "SELECT sum(Prezzo * Quantità) as guadagno FROM Dettagli_ordine";
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
            $query = "SELECT sum(Quantità) as NumUnita FROM Dettagli_ordine";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditePS(){
            $query = "SELECT sum(d.Quantità) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and (p.Id_sottocategoria=1 or p.Id_sottocategoria=2)";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditePC(){
            $query = "SELECT sum(d.Quantità) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and p.Id_sottocategoria=5";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditeXbox(){
            $query = "SELECT sum(d.Quantità) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and (p.Id_sottocategoria=3 or p.Id_sottocategoria=4)";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function NumeroVenditeNintendo(){
            $query = "SELECT sum(d.Quantità) as NumVendite from Dettagli_ordine d, Prodotto p where d.Id_prodotto = p.Id_prodotto and p.Id_sottocategoria=6";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function ProdottiInAllerta(){
            $query = "SELECT Nome, Id_sottocategoria from Prodotto where Unità <= 3";
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
            $query="SELECT Unità FROM Prodotto WHERE Id_prodotto=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id_prodotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function addUnitsbyIdproduct($id_prodotto, $unita_precedenti, $unita_nuove){
            $unita_totali=$unita_precedenti+$unita_nuove;
            $query = "UPDATE Prodotto Set Unità = ? WHERE Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii',$unita_totali, $id_prodotto);

            return $stmt->execute();
        }

        public function insertProduct($nome, $img, $unita, $prezzo, $id_sottocategoria, $pegi, $data_rilascio, $descrizione){
            $Id_venditore='info@unigame.it';
            $sconto=floatval(0.00);
            $query = "INSERT INTO Prodotto (Nome, Url_immagine, Id_venditore, Unità, Prezzo, Sconto, Id_sottocategoria, Id_pegi, Data_rilascio, prezzo_scontato, Descrizione) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
            $query="SELECT Id_prodotto, Nome, Sconto, Id_sottocategoria, prezzo_scontato FROM Prodotto";
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

    }
?>