<?php
require("connection.php");
if($_POST){
#	echo "Sayfaya Bağlantı Yapıldı";
if(isset($_POST["kad"]))
{
$kullanici=strip_tags(trim($_POST["kad"]));
}
else{
echo "Eposta requesti olmadı";	
}
if(isset($_POST["sifre"]))
{
$password=strip_tags(trim($_POST["sifre"]));
}
else{
echo "Şifre requesti olmadı";	
}
if($baglan){

$sorgu=mysqli_query($baglan,"SELECT kullanici_adi,sifre FROM yonetici WHERE kullanici_adi='".$kullanici."' AND sifre='".$password."'");
if(mysqli_num_rows($sorgu)>0){
    header ("Location:homepage.html");
}else{
echo "Kullanıcı Adı veya Şifre Yanlış";
header("refresh:1;url=index.html");
}
}else{
die("Veritabanına Bağlanılmadı");
}

}
else{
echo "Sayfaya Bağlantı Yapılamadı";
}




?>
