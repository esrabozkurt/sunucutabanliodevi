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
                <a href="personelcikarma.php#">Personel Çıkarma</a>
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
                <h1>Bilgi Güncelleme Formu</h1>
                <form method="post" action="guncellemeon.php">
                    <?php

                    $no=$_POST['no'];
                    $baglan=mysqli_connect("localhost","root","","proje");
                    mysqli_set_charset($baglan,"utf8");
                    $sql="SELECT * FROM personel where personel_no='$no'";
                    $sorgu=mysqli_query($baglan,$sql);
                    $satirsay=mysqli_num_rows($sorgu);

                    if($satirsay>0){
                    while( $sonuc=mysqli_fetch_assoc($sorgu) ){
    

                   echo' <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Personel No</span>
                            </div>
                        <input type="text" required autocomplete="off" name="no" class="form-control" value="'.$sonuc['personel_no'].'" />
                            
                    </div><br>
                    
                    <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Personel Adı</span>
                            </div>
                        <input type="text" required autocomplete="off" name="ad" class="form-control" value="'.$sonuc['personel_adi'].'"/>
                        
                    </div><br>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Personel Soyadı</span>
                        </div>
                        <input type="text" required autocomplete="off" name="soyad" class="form-control" value="'.$sonuc['personel_soyadi'].'" />
                    </div><br>

                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Personel Cinsiyeti</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="cinsiyet">
                              <option selected>'.$sonuc['personel_cinsiyet'].'</option>
                              <option value="Kadın">Kadın</option>
                              <option value="Erkek">Erkek</option>
                            </select>
                    </div>
       
                      
                    <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Bildiği Diller</span>
                            </div>
                        <input type="text" required autocomplete="off" name="diller" class="form-control" value="'.$sonuc['diller'].'" />
                            
                    </div><br>
                    
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Çalışma Ücreti</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="ucret" value="'.$sonuc['ucret'].'">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                              <span class="input-group-text">TL</span>
                            </div>
                          </div>

                    
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Eğitim Durumu</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="egitim" selected="'.$sonuc['egitim'].'">
                              <option selected>'.$sonuc['egitim'].'</option>
                              <option value="İlkokul">İlkokul</option>
                              <option value="Lise">Lise</option>
                              <option value="Ön Lisans">Ön Lisans</option>
                              <option value="Lisans">Lisans</option>
                            </select>
                    </div>
                    

                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Çalışma Şekli</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="calisma">
                                  <option selected>'.$sonuc['calisma_sekli'].'</option>
                                  <option value="Yatılı">Yatılı</option>
                                  <option value="Güniçi">Güniçi</option>
                                </select>
                        </div>
                        ';
                    }
                }else{
                    echo "Girdiğiniz Personel Numarası İle Eşleşme Sağlanamadı";
                }
                        ?>
                        <div id="eklebuton">
                        <button type="submit" class="btn btn-danger">Bilgileri Güncelle</button>
                        <br>
                        <br>
                        </div>
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