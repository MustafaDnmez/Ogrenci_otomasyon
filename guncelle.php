<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
$id=$_GET["id"];

$sql=$baglanti->query("SELECT * FROM ders where id='$id'");
$satir=$sql->fetch(PDO::FETCH_ASSOC);

?>
<form action="" method="post">

<div>
    <label for=""> Okul No </label><br>
    <input type="text" name="okulno" class="form-control" value="<?php echo $satir["okulno"] ;?>" >
</div>

<div>
    <label for=""> Ad Soyad </label><br>
    <input type="text" name="adsoyad" class="form-control" value="<?php echo $satir["ad_soyad"] ;?>">
</div>
<div>
    <label for="">Dersler </label><br>
    <input type="text" name="dersler" class="form-control" value="<?php echo $satir["dersler"] ;?>" >
</div>
 <br>
<input type="submit" value="Gönder" name="btn" class="btn btn-primary">


</form>



<?php
if (isset($_POST["btn"])){

    $okulno=$_POST["okulno"];
    $adsoyad=$_POST["adsoyad"];
    $dersler=$_POST["dersler"];
    $baglanti->query("UPDATE ders SET okulno='$okulno', ad_soyad='$adsoyad' , dersler='$dersler' where id='$id'");
    header("location:index.php");

}
?>


</body>
</html>