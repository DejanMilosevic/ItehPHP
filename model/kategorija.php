<?php

    class Kategorija{
        private $idKat;
        private $nazivKat;

        public static function getAllKategorija($conn){
            $query = "SELECT * FROM kategorija";
            return $conn->query($query);
        }
    }
?>