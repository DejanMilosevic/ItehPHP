
<?php
    include '../dbBroker.php';
    include '../model/proizvod.php';

        if(isset($_POST['deleteid'])){
               $result=  Proizvod::deleteProizvod($_POST['deleteid'],$conn);

               if($result){
                   echo 'Success';
               }else{
                   echo 'Failed';
               }
            
         }
?>