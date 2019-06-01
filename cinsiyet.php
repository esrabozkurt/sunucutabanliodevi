<?php
header('Content-Type:application/json');
$baglanti=mysqli_connect("localhost","root","","proje");
mysqli_set_charset($baglanti,"utf8");
$sorgu=mysqli_query($baglanti,"SELECT personel_cinsiyet,COUNT(musteri_personel.personel_no) as tercih
FROM musteri_personel,personel
WHERE musteri_personel.personel_no=personel.personel_no
GROUP BY personel.personel_cinsiyet");
$data=array();
foreach($sorgu as $row){
$data[]=$row;
}
mysqli_close($baglanti);
echo json_encode($data);
?>