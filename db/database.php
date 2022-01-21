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
    }
?>