<?php
include 'dbBroker.php';
include 'model/kategorija.php';
include 'model/proizvod.php';

$kategorije = Kategorija::getAllKategorija($conn);

//popunjavanje forme podacima
if (isset($_POST['updateid'])) {

    $id = $_POST['updateid'];


    $proizvodi =  Proizvod::getProizvodByID($id, $conn);
    $row = $proizvodi->fetch_array();
}


?>






<!-- Icons font CSS-->
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<!-- Font special for pages-->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Vendor CSS-->
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="icon" href="images/lopta.png"/>
<link rel="stylesheet" href="css/main.css">




<div class="page-wrapper p-t-180 p-b-100 font-poppins" style="margin-top:0px">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-heading" style="background: url('images/pozadina.jpeg') top left/cover no-repeat; display: table-cell; width: 52%;"></div>
            <div class="card-body">
                <h2 class="title">Azuriraj proizvod</h2>
                <form action="izmeniProizvod.php" method="POST" id="izmeniProizvod">
                    <div class="input-group">
                        <input class="input--style-3" type="text" value="<?php echo $row['naziv'] ?>" placeholder="Naziv" name="nazivE" required>
                    </div>


                    <div class="input-group">
                        <textarea class="input--style-3" style="width: 100%;" placeholder="Opis" name="opisE" required> <?php echo $row['opis'] ?></textarea>
                    </div>

                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="kategorijaE" id="kategorijaE">
                                <option disabled="disabled" selected="selected">Kategorija</option>
                                <?php

                                while ($red = $kategorije->fetch_array()) :
                                ?>
                                    <option value=<?php echo $red["idKat"] ?>><?php echo $red["nazivKat"] ?></option>

                                <?php endwhile;   ?>
                            </select>
                            <script>
                                $('#kategorijaE').val('<?php echo $row['idKat'] ?>');
                            </script>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>


                    <div class="input-group">
                        <input class="input--style-3" type="text" value="<?php echo $row['cena'] ?>" placeholder="Cena" name="cenaE" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="file" name="uploadfileE">
                    </div>
                    <input class="input--style-3" type="hidden" name="hiddenSlika" value="<?php echo $row['slika'] ?>">
                    <input class="input--style-3" type="hidden" name="hiddenID" value="<?php echo $row['id'] ?>">

                    <button class="btn btn--pill btn--green" type="submit" id="azuriraj">Izmeni</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>






<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/main.js"></script>