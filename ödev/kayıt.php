<?php
include("baglanti.php");



$username_err="";
$email_err="";
$parola_err="";




if(isset($_POST["kaydet"]))
{

if(empty($_POST["kullaniciadi"]))
{
  $username_err="kullanıcı adı boş geçilemez";
}
else if(strlen($_POST["kullaniciadi"])<3)
{
  $username_err="kullanıcı adı en az 3 karakterden oluşmalı";
}
 //else if (preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullaniciadi"])) 
 
  //{$username_err="kullaınıci adı özel karakter içeremez";}
 
  
else{$username=$_POST["kullaniciadi"];} 

if(empty($_POST["email"]))
{
  $email_err="email boş olmaz";
} 
/*
else if  (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
 $email_err = "geçersiz email";
}*/
  //$name=$_POST["kullaniciadi"];
  if(empty($_POST["parola"]))
  {
    $parola_err="parola boş geçilemez.";
  }
  else{
     $parola=$_POST["parola"];}
  








   $email=$_POST["email"];
   //$passwd=($_POST["parola"]);
   $passwd=password_hash($_POST["parola"],PASSWORD_DEFAULT);




  if(isset($username)and isset($email)and isset($parola))
  {
   $ekle="INSERT INTO kullanici_giris (kullanici_adi,email,parola) VALUES('$username','$email','$passwd')";
   $calistirekle=mysqli_query($baglanti,$ekle);
   if($calistirekle)
   {
    echo '<div class="alert alert-success" role="alert">
    başarılı
  </div>';
   }
   else{
    echo'<div class="alert alert-danger" role="alert">
  hata</div>';
   }
mysqli_close($baglanti);
  }
}


  ?>
  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ÜYE KAYIT</title>
  </head>
  <body>
    <div class="conteiner p-7">
<div class="card p-5">
<form action ="kayıt.php"method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">kullaniciadi</label>
    <input type="text" class="form-control 
    <?php
    if(!empty($username_err))
    echo "is-invalid";
    ?>
    " id="exampleInputEmail1" aria-describedby="emailHelp"name="kullaniciadi">
    <div id="validationCustom03"class="invalid-feedback">
 <?php
echo $username_err;
 ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">eposta</label>
    <input type="email" class="form-control
    <?php
    if(!empty($email_err))
    echo "is-invalid";
    ?>
    
    " id="exampleInputEmail1" aria-describedby="emailHelp"name="email"><div id="validationCustom03"class="invalid-feedback">
   <?php
echo $email_err;
 ?>
    </div>
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">şifre</label>
    <input type="password" class="form-control 
    
    
    <?php
    if(!empty($parola_err))
    echo "is-invalid";
    ?>
    " id="exampleInputPassword1"name="parola">
    <div id="validationCustom03"class="invalid-feedback">
    <?php
 echo $parola_err;
 ?>
    </div>
  </div>
 
  <button type="submit"name="üye ol" class="btn btn-primary">kaydet</button>
  <br>
  <br>
  <div><a class="btn btn-primary" href="giris.php" role="button">zaten üyeyim</a></div>
</form>
</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>