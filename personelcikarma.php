<!DOCTYPE html>
<html lang="tr" >
<head>
    <link rel="stylesheet" href="home.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<style>
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-color: teal;
  
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav p{
    padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
.sidenav p:hover{
    color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
ul.menu ul{
    display: none;
}
ul.menu >li:hover ul{
    display:block;
}

</style>
</head>
<body>
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            
            <a href="homepage.html">Anasayfa</a>
            <a href="personelekle.html">Personel Ekleme</a>
            <a href="personelcikarma.php">Personel Çıkarma</a>
            <a href="guncellemeon.html">Personel Bilgi Güncelleme</a>
            <ul class="menu">
                    <li>
                        <a href="#">Analizler</a>
                        <ul>
                            <li><a href="dil.html">Dillere Göre</a></li>
                            <li><a href="cinsiyet.html">Cinsiyete Göre</a></li>
                            <li><a href="kisi.html">Personele Göre</a></li>
                        </ul>
                    </li>
                </ul>
    </div>
          
        <div id="main">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menü</span>
        </div>
        <div id="page">
          <form method="POST">
        <style>
	
  table {
    border-collapse: collapse;
    width: 40%;
  }

  th, td {
    text-align: left;
    padding: 8px;
  }
  th{
    background-color: #4CAF50;
      color: white;
  }

  tr:nth-child(even) {background-color: #f2f2f2;}

</style>
<h2>Personel Silme Ekranı<h2>

<?php 
	$dbAd='proje';
	$dbKullanici='root';
	$dbSifre='';
 
	$db=new PDO('mysql:host=localhost;charset=utf8;dbname='.$dbAd,$dbKullanici,$dbSifre);
	$personeller=$db->query("SELECT * FROM personel ORDER BY personel_no ASC",PDO::FETCH_ASSOC);
	
	echo "<table>";
	echo "<tr>";
	echo "<th>NUMARA</th>";
	echo "<th>AD</th>";
	echo "<th>SOYAD</th>";
	echo "</tr>";
	
	foreach($personeller as $personel)
	{
	   echo "<tr>";
	   echo "<td>".$personel['personel_no']."</td>";
	   echo "<td>".$personel['personel_adi']."</td>";
     echo "<td>".$personel['personel_soyadi']."</td>";
     echo "<td>"."<button type='submit' name='sil' class='btn btn-danger' value='".$personel['personel_no']."'>Personeli Sil</button>"."</td>";
	   echo "</tr>";
  }
  echo "</table>";

  if(isset($_POST["sil"])){
    $baglanti4 = new PDO("mysql:dbname=proje;host=localhost","root","");
    $komut = $baglanti4->query("DELETE FROM personel where personel_no=".$_POST["sil"]." ",PDO::FETCH_ASSOC);
    echo 'Silme İşlemi Başarıyla Gerçekleşti';
    header("Refresh: 2.0; url=personelcikarma.php");
  }
	
	?>
          </form>
            </div>
            <script>
                    function openNav() {
                      document.getElementById("mySidenav").style.width = "250px";
                      document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                    }
                    
                    function closeNav() {
                      document.getElementById("mySidenav").style.width = "0";
                      document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "teal";
                    }
                    </script>
          </body>