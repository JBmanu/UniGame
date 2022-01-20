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

        public function checkLogin($email, $password){
            $query = "SELECT Email, Nome, Cognome From Utente WHERE Email = ? AND Password=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>