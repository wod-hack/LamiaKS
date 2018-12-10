<?php 

//Admin Panel Giriş Bilgileri ----------------
 $kadi="admin"; //Kullanıcı Adı Bilgisi tırnak işareti İçerisini Değiştirin.
 $Sifre="admin"; //Şifre Bilgisi tırnak işareti İçerisini Değiştirin.
 //---------------------------------------------
 
  $server = "localhost";  
  $kullanici = "root";  //Db Kullanıcı adı
  $sifre = "hakan1207";   //Db Şifre
  $dbadi = "lamiakp";    //Db Adı
  try {  
      $Db = new PDO("mysql:host=$server;dbname=$dbadi", $kullanici, $sifre);  
      $Db->exec("SET CHARACTER SET utf8");  
      $Db->query("SET NAMES 'utf8'");  
      $Db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    }  
  catch(PDOException $e)  
    {  
      echo "Bağlantı Hatası: " . $e->getMessage();  
    }  
    


?>