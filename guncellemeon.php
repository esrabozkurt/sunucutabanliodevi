<!DOCTYPE html>
<head></head>
<body>
    <style>
    body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-color: teal;
  
}
    </style>
</body>

<?php 


$no=$_POST['no'];
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
$cinsiyet=$_POST['cinsiyet'];
$diller=$_POST['diller'];
$ucret=$_POST['ucret'];
$egitim=$_POST['egitim'];
$calisma=$_POST['calisma'];

$baglan=mysqli_connect("localhost","root","","proje");
mysqli_set_charset($baglan,"utf8");

$sql="UPDATE personel SET personel_no='$no',personel_adi='$ad',personel_soyadi='$soyad',personel_cinsiyet='$cinsiyet',diller='$diller',ucret='$ucret',egitim='$egitim',calisma_sekli='$calisma' WHERE personel_no='$no'";
$sonuc1=mysqli_query($baglan,$sql);

echo "<h2>Personel Bilgileri Başarı ile Güncellendi</h2>";

header("Refresh: 0.5; url=guncellemeon.html");



?>