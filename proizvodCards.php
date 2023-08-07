<?php
    include 'dbBroker.php';
    include 'model/proizvod.php';
    
    if (isset($_POST['sortiraj'])) {
    
        $sortiraj = $_POST['sortiraj'];
        if($sortiraj=='ASC'){
            $sviProizvodi = Proizvod::getAllProizvodSortedByCenaASC($conn);
        }else if($sortiraj=='DESC'){
            $sviProizvodi = Proizvod::getAllProizvodSortedByCenaDESC($conn);
        }
        else{
            $sviProizvodi = Proizvod::getAllProizvod($conn);
        }
    }else{
        $sviProizvodi = Proizvod::getAllProizvod($conn);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/styleProizvodCards.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <?php
        
            while ($row = $sviProizvodi->fetch_array()):
               
        ?>
            <div class="card">
                <div class="card-header" style="padding:0">
                     <img src="<?php echo 'images/'.$row['slika']?>" style="height:300px;width: auto;" >   
                </div>
                <div class="card-body">
                    <div class="tag tag-teal" style="background-color:#17c451;">   <?php echo $row['nazivKat']?>   </div>  
                    <br>
                    <h4 name = "naslovKartice">  <?php echo $row['naziv']?>  </h4>
                    <br>
                    <p>  <?php echo $row['opis']?>  </p>  
                    <?php $cena =  $row['cena']  ?>

                    <p style="font-size:20px;"> <strong>  Cena:      </strong><?php echo $cena."din" ?> </p>
                    
                    <form  method="post">
                        <button type="button" class="btn btn-custom" onclick="izmeniProizvod(<?php echo   $row['id'];?>)" style="background-color:#47bcd4;"     >  <i class="fas fa-pencil-alt"></i></a> </button> 
                        <button type="button" class="btn btn-custom"  style="background-color:#e60606;"   ><i class="fas fa-trash" onclick="obrisiProizvod(<?php echo   $row['id'];?>)"></i></button>  
 
                    </form>
                </div> 
            </div>

        <?php endwhile;?>
    </div>




 







</body>
</html>