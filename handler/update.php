<?php
include '../dbBroker.php';
include '../model/proizvod.php';

if (isset($_POST['nazivE'])) {  
 
    $idP = $_POST['hiddenID'];
    $naziv = $_POST['nazivE'];
    $opis = $_POST['opisE'];
    $cena = $_POST['cenaE'];
    $kategorija = $_POST['kategorijaE'];


    if($_FILES["uploadfileE"]["name"]!=""){ 
       $filename = $_FILES["uploadfileE"]["name"];
      
       $tempname = $_FILES["uploadfileE"]["tmp_name"];    
       $folder = "../images/".$filename;
       move_uploaded_file($tempname, $folder);
   }else{
      
       $filename = $_POST['hiddenSlika'];
      
   }

   $product = new Proizvod($idP,$naziv,$opis,$filename,$cena,$kategorija);
   $status = Proizvod::updateProizvod($product,$conn);
   
    if($status){
                    
        echo 'Success';
    
        }else{
            echo 'Failed';
        }
}
