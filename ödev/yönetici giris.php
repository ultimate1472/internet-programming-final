<?php
    session_start();
    include("ayar.php");
    if ($_POST) {
        $yönetici = $_POST["yönetici"];
        $sifre = $_POST["sifre"];

        $sorgu = $baglan->query("SELECT * from yönetici where (yönetici='$yönetici' && sifre='$sifre')");
        $kayitsay = $sorgu->num_rows;

        if ($kayitsay > 0) {
            setcookie("yönetici","msb",time()+60*60);
            $_SESSION["yönetici"] = sha1(md5("var"));

            echo "<script> window.location.href='adminyönetimi.php'; </script>";
        } else {
            echo "<script>
            alert('HATALI yönetici BİLGİSİ!'); window.location.href='yönetici giris.php';
            </script>";
        }
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli Giriş</title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="text-align:center;padding-top:50px;">


    <form action="" method="post">
        <b>yönetici Adı:</b><br>
        <input type="text" name="yönetici" size="30" required><br><br>
        <b>Parola:</b><br>
        <input type="password" name="sifre" size="30" required><br><br><br>
        <input type="submit" value="Giriş Yap">
        <br>
        <br>
        <div><a class="btn btn-primary" href="giris.php" role="button">kullanıcı girişi yap</a></div>
     
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