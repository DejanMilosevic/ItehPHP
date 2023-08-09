
<?php
    include '../dbBroker.php';
    include '../model/proizvod.php';

        if(isset($_POST['deleteid'])){
               $status=  Proizvod::deleteProizvod($_POST['deleteid'],$conn);

               if($status){
                   echo 'Success';
               }else{
                   echo 'Failed';
               }
            
         }
?>