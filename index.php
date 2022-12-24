<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ögrenci Otomasyonu</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Öğrenci otomasyonu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Öğrenci</a>
        </li>
    
      </ul>
    </div>
  </div>
</nav>




<?php 
include "baglanti.php";

if (empty($_GET["sayfa"])){
$url="";
}
else {

    $url=$_GET["sayfa"];
}

switch ($url) {
case "form":
        
?>

<form action="index.php?sayfa=ekle" method="post">

<div>
    <label for=""> Okul No </label><br>
    <input type="text" name="okulno" class="form-control" >
</div>

<div>
    <label for=""> Ad Soyad </label><br>
    <input type="text" name="adsoyad" class="form-control">
</div>
<div>
    <label for=""> sayi </label><br>
    <input type="number" name="sayi" class="form-control" >
</div>
 <br>
<input type="submit" value="Gönder" name="btn" class="btn btn-primary">


</form>





<?php


        break;




    case "ekle":


         
?>

<form action="" method="post">

<div>
    <label for=""> Okul No </label><br>
    <input type="text" name="okulno" class="form-control" value="<?php echo $_POST["okulno"]?>" >
</div>

<div>
    <label for=""> Ad Soyad </label><br>
    <input type="text" name="adsoyad" class="form-control" value="<?php echo $_POST["adsoyad"]?>" >
</div>
<div>
    <label for=""> sayi </label><br>
    <input type="number" name="sayi" class="form-control" value="<?php echo $_POST["sayi"]?>"  >
</div>

<?php 
for ($i=1; $i<=$_POST["sayi"]; $i++){

    ?>
<div>
    <label for=""> ders: <?php echo $i;?> </label><br>
    <input type="text" name="ders[]" class="form-control"    >
</div>
    <?php

}

?>


 <br>
<input type="submit" value="Gönder" name="btn" class="btn btn-primary">


</form>
<?php

if (isset($_POST["btn"])){



$okulno=$_POST['okulno'];
$adsoyad=$_POST['adsoyad'];
foreach($_POST["ders"] as  $deger ) {

    $sql=$baglanti->query("INSERT INTO ders (okulno,ad_soyad,dersler) VALUES ('$okulno','$adsoyad','$deger' )");


}

}

        break;

        default:
      

?>

<button type="button" class="btn btn-dark " ><a href="index.php?sayfa=form">Ders ekle</a> </button>

<table class="table table-striped">
<tr> 
<th> Okul No </th>
<th> Ad Soyad  </th>
<th> Alınan dersler </th>
<th> Düzenle </th>
<th> Ekle</th>
</tr>




<?php 
$sql=$baglanti->query("SELECT * FROM  ders ");
while ($satir=$sql->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
    <td><?php echo $satir["okulno"]; ?></td>
    <td><?php echo $satir["ad_soyad"]; ?></td>
    <td><?php echo $satir["dersler"]; ?></td>
   <td><a href="guncelle.php?id=<?php echo $satir["id"]; ?>">Düzenle</a></td>
   <td><a href="sil.php?id=<?php echo $satir["id"]; ?>">Sil</a></td>
   </tr>
<?php

}

?>
</table>
<?php
}



?>









</body>
</html>