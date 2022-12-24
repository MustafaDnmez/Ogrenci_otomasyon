<?php

$baglanti= new pdo("mysql:host=localhost;dbname=otomasyon;","root","rootroot");


if (!$baglanti){
    echo "bağlanmadı";

}
else {

    echo "";
}


?>