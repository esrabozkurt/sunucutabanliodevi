<?php

$no=$_POST['no'];
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
$cinsiyet=$_POST['cinsiyet'];
$tarih=$_POST['tarih'];
if(isset($_POST['dil1'])){
    $dil1=$_POST['dil1'];
}else{

}

if(isset($_POST['dil2'])){
    $dil2=$_POST['dil2'];
}else{

}

$ucret=$_POST['ucret'];
$egitim=$_POST['egitim'];

$calisma=$_POST['calisma'];
if(isset($_POST['dil1']) && isset($_POST['dil2'])){
    $diller=$dil1.",".$dil2;
}
else if(isset($_POST['dil1'])){
    $diller=$dil1;
}
else if(isset($_POST['dil2'])){
    $diller=$dil2;
}


$baglan=mysqli_connect("localhost","root","","proje");
mysqli_set_charset($baglan,"utf8");
$sql="SELECT personel_no from personel WHERE personel_no='$no'";
$sonuc1=mysqli_query($baglan,$sql);
$satirsay=mysqli_num_rows($sonuc1);

if($satirsay>0){
    echo "Bu Personel Numarası Daha Önce Kaydedilmiş!";
    header("refresh:1;url=personelekle.html");
}else{
    $sqlekle="INSERT INTO personel(personel_no,personel_adi,personel_soyadi,personel_cinsiyet,dogum_tarihi,diller,ucret,egitim,calisma_sekli)
    VALUES ('$no','$ad','$soyad','$cinsiyet','$tarih','$diller','$ucret','$egitim','$calisma')";
    
    $sonuc=mysqli_query($baglan,$sqlekle);
    
    echo "Başarıyla Eklendi";
    header("refresh:1;url=homepage.html");

}






?>