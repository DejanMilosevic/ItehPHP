
<?php
    include '../dbBroker.php';
    include '../model/proizvod.php';
   

    if ( isset($_POST['naziv']) && isset($_POST['opis']) && isset($_POST['cena'])) {
           
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];    
            $folder = "../images/".$filename;

            move_uploaded_file($tempname, $folder);

            $p = new Proizvod(null,$_POST['naziv'],$_POST['opis'], $filename, $_POST['cena'], 
                                $_POST['kategorija']);
       
            $status=Proizvod::addProizvod($p,$conn);
        
            if($status){
                
                echo 'Success';
                
            }else{
                echo 'Failed';
            }

      }
?>