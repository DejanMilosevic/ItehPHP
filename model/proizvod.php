<?php

    class Proizvod{
        private $id;
        private $naziv;
        private $opis;
        private $slika;
        private $cena;
        private $kategorija;

        public function __construct($id=null, $naziv=null, $opis=null, $slika=null, $cena=null, $kategorija=null)
        {
            $this->id=$id;
            $this->naziv=$naziv;
            $this->opis=$opis; 
            $this->slika=$slika;
            $this->cena=$cena;
            $this->kategorija=$kategorija;
        }


        public static function addProizvod($p, $conn){
            $query = "INSERT INTO proizvod (naziv,opis,slika,cena,kategorija) VALUES ('$p->naziv','$p->opis','$p->slika',$p->cena,$p->kategorija)";
             
            return $conn->query($query); 
    
        }
    
        public static function getAllProizvod($conn){
            $query = " SELECT * FROM proizvod p INNER JOIN kategorija c ON p.kategorija=c.idKat";
           
            return $conn->query($query); 
        }
    
        public static function getProizvodByID($id,$conn){
            $query = "SELECT * FROM proizvod p INNER JOIN kategorija c ON p.kategorija=c.idKat WHERE id=$id";
           
            return $conn->query($query); 
        }
    
        public static function deleteProizvod($id, $conn){
            $query = "DELETE FROM proizvod WHERE id=$id";
           
            return $conn->query($query); 
        }
    
    
        public static function updateProizvod($p,$conn){
    
            $query = "UPDATE proizvod SET cena=$p->cena,naziv='$p->naziv',opis='$p->opis',slika='$p->slika',kategorija=$p->kategorija WHERE id=$p->id ";
           
            return $conn->query($query); 
    
        }

        public static function getAllProizvodSortedByCenaDESC($conn){
            $query = " SELECT * FROM proizvod p INNER JOIN kategorija c ON p.kategorija=c.idKat ORDER BY p.cena DESC";
           
            return $conn->query($query); 
        }
        public static function getAllProizvodSortedByCenaASC($conn){
            $query = " SELECT * FROM proizvod p INNER JOIN kategorija c ON p.kategorija=c.idKat ORDER BY p.cena ASC";
           
            return $conn->query($query); 
        }
    }



?>